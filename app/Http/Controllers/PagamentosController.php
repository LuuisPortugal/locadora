<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\PagamentoCreateRequest;
use App\Http\Requests\PagamentoUpdateRequest;
use App\Repositories\PagamentoRepository;
use App\Validators\PagamentoValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class PagamentosController extends Controller
{

    /**
     * @var PagamentoRepository
     */
    protected $repository;

    /**
     * @var PagamentoValidator
     */
    protected $validator;

    public function __construct(PagamentoRepository $repository, PagamentoValidator $validator)
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
        $pagamentos = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $pagamentos,
            ]);
        }

        return view('pagamento.index', compact('pagamentos'));
    }


    /**
     * Show the form for creating the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pagamento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PagamentoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PagamentoCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $pagamento = $this->repository->create($request->all());

            $response = [
                'message' => 'Pagamento created.',
                'data' => $pagamento->toArray(),
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
        $pagamento = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $pagamento,
            ]);
        }

        return view('pagamento.show', compact('pagamento'));
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

        $pagamento = $this->repository->find($id);

        return view('pagamento.edit', compact('pagamento'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  PagamentoUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(PagamentoUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $pagamento = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Pagamento updated.',
                'data' => $pagamento->toArray(),
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
                'message' => 'Pagamento deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Pagamento deleted.');
    }
}
