<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\AtorCreateRequest;
use App\Http\Requests\AtorUpdateRequest;
use App\Repositories\AtorRepository;
use App\Validators\AtorValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class AtorsController extends Controller
{

    /**
     * @var AtorRepository
     */
    protected $repository;

    /**
     * @var AtorValidator
     */
    protected $validator;

    public function __construct(AtorRepository $repository, AtorValidator $validator)
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
        $ators = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $ators,
            ]);
        }

        return view('ator.index', compact('ators'));
    }


    /**
     * Show the form for creating the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ator.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  AtorCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AtorCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $ator = $this->repository->create($request->all());

            $response = [
                'message' => 'Ator created.',
                'data' => $ator->toArray(),
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
        $ator = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $ator,
            ]);
        }

        return view('ator.show', compact('ator'));
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

        $ator = $this->repository->find($id);

        return view('ator.edit', compact('ator'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  AtorUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(AtorUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $ator = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Ator updated.',
                'data' => $ator->toArray(),
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
                'message' => 'Ator deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Ator deleted.');
    }
}
