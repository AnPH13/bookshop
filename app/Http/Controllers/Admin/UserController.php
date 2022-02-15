<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends AdminController
{
    function __construct()
    {
        parent::__construct();
        $this->model = new User();
        $this->data = $this->model->paginate($this->perPage);
        $this->type = [
            'momo'
        ];
        $this->view = 'admin.screen.user.';
    }
    public function index()
    {
        return view($this->view.'home')->with(['data' => $this->data, 'table' => 'user']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->view.'edit')->with(['data' => $this->data, 'type' => $this->type, 'table' => 'user']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' =>'required|email|unique:users',
            'password'=>'required',
            'name'=>'required',
        ] , [
            'email.unique' =>'Email đã rồn tại',
            'email.required' =>'Vui lòng nhập email',
            'email.email' =>'Vui lòng nhập đúng định dạng email',
            'password.required' =>'Vui lòng nhập nhập mật khẩu',
            'name.required' => 'Vui lòng nhập họ tên'
        ]);
        // upload avatar
        if($request->avatar){
            $name = uploadImage($request, 'avatar');
            if(!$name){
                return back()->withInput();
            }
        }
        // add dữ liệu
        $data = addWithParams('users',[
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $data1 = addWithParams('user_details',[
            'name' => $request->name,
            'avatar' => $name ?? '',
            'birthday' => $request->birthday,
            'number_phone' => $request->number_phone,
            'gender' => $request->gender == 'on' ? 1 : 0,
        ]);
        if($data && $data1){
            return redirect()->route('user.index');
        }
        return back()->withErrors(['msg'=>$data]);
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
        $data = $this->model->find($id);
        return view($this->view.'edit')->with(['id' => $id, 'data' => $data, 'type' => $this->type, 'table' => 'user']);
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
        $this->validate($request, [
            'email' =>'required|email',
            'name'=>'required',
        ] , [
            'email.required' =>'Vui lòng nhập email',
            'email.email' =>'Vui lòng nhập đúng định dạng email',
            'name.required' => 'Vui lòng nhập họ tên'
        ]);
        // upload avatar
        if($request->avatar){
            $name = uploadImage($request, 'avatar');
            if(!$name){
                return back()->withInput();
            }
        }
        // update dữ liệu
        $data = editByWhere('users',[
            'email' => $request->email,
        ],['id'=>$id]);
        $data1 = editByWhere('user_details',[
            'name' => $request->name,
            'avatar' => $name ?? '',
            'birthday' => $request->birthday,
            'number_phone' => $request->number_phone,
            'gender' => $request->gender == 'on' ? 1 : 0,
        ],['id'=>$id]);
        if($data && $data1){
            return redirect()->route('user.index');
        }
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data1 = deleteByWhere('user_details', $id);
        $data = deleteByWhere('users', $id);
        // $this->model::find($id)->delete();
        return redirect()->route('user.index');
    }
}
