<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\FuncionarioCreateRequest;
use App\Http\Requests\FuncionarioUpdateRequest;
use App\Repositories\FuncionarioRepository;
use App\Validators\FuncionarioValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class FuncionariosController extends Controller
{

    /**
     * @var FuncionarioRepository
     */
    protected $repository;

    /**
     * @var FuncionarioValidator
     */
    protected $validator;

    public function __construct(FuncionarioRepository $repository, FuncionarioValidator $validator)
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
        $funcionarios = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $funcionarios,
            ]);
        }

        return view('funcionario.index', compact('funcionarios'));
    }


    /**
     * Show the form for creating the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('funcionario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FuncionarioCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(FuncionarioCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $funcionario = $this->repository->create($request->all());

            $response = [
                'message' => 'Funcionario created.',
                'data' => $funcionario->toArray(),
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
        $funcionario = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $funcionario,
            ]);
        }

        return view('funcionario.show', compact('funcionario'));
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

        $funcionario = $this->repository->find($id);

        return view('funcionario.edit', compact('funcionario'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  FuncionarioUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(FuncionarioUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $funcionario = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Funcionario updated.',
                'data' => $funcionario->toArray(),
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
                'message' => 'Funcionario deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Funcionario deleted.');
    }
}
