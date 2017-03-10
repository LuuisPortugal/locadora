<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\LojaCreateRequest;
use App\Http\Requests\LojaUpdateRequest;
use App\Repositories\LojaRepository;
use App\Validators\LojaValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class LojasController extends Controller
{

    /**
     * @var LojaRepository
     */
    protected $repository;

    /**
     * @var LojaValidator
     */
    protected $validator;

    public function __construct(LojaRepository $repository, LojaValidator $validator)
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
        $lojas = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $lojas,
            ]);
        }

        return view('loja.index', compact('lojas'));
    }


    /**
     * Show the form for creating the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('loja.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  LojaCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(LojaCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $loja = $this->repository->create($request->all());

            $response = [
                'message' => 'Loja created.',
                'data' => $loja->toArray(),
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
        $loja = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $loja,
            ]);
        }

        return view('loja.show', compact('loja'));
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

        $loja = $this->repository->find($id);

        return view('loja.edit', compact('loja'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  LojaUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(LojaUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $loja = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Loja updated.',
                'data' => $loja->toArray(),
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
                'message' => 'Loja deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Loja deleted.');
    }
}
