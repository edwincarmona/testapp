<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDocumentRowRequest;
use App\Http\Requests\UpdateDocumentRowRequest;
use App\Repositories\DocumentRowRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DocumentRowController extends AppBaseController
{
    /** @var  DocumentRowRepository */
    private $documentRowRepository;

    public function __construct(DocumentRowRepository $documentRowRepo)
    {
        $this->documentRowRepository = $documentRowRepo;
    }

    /**
     * Display a listing of the DocumentRow.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->documentRowRepository->pushCriteria(new RequestCriteria($request));
        $documentRows = $this->documentRowRepository->all();

        return view('document_rows.index')
            ->with('documentRows', $documentRows);
    }

    /**
     * Show the form for creating a new DocumentRow.
     *
     * @return Response
     */
    public function create()
    {
        return view('document_rows.create');
    }

    /**
     * Store a newly created DocumentRow in storage.
     *
     * @param CreateDocumentRowRequest $request
     *
     * @return Response
     */
    public function store(CreateDocumentRowRequest $request)
    {
        $input = $request->all();

        $documentRow = $this->documentRowRepository->create($input);

        Flash::success('Document Row saved successfully.');

        return redirect(route('documentRows.index'));
    }

    /**
     * Display the specified DocumentRow.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $documentRow = $this->documentRowRepository->findWithoutFail($id);

        if (empty($documentRow)) {
            Flash::error('Document Row not found');

            return redirect(route('documentRows.index'));
        }

        return view('document_rows.show')->with('documentRow', $documentRow);
    }

    /**
     * Show the form for editing the specified DocumentRow.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $documentRow = $this->documentRowRepository->findWithoutFail($id);

        if (empty($documentRow)) {
            Flash::error('Document Row not found');

            return redirect(route('documentRows.index'));
        }

        return view('document_rows.edit')->with('documentRow', $documentRow);
    }

    /**
     * Update the specified DocumentRow in storage.
     *
     * @param  int              $id
     * @param UpdateDocumentRowRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDocumentRowRequest $request)
    {
        $documentRow = $this->documentRowRepository->findWithoutFail($id);

        if (empty($documentRow)) {
            Flash::error('Document Row not found');

            return redirect(route('documentRows.index'));
        }

        $documentRow = $this->documentRowRepository->update($request->all(), $id);

        Flash::success('Document Row updated successfully.');

        return redirect(route('documentRows.index'));
    }

    /**
     * Remove the specified DocumentRow from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $documentRow = $this->documentRowRepository->findWithoutFail($id);

        if (empty($documentRow)) {
            Flash::error('Document Row not found');

            return redirect(route('documentRows.index'));
        }

        $this->documentRowRepository->delete($id);

        Flash::success('Document Row deleted successfully.');

        return redirect(route('documentRows.index'));
    }
}
