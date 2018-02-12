<?php

namespace App\Http\Controllers;

use Istruct\Facades\InputFa;
use App\Http\Requests\PermissionCreateRequest;
use App\Http\Requests\PermissionUpdateRequest;
use App\Repositories\PermissionRepository;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $repository;
    public function __construct(PermissionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = $request->all();
        $data['permissions'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('permissions.table', $data)->render();
        }
        return view('permissions.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionCreateRequest $request)
    {
        $input = $request->all();
        $data = $this->repository->create($input);
        if($data) {
            session()->flash('success', 'SUCCESS');
        } else {
            session()->flash('error', 'ERROR');
        }
        return redirect(route('permissions.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = $this->repository->find($id);
        if(empty($permission))
        {
            session()->flash('error', 'NOT FOUND');
            return redirect()->back();
        }
        return view('permissions.update', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $permission = $this->repository->find($id);
        if(empty($permission))
        {
            session()->flash('error', 'NOT FOUND');
            return redirect()->back();
        }
        $data = $this->repository->change($input, $permission);
        if($data) {
            session()->flash('success', 'Update success');
            return redirect()->back();
        } else {
            session()->flash('error', 'Update fail');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = $this->repository->find($id);
        if(empty($permission))
        {
            session()->flash('error', 'NOT FOUND');
            return redirect()->back();
        }
        $this->repository->delete($id);
        session()->flash('success', 'Delete success');
        return redirect()->back();
    }
}
