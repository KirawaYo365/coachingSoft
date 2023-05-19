<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInstituteRequest;
use App\Http\Requests\UpdateInstituteRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\InstituteRepository;
use Illuminate\Http\Request;
use Flash;

class InstituteController extends AppBaseController
{
    /** @var InstituteRepository $instituteRepository*/
    private $instituteRepository;

    public function __construct(InstituteRepository $instituteRepo)
    {
        $this->instituteRepository = $instituteRepo;
    }

    /**
     * Display a listing of the Institute.
     */
    public function index(Request $request)
    {
        $institutes = $this->instituteRepository->paginate(10);

        return view('institutes.index')
            ->with('institutes', $institutes);
    }

    /**
     * Show the form for creating a new Institute.
     */
    public function create()
    {
        return view('institutes.create');
    }

    /**
     * Store a newly created Institute in storage.
     */
    public function store(CreateInstituteRequest $request)
    {
        // $input = $request->all();

        $institute = $this->instituteRepository->createInstitute($request);

        Flash::success('Institute saved successfully.');

        return redirect(route('institutes.index'));
    }

    /**
     * Display the specified Institute.
     */
    public function show($id)
    {
        $institute = $this->instituteRepository->find($id);

        if (empty($institute)) {
            Flash::error('Institute not found');

            return redirect(route('institutes.index'));
        }

        return view('institutes.show')->with('institute', $institute);
    }

    /**
     * Show the form for editing the specified Institute.
     */
    public function edit($id)
    {
        $institute = $this->instituteRepository->find($id);

        if (empty($institute)) {
            Flash::error('Institute not found');

            return redirect(route('institutes.index'));
        }

        return view('institutes.edit')->with('institute', $institute);
    }

    /**
     * Update the specified Institute in storage.
     */
    public function update($id, UpdateInstituteRequest $request)
    {
        $institute = $this->instituteRepository->find($id);

        if (empty($institute)) {
            Flash::error('Institute not found');

            return redirect(route('institutes.index'));
        }

        $institute = $this->instituteRepository->updateInstitute($request->all(), $id);

        Flash::success('Institute updated successfully.');

        return redirect(route('institutes.index'));
    }

    /**
     * Remove the specified Institute from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $institute = $this->instituteRepository->find($id);

        if (empty($institute)) {
            Flash::error('Institute not found');

            return redirect(route('institutes.index'));
        }

        $this->instituteRepository->delete($id);

        Flash::success('Institute deleted successfully.');

        return redirect(route('institutes.index'));
    }
}
