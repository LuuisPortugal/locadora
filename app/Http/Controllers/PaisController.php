<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\PaiCreateRequest;
use App\Http\Requests\PaiUpdateRequest;
use App\Repositories\PaiRepository;
use App\Validators\PaiValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class PaisController extends Controller
{

    /**
     * @var PaiRepository
     */
    protected $repository;

    /**
     * @var PaiValidator
     */
    protected $validator;

    public function __construct(PaiRepository $repository, PaiValidator $validator)
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
        $paises = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $paises,
            ]);
        }

        return view('pai.index', compact('paises'));
    }


    /**
     * Show the form for creating the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PaiCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PaiCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $pais = $this->repository->create($request->all());

            $response = [
                'message' => 'Pai created.',
                'data' => $pais->toArray(),
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
        $pais = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $pais,
            ]);
        }

        return view('pai.show', compact('pais'));
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

        $pais = $this->repository->find($id);

        return view('pai.edit', compact('pais'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  PaiUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(PaiUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $pais = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Pai updated.',
                'data' => $pais->toArray(),
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
                'message' => 'Pais deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Pais deleted.');
    }
}
