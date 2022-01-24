<?php

namespace App\Http\Controllers;

//use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Roles;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function register_auth()
    {
        return view('admin.custom_auth.register');
    }

    public function login_auth()
    {
        return view('admin.custom_auth.login_auth');
    }

    public function logout_auth()
    {
        Auth::guard('admins')->logout();
        return redirect('/login-auth')->with('message', 'Đăng xuất Authentication thành công !');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'admin_email' => 'required|email|max:255',
            'admin_password' => 'required|max:255',
        ]);
        $data = $request->all();
        // dd($data);
        if(Auth::guard('admins')->attempt([ 'admin_email' => $data['admin_email'], 'admin_password' => $data['admin_password']])){
            return redirect('/dashboard');
        } else {
            return redirect('/login-auth')->with('message','Lỗi đăng nhập Authentication !');
        }

    }

    public function register(Request $request)
    {
        $this->validation($request); // Kiểm tra cái $request ( $request này là cái data ) coi nó OK chưa
        $data = $request->all();

        $admin = new Admin(); // mình sẽ tạo ra biến đối tượng $admin và mình sẽ gán dữ liệu từ form vào những cái trường mình đã khai báo ở lớp đó
        $admin->admin_name = $data['admin_name'];
        $admin->admin_email = $data['admin_email'];
        $admin->admin_phone = $data['admin_phone'];
        $admin->admin_password = md5($data['admin_password']);
        $admin->save(); // xong rồi mình lưu lại
        return redirect('/register-auth')->with('message', 'Đăng ký thành công');
    }

    public function validation($request)
    {
        return $this->validate($request, [
            'admin_name' => 'required|max:255',
            'admin_email' => 'required|email|max:255',
            'admin_phone' => 'required|max:255',
            'admin_password' => 'required|max:255',
        ]); // cái này là kiểm tra các trường gửi qua coi có đúng cái mình yêu cầu hay không
    }
}
