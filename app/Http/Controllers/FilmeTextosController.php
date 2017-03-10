<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\FilmeTextoCreateRequest;
use App\Http\Requests\FilmeTextoUpdateRequest;
use App\Repositories\FilmeTextoRepository;
use App\Validators\FilmeTextoValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class FilmeTextosController extends Controller
{

    /**
     * @var FilmeTextoRepository
     */
    protected $repository;

    /**
     * @var FilmeTextoValidator
     */
    protected $validator;

    public function __construct(FilmeTextoRepository $repository, FilmeTextoValidator $validator)
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
        $filmeTextos = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $filmeTextos,
            ]);
        }

        return view('filmetexto.index', compact('filmeTextos'));
    }


    /**
     * Show the form for creating the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('filmetexto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FilmeTextoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(FilmeTextoCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $filmeTexto = $this->repository->create($request->all());

            $response = [
                'message' => 'FilmeTexto created.',
                'data' => $filmeTexto->toArray(),
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
        $filmeTexto = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $filmeTexto,
            ]);
        }

        return view('filmetexto.show', compact('filmeTexto'));
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

        $filmeTexto = $this->repository->find($id);

        return view('filmetexto.edit', compact('filmeTexto'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  FilmeTextoUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(FilmeTextoUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $filmeTexto = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'FilmeTexto updated.',
                'data' => $filmeTexto->toArray(),
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
                'message' => 'FilmeTexto deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'FilmeTexto deleted.');
    }
}
