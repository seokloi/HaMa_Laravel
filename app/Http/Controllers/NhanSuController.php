<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class NhanSuController extends Controller
{
    //Login
    public function getDangNhap(){
        return view('admin.login');
    }

    public function postDangNhap(Request $request){
        $this->validate($request, 
        [
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'Bạn chưa nhập email',
            'password.required' => 'Bạn chưa nhập mật khẩu'
        ]);
        
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
            $user = Auth::user();
            if($user->Quyen == 1){
                return redirect('admin/sanpham/danhsach');
            }
            else{
                return redirect('admin/dangnhap');
            }
        }
        else{
            return redirect('admin/dangnhap');
        }
    }

    public function getDangXuat(){
        Auth::logout();
        return redirect('admin/dangnhap');
    }

    public function getDoi($id){
        $info = User::find($id);
        if($info->Quyen == 0){
            return redirect('admin/sanpham/danhsach');
        }
        return view('admin.doimatkhau', ['info'=>$info]);
    }

    public function postDoi(Request $request, $id){
        $this->validate($request, 
        [
            'password' => 'required|min:6|max:50',
            'passwordAgain' => 'required|same:password'
        ],
        [
            'password.required' => 'Bạn chưa nhập password',
            'password.min' => 'Mật khẩu ít nhất 6 kí tự và tối đa 32 kí tự',
            'password.max' => 'Mật khẩu ít nhất 6 kí tự và tối đa 32 kí tự',
            'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same' => 'Nhập lại mật khẩu không chính xác'
        ]);
        $user = User::find($id);
        $user->password = bcrypt($request->password);

        $user->save();
        return redirect('admin/'.$id)->with('thongbao', 'Đổi mật khẩu thành công!');
    }

    //Thong tin
    public function getDanhSach()
    {
        $nhanvien = User::where('Quyen', 1)->get();   
        return view('admin.nhanvien.danhsach',['nhanvien'=>$nhanvien]);
    }

    public function getThem()
    {
        return view('admin.nhanvien.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
        [
            'txtEmail' => 'required|email|unique:users,email',           
            'txtPass' => 'required|min:6|max:40',
            'txtRePass' => 'required|same:txtPass',
            'txtName' => 'required|min:3|max:100',
            'txtDateBirdth' =>'max:100',
            'txtAddress' => 'required|max:250',
            'txtPhone' => 'required|max:250|min:9'
        ],[
            'txtName.required' => 'Bạn chưa nhập tên người dùng',
            'txtName.min' => 'Tên người dùng từ 3 kí tự đến 100 kí tự',
            'txtName.max' => 'Tên người dùng từ 3 kí tự đến 100 kí tự',
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Vui lòng nhập đúng email',
            'email.unique' => 'Email của bạn đã tồn tại',
            'txtPass.required' => 'Bạn chưa nhập password',
            'txtPass.min' => 'Mật khẩu ít nhất 6 kí tự ',
            'txtPass.max' => 'Mật khẩu tối đa 40 kí tự',
            'txtRePass.required' => 'Bạn chưa nhập lại mật khẩu',
            'txtRePass.same' => 'Nhập lại mật khẩu không chính xác',
            'txtDateBirdth.max' => 'Ngày sinh không đúng',
            'txtAddress.required' => 'Bạn chưa nhập địa chỉ',
            'txtAddress.max' => 'Địa chỉ không dài quá 250 kí tự',
            'txtPhone.required' => 'Bạn chưa nhập số điện thoại',
            'txtPhone.max' => 'Số điện thoại không đúng',
            'txtPhone.min' => 'Số điện thoại không đúng'
        ]);

        $nhanvien = new User;
        $nhanvien->TenNguoiDung = $request->txtName;
        $nhanvien->password = bcrypt($request->txtPass);
        $nhanvien->email = $request->txtEmail;
        $nhanvien->NgaySinh = $request->txtDateBirdth;
        $nhanvien->GioiTinh = $request->txtSex;
        $nhanvien->DiaChi = $request->txtAddress;
        $nhanvien->SDT = $request->txtPhone;
        $nhanvien->Quyen = 1;
        $nhanvien->save();
        return redirect('admin/nhanvien/danhsach')->with('thongbao','Thêm thành công!');
    }

    public function getSua()
    {
        if(isset($_REQUEST['id']))
        {
        $nhanvien = User::find($_REQUEST['id']);
        if($nhanvien->Quyen == 1)
            return view('admin.nhanvien.sua', ['nhanvien'=>$nhanvien]);
        }
        return redirect('admin/nhanvien/danhsach');
    }

    public function postSua(Request $request){
        $this->validate($request,
        [
            'txtName' => 'required|min:3|max:100',
            'txtDateBirdth' =>'max:100',
            'txtAddress' => 'required|max:250',
            'txtPhone' => 'required|max:250|min:9'
        ],[
            'txtName.required' => 'Bạn chưa nhập tên người dùng',
            'txtName.min' => 'Tên người dùng từ 3 kí tự đến 100 kí tự',
            'txtName.max' => 'Tên người dùng từ 3 kí tự đến 100 kí tự',
            'txtDateBirdth.max' => 'Ngày sinh không đúng',
            'txtAddress.required' => 'Bạn chưa nhập địa chỉ',
            'txtAddress.max' => 'Địa chỉ không dài quá 250 kí tự',
            'txtPhone.required' => 'Bạn chưa nhập số điện thoại',
            'txtPhone.max' => 'Số điện thoại không đúng',
            'txtPhone.min' => 'Số điện thoại không đúng'
        ]);

        $nhanvien = User::find($_REQUEST['id']);
        $nhanvien->TenNguoiDung = $request->txtName;
        if($request->changePassword == "on"){
            $this->validate($request,
            [
                'txtPass' => 'required|min:6|max:40',
                'txtRePass' => 'required|same:txtPass',
            ],[
                'txtPass.required' => 'Bạn chưa nhập password',
                'txtPass.min' => 'Mật khẩu ít nhất 6 kí tự ',
                'txtPass.max' => 'Mật khẩu tối đa 40 kí tự',
                'txtRePass.required' => 'Bạn chưa nhập lại mật khẩu',
                'txtRePass.same' => 'Nhập lại mật khẩu không chính xác',
            ]);
            $user->password = bcrypt($request->password);
        }
        $nhanvien->NgaySinh = $request->txtDateBirdth;
        $nhanvien->GioiTinh = $request->txtSex;
        $nhanvien->DiaChi = $request->txtAddress;
        $nhanvien->SDT = $request->txtPhone;
        $nhanvien->Quyen = 1;
        $nhanvien->save();
        return redirect('admin/nhanvien/danhsach')->with('thongbao','Thêm thành công!');
    }

    public function getXoa(){
        $user = User::find($_REQUEST['id']);
        if($user->Quyen == 1){
            $user->delete();
            return redirect('admin/nhanvien/danhsach')->with('thongbao', 'Xóa người dùng thành công');
        }
        return redirect('admin/nhanvien/danhsach');
    }
}
