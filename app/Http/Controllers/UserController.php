<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\dangKyValid;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    function dangnhap()
    {
        return view('dangnhap');
    }
    function dangnhap_(Request $request)
    {
        if (auth()->guard('web')
            ->attempt(['email' => $request['email'], 'password' => $request['matkhau']])
        ) {
            $user = auth()->guard('web')->user();

            return redirect()->intended('/');
        } else return back()->with('thongbao', 'Email, Password không đúng');
    }
    function dangky()
    {
        return view('dangky');
    }
    function dangky_(dangKyValid $request)
    {
        $u = new User();
        $u->email = strtolower(trim(strip_tags($request['email'])));
        $u->name = trim(strip_tags($request['name']));
        $u->password = trim(strip_tags(Hash::make($request['mk1'])));
        $u->dia_chi = trim(strip_tags($request['dia_chi']));
        $u->dien_thoai = trim(strip_tags($request['dien_thoai']));
        $u->save();
        $id_user  = $u->id;
        if (auth()->guard('web')->attempt(['email' => $request['email'], 'password' => $request['mk1']])) {
            $user = auth()->guard('web')->user();
            event(new Registered($user));

            return redirect('/camon')->with('thongbao', "Đăng ký hoàn tất!");
        } else return back()->with('thongbao', 'Đăng ký không thành công');
    }
    function thoat()
    {
        auth()->guard('web')->logout();
        return redirect('/dangnhap')->with('thongbao', 'Bạn đã thoát thành công');
    }
    function camon()
    {
        return view('camon');
    }
}
