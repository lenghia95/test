<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Response;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index',[
            'users' => User::getUsers(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $store = new User;
        $store->username = strip_tags($request->username);
        $store->email    = strip_tags($request->email);
        $store->password = bcrypt(strip_tags($request->password));
        $store->fullname = strip_tags($request->fullname);
        $store->phone    = strip_tags($request->phone);
        $store->address  = strip_tags($request->address);
        $store->status   = (strip_tags($request->status) == 1) ? 1 : 0;
        $store->save();
        return redirect()->back()->with('success','Bạn đã thêm thành công 1 người dùng');
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
        //
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
        $update =  User::getUser($id);
        if( ! $update){
            return redirect()->back()->with('failed','Người dùng không tồn tại');
        }
        $update->fullname = strip_tags($request->fullname);
        $update->phone    = strip_tags($request->phone);
        $update->address  = strip_tags($request->address);
        $update->status   = (strip_tags($request->status) == 1) ? 1 : 0;
        $update->save();
        return redirect()->back()->with('success','Bạn đã cập nhật thành công  người dùng '.$update->email);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::getUser($id);
        if( ! $user){
            return redirect()->back()->with('failed','Người dùng không tồn tại');
        }

        $del = $user->delete();
        if($del){
            return redirect()->back()->with('success','Bạn đã xóa thành công người dùng '.$user->email);
        }
        return redirect()->back()->with('failed','Xóa thất bại đã có lỗi xảy ra');

    }

    public function ajaxEdit($id)
    {
        return view('users.edit',[
            'user'  => User::getUser($id),
        ]);
    }

    public function ajaxShow($id)
    {
        return view('users.show',[
            'user'  => User::getUser($id),
        ]);
    }

    public function checkEmail(Request $request)
    {
        $check = User::where('email',strip_tags($request->email))->first();
        if($check) {
            return Response::json(array('msg' => 'true'));
        }
        return Response::json(array('msg' => 'false'));
    }

    
}
