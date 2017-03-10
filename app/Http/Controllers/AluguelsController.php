<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\AluguelCreateRequest;
use App\Http\Requests\AluguelUpdateRequest;
use App\Repositories\AluguelRepository;
use App\Validators\AluguelValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class AluguelsController extends Controller
{

    /**
     * @var AluguelRepository
     */
    protected $repository;

    /**
     * @var AluguelValidator
     */
    protected $validator;

    public function __construct(AluguelRepository $repository, AluguelValidator $validator)
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
        $aluguels = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $aluguels,
            ]);
        }

        return view('aluguels.index', compact('aluguels'));
    }

    /**
     * Show the form for creating the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aluguels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AluguelCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AluguelCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $aluguel = $this->repository->create($request->all());

            $response = [
                'message' => 'Aluguel created.',
                'data' => $aluguel->toArray(),
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
        $aluguel = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $aluguel,
            ]);
        }

        return view('aluguels.show', compact('aluguel'));
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

        $aluguel = $this->repository->find($id);

        return view('aluguels.edit', compact('aluguel'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  AluguelUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(AluguelUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $aluguel = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Aluguel updated.',
                'data' => $aluguel->toArray(),
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
                'message' => 'Aluguel deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Aluguel deleted.');
    }
}
