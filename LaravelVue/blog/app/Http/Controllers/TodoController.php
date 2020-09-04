<?php

namespace App\Http\Controllers;

use App\Todo;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Http\Request;


class TodoController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todo = Todo::orderBy('created_at','desc')->get();
        return $this->sendResponse($todo->toArray(),"Get list todo success");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();   /////thay thế cho việc insert từng trường vào bảng
        $validate = $request->validate(
            [
                'title'=>'required|string',
                'description'=>'required',
                'status'=>'required'
            ]
        );
        ///Sử dụng khi custom Validate
//        if($validate->fails()){
//            return $this->sendErrors('Error Validate', $validate->error());
//        }
        $todo = Todo::create($input);
        return $this->sendResponse($todo->toArray(),'Created Successfully');
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
        $todo = Todo::find($id);
        if(is_null($todo)) {
            return $this->sendErrors('Todo not found');
        }
        return $this->sendResponse($todo->toArray(),'Get todo success');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        var_dump($request->all());

        $validate = $request->validate(
            [
                'title'=>'required|string',
                'description'=>'required',
                'status'=>'required'
            ]
        );
        ///Sử dụng khi custom Validate
//        if($validate->fails()){
//            return $this->sendErrors('Error Validate', $validate->error());
//        }
        $todo = Todo::find($id);
        $todo->title = $input['title'];
        $todo->description = $input['description'];
        $todo->status = $input['status'];
        $todo->save();
        return $this->sendResponse($todo->toArray(),'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo=Todo::find($id);
        $todo->delete();
        return $this->sendResponse($todo->toArray(),'Delete Successfully');
    }
}
