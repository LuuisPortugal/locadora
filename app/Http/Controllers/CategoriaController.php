<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CategoriumCreateRequest;
use App\Http\Requests\CategoriumUpdateRequest;
use App\Repositories\CategoriumRepository;
use App\Validators\CategoriumValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class CategoriaController extends Controller
{

    /**
     * @var CategoriumRepository
     */
    protected $repository;

    /**
     * @var CategoriumValidator
     */
    protected $validator;

    public function __construct(CategoriumRepository $repository, CategoriumValidator $validator)
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
        $categoria = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $categoria,
            ]);
        }

        return view('categorium.index', compact('categoria'));
    }


    /**
     * Show the form for creating the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorium.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  CategoriumCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriumCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $categorium = $this->repository->create($request->all());

            $response = [
                'message' => 'Categorium created.',
                'data' => $categorium->toArray(),
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
        $categorium = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $categorium,
            ]);
        }

        return view('categorium.show', compact('categorium'));
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

        $categorium = $this->repository->find($id);

        return view('categorium.edit', compact('categorium'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  CategoriumUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(CategoriumUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $categorium = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Categorium updated.',
                'data' => $categorium->toArray(),
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
                'message' => 'Categorium deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Categorium deleted.');
    }
}
