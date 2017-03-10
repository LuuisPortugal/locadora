<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\FilmeCreateRequest;
use App\Http\Requests\FilmeUpdateRequest;
use App\Repositories\FilmeRepository;
use App\Validators\FilmeValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class FilmesController extends Controller
{

    /**
     * @var FilmeRepository
     */
    protected $repository;

    /**
     * @var FilmeValidator
     */
    protected $validator;

    public function __construct(FilmeRepository $repository, FilmeValidator $validator)
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
        $filmes = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $filmes,
            ]);
        }

        return view('filme.index', compact('filmes'));
    }


    /**
     * Show the form for creating the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('filme.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FilmeCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(FilmeCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $filme = $this->repository->create($request->all());

            $response = [
                'message' => 'Filme created.',
                'data' => $filme->toArray(),
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
        $filme = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $filme,
            ]);
        }

        return view('filme.show', compact('filme'));
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

        $filme = $this->repository->find($id);

        return view('filme.edit', compact('filme'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  FilmeUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(FilmeUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $filme = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Filme updated.',
                'data' => $filme->toArray(),
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
                'message' => 'Filme deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Filme deleted.');
    }
}
