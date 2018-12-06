<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSegmentRequest;
use App\Http\Requests\UpdateSegmentRequest;
use App\Repositories\SegmentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SegmentController extends AppBaseController
{
    /** @var  SegmentRepository */
    private $segmentRepository;

    public function __construct(SegmentRepository $segmentRepo)
    {
        $this->segmentRepository = $segmentRepo;
    }

    /**
     * Display a listing of the Segment.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->segmentRepository->pushCriteria(new RequestCriteria($request));
        $segments = $this->segmentRepository->all();

        return view('segments.index')
            ->with('segments', $segments);
    }

    /**
     * Show the form for creating a new Segment.
     *
     * @return Response
     */
    public function create()
    {
        return view('segments.create');
    }

    /**
     * Store a newly created Segment in storage.
     *
     * @param CreateSegmentRequest $request
     *
     * @return Response
     */
    public function store(CreateSegmentRequest $request)
    {
        $input = $request->all();

        $segment = $this->segmentRepository->create($input);

        Flash::success('Segment saved successfully.');

        return redirect(route('segments.index'));
    }

    /**
     * Display the specified Segment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $segment = $this->segmentRepository->findWithoutFail($id);

        if (empty($segment)) {
            Flash::error('Segment not found');

            return redirect(route('segments.index'));
        }

        return view('segments.show')->with('segment', $segment);
    }

    /**
     * Show the form for editing the specified Segment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $segment = $this->segmentRepository->findWithoutFail($id);

        if (empty($segment)) {
            Flash::error('Segment not found');

            return redirect(route('segments.index'));
        }

        return view('segments.edit')->with('segment', $segment);
    }

    /**
     * Update the specified Segment in storage.
     *
     * @param  int              $id
     * @param UpdateSegmentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSegmentRequest $request)
    {
        $segment = $this->segmentRepository->findWithoutFail($id);

        if (empty($segment)) {
            Flash::error('Segment not found');

            return redirect(route('segments.index'));
        }

        $segment = $this->segmentRepository->update($request->all(), $id);

        Flash::success('Segment updated successfully.');

        return redirect(route('segments.index'));
    }

    /**
     * Remove the specified Segment from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $segment = $this->segmentRepository->findWithoutFail($id);

        if (empty($segment)) {
            Flash::error('Segment not found');

            return redirect(route('segments.index'));
        }

        $this->segmentRepository->delete($id);

        Flash::success('Segment deleted successfully.');

        return redirect(route('segments.index'));
    }
}
