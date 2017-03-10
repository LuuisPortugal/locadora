<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\FilmeCategoriumCreateRequest;
use App\Http\Requests\FilmeCategoriumUpdateRequest;
use App\Repositories\FilmeCategoriumRepository;
use App\Validators\FilmeCategoriumValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class FilmeCategoriaController extends Controller
{

    /**
     * @var FilmeCategoriumRepository
     */
    protected $repository;

    /**
     * @var FilmeCategoriumValidator
     */
    protected $validator;

    public function __construct(FilmeCategoriumRepository $repository, FilmeCategoriumValidator $validator)
    {
        $this->middleware('auth');
        $this->repository = $repository;
        $this->validator = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $filmeCategoria = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $filmeCategoria,
            ]);
        }

        return view('filmecategorium.index', compact('filmeCategoria'));
    }


    /**
     * Show the form for creating the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('filmecategorium.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FilmeCategoriumCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(FilmeCategoriumCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $filmeCategorium = $this->repository->create($request->all());

            $response = [
                'message' => 'FilmeCategorium created.',
                'data' => $filmeCategorium->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error' => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $filmeCategorium = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $filmeCategorium,
            ]);
        }

        return view('filmecategorium.show', compact('filmeCategorium'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $filmeCategorium = $this->repository->find($id);

        return view('filmecategorium.edit', compact('filmeCategorium'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  FilmeCategoriumUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(FilmeCategoriumUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $filmeCategorium = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'FilmeCategorium updated.',
                'data' => $filmeCategorium->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error' => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'FilmeCategorium deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'FilmeCategorium deleted.');
    }
}
