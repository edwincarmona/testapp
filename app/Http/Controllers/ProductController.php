<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\ProductRepository;
use App\Models\Unit;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProductController extends AppBaseController
{
    /** @var  ProductRepository */
    private $productRepository;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepository = $productRepo;
    }

    /**
     * Display a listing of the Product.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productRepository->pushCriteria(new RequestCriteria($request));
        $products = $this->productRepository->all();

        return view('products.index')
            ->with('products', $products);
    }

    /**
     * Show the form for creating a new Product.
     *
     * @return Response
     */
    public function create()
    {
        $units = Unit::where('is_deleted', false)
                        ->orderBy('code', 'ASC')
                        ->pluck('code', 'id_unit');

        return view('products.create')
                    ->with('units', $units);
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param CreateProductRequest $request
     *
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {
        $input = $request->all();

        $input['created_by_id'] = 2;
        $input['updated_by_id'] = 2;
        $input['is_deleted'] = 0;

        $product = $this->productRepository->create($input);

        Flash::success('Product saved successfully.')->important();

        return redirect(route('products.index'));
    }

    /**
     * Display the specified Product.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product)) {
            Flash::error('Product not found')->important();

            return redirect(route('products.index'));
        }

        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product)) {
            Flash::error('Product not found')->important();

            return redirect(route('products.index'));
        }

        if ($product->isLocked()) {
            if($product->lockedBy()->id != auth()->user()->id) {
                Flash::error('Resource you are trying to access is locked until '.$product->lockedUntil())->important();

                return back();
            }
        }
        else {
            $token = $product->lock('5 minutes', auth()->user());
        }

        $units = Unit::where('is_deleted', false)
                        ->orderBy('code', 'ASC')
                        ->pluck('code', 'id_unit');

        return view('products.edit')->with('product', $product)
                                    ->with('units', $units);
    }

    /**
     * Update the specified Product in storage.
     *
     * @param  int              $id
     * @param UpdateProductRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductRequest $request)
    {
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        if ($product->isAccessible()) {
            $token = $product->lock('5 minutes', auth()->user());
        }
        else {
            if ($product->lockedBy()->id != auth()->user()->id) {
                Flash::error('Resource you are trying to access is locked until '.$product->lockedUntil())->important();
    
                return back();
            }
        }

        $product = $this->productRepository->update($request->all(), $id);

        $product->unlock();

        Flash::success('Product updated successfully.')->important();

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        if ($product->isAccessible()) {
            $token = $product->lock('5 minutes', auth()->user());
        }
        else {
            if ($product->lockedBy()->id != auth()->user()->id) {
                Flash::error('Resource you are trying to access is locked until '.$product->lockedUntil())->important();
    
                return back();
            }
        }

        $product->is_deleted = 1;

        // $this->productRepository->delete($id);
        $product = $this->productRepository->update($product, $id);

        Flash::success('Product deleted successfully.')->important();

        $product->unlock();

        return redirect(route('products.index'));
    }
}
