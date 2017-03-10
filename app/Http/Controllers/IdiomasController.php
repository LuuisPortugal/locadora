<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\IdiomaCreateRequest;
use App\Http\Requests\IdiomaUpdateRequest;
use App\Repositories\IdiomaRepository;
use App\Validators\IdiomaValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class IdiomasController extends Controller
{

    /**
     * @var IdiomaRepository
     */
    protected $repository;

    /**
     * @var IdiomaValidator
     */
    protected $validator;

    public function __construct(IdiomaRepository $repository, IdiomaValidator $validator)
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
        $idiomas = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $idiomas,
            ]);
        }

        return view('idioma.index', compact('idiomas'));
    }


    /**
     * Show the form for creating the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('idioma.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  IdiomaCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(IdiomaCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $idioma = $this->repository->create($request->all());

            $response = [
                'message' => 'Idioma created.',
                'data' => $idioma->toArray(),
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
        $idioma = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $idioma,
            ]);
        }

        return view('idioma.show', compact('idioma'));
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

        $idioma = $this->repository->find($id);

        return view('idioma.edit', compact('idioma'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  IdiomaUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(IdiomaUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $idioma = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Idioma updated.',
                'data' => $idioma->toArray(),
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
                'message' => 'Idioma deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Idioma deleted.');
    }
}
