<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\EnderecoCreateRequest;
use App\Http\Requests\EnderecoUpdateRequest;
use App\Repositories\EnderecoRepository;
use App\Validators\EnderecoValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class EnderecosController extends Controller
{

    /**
     * @var EnderecoRepository
     */
    protected $repository;

    /**
     * @var EnderecoValidator
     */
    protected $validator;

    public function __construct(EnderecoRepository $repository, EnderecoValidator $validator)
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
        $enderecos = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $enderecos,
            ]);
        }

        return view('endereco.index', compact('enderecos'));
    }


    /**
     * Show the form for creating the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('endereco.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EnderecoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(EnderecoCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $endereco = $this->repository->create($request->all());

            $response = [
                'message' => 'Endereco created.',
                'data' => $endereco->toArray(),
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
        $endereco = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $endereco,
            ]);
        }

        return view('endereco.show', compact('endereco'));
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

        $endereco = $this->repository->find($id);

        return view('endereco.edit', compact('endereco'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  EnderecoUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(EnderecoUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $endereco = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Endereco updated.',
                'data' => $endereco->toArray(),
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
                'message' => 'Endereco deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Endereco deleted.');
    }
}
