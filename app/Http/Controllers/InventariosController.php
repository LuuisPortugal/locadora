<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\InventarioCreateRequest;
use App\Http\Requests\InventarioUpdateRequest;
use App\Repositories\InventarioRepository;
use App\Validators\InventarioValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class InventariosController extends Controller
{

    /**
     * @var InventarioRepository
     */
    protected $repository;

    /**
     * @var InventarioValidator
     */
    protected $validator;

    public function __construct(InventarioRepository $repository, InventarioValidator $validator)
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
        $inventarios = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $inventarios,
            ]);
        }

        return view('inventario.index', compact('inventarios'));
    }


    /**
     * Show the form for creating the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  InventarioCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(InventarioCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $inventario = $this->repository->create($request->all());

            $response = [
                'message' => 'Inventario created.',
                'data' => $inventario->toArray(),
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
        $inventario = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $inventario,
            ]);
        }

        return view('inventario.show', compact('inventario'));
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

        $inventario = $this->repository->find($id);

        return view('inventario.edit', compact('inventario'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  InventarioUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(InventarioUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $inventario = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Inventario updated.',
                'data' => $inventario->toArray(),
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
                'message' => 'Inventario deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Inventario deleted.');
    }
}
