<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\FilmeAtorCreateRequest;
use App\Http\Requests\FilmeAtorUpdateRequest;
use App\Repositories\FilmeAtorRepository;
use App\Validators\FilmeAtorValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class FilmeAtorsController extends Controller
{

    /**
     * @var FilmeAtorRepository
     */
    protected $repository;

    /**
     * @var FilmeAtorValidator
     */
    protected $validator;

    public function __construct(FilmeAtorRepository $repository, FilmeAtorValidator $validator)
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
        $filmeAtors = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $filmeAtors,
            ]);
        }

        return view('filmeator.index', compact('filmeAtors'));
    }


    /**
     * Show the form for creating the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('filmeator.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FilmeAtorCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(FilmeAtorCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $filmeAtor = $this->repository->create($request->all());

            $response = [
                'message' => 'FilmeAtor created.',
                'data' => $filmeAtor->toArray(),
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
        $filmeAtor = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $filmeAtor,
            ]);
        }

        return view('filmeator.show', compact('filmeAtor'));
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

        $filmeAtor = $this->repository->find($id);

        return view('filmeator.edit', compact('filmeAtor'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  FilmeAtorUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(FilmeAtorUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $filmeAtor = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'FilmeAtor updated.',
                'data' => $filmeAtor->toArray(),
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
                'message' => 'FilmeAtor deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'FilmeAtor deleted.');
    }
}
