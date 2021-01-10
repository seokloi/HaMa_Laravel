<?php

namespace App\Http\Controllers;
use App\SanPham;
use App\HinhSP;
use App\User;
use App\BaiViet;
use App\GioHang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function Index(){
		return view('user.index');
	}
	public function Search(){
		if(isset($_GET['search'])){
            $sanpham = SanPham::where('TenSanPham', 'like', '%' . $_GET['search'] . '%')->where('Hidden', '<>' , 1)->paginate(12);
            return view('user.search', ['sanpham'=>$sanpham]);
        }else{
            $sanpham = SanPham::where('Hidden', '<>' , 1)->paginate(12);
            return view('user.search', ['sanpham'=>$sanpham]);
        }
	}
	public function Shop(Request $request){
		if(isset($_REQUEST['IDTL'])){
            $sanpham = SanPham::where('IDTL', $_REQUEST['IDTL'])->where('Hidden', '<>' , 1)->paginate(12);
            return view('user.category_page', ['sanpham'=>$sanpham]);
        }else{
            $sanpham = SanPham::where('Hidden', '<>' , 1)->paginate(12);
            return view('user.category_page', ['sanpham'=>$sanpham]);
        }
	}

	public function ProDuct_Detail(){
		if(isset($_REQUEST['IDSP'])){
            $sanpham = SanPham::where('IDSP',$_REQUEST['IDSP'])->where('Hidden', '<>' , 1)->first();
			$hinhsp = HinhSP::where('IDSP',$_REQUEST['IDSP'])->get();
            return view('user.product_detail_page', ['sanpham'=>$sanpham, 'hinhsp'=>$hinhsp]);
        }else return 0;
	}
    function postGioHang(Request $request){
        $this->validate($request,
        [
            'product_size'=>'required',
            'product_quantity'=>'required'
        ],[
            'product_size.required'=>'Bạn chưa chọn sản phẩm',
            'product_quantity.required'=>'Bạn chưa nhập số lượng'
        ]);
        if (ThemGioHang($request->product_size,$request->product_quantity) == 1)
        {
        return redirect('product?IDSP='.$_REQUEST['IDSP'])->with('thongbao','Thêm thành công');
        }
        else
        {
        $giohang = new GioHang;
        $giohang->IDCTSP = $request->product_size;
		$giohang->SoLuong = $request->product_quantity;
        $giohang->IDND = Auth::user()->id;
		$giohang->save();
        return redirect('product?IDSP='.$_REQUEST['IDSP'])->with('thongbao','Thêm thành công');
        }
    }
    public function getXoaGioHang(){
		if (isset($_REQUEST['IDGH']))
		{
            $giohang = GioHang::where('IDGH',$_REQUEST['IDGH'])->first();
            $giohang->where('IDGH',$_REQUEST['IDGH'])->delete();
        }
		return redirect('cart_page');
    }
    public function PostCart(Request $request){
        $this->validate($request,
        [
            'quantity'=>'required',
            'IDGH'=>'required'
        ],[
            'quantity.required'=>'Bạn chưa nhập số lượng',
            'IDGH.required'=>'Bạn chưa chọn sản phẩm'
        ]);
        $giohang = GioHang::where('IDGH',$request->IDGH)
		->update([
				'SoLuong' => $request->quantity
				]);
        return redirect('cart_page')->with('thongbao',$request->quantity);
    }
	
	public function Blog(){
    
        $blogs = BaiViet::paginate(6);
		return view('user.blog_page', ['blogs'=>$blogs]);
	}
	public function Single_Blog(){
        if(isset($_REQUEST['IDBV'])){
            $baiviet = BaiViet::where('IDBV',$_REQUEST['IDBV'])->first();
            return view('user.single_blog', ['baiviet'=>$baiviet]);
        }else return 0;
	}
	
	public function About(){
		return view('user.about');
	}
	public function Contact_Us(){
		return view('user.contact_us');
	}
	public function PostContact_Us(){
		return view('user.contact_us');
	}
	public function Contact_Me(){
		return view('user.contact_me');
	}
	
	public function Cart(){
		return view('user.cart_page');
	}
	public function CheckOut(){
		return view('user.checkout_page');
	}
	
	public function Login(){
		return view('user.login');
	}
	public function PostLogin(Request $request){
		$this->validate($request,
		[
			'username'=>'required',
			'password'=>'required'
		],[
			'username.required'=>'Vui lòng nhập Tên đăng nhập.',
			'password.required'=>'Vui lòng nhập Password.'
		]);

		if(Auth::attempt (['email'=>$request->username,'password'=>$request->password])){
			$user = Auth::user();
			if($user->Quyen == 0){
				return redirect('/');
			}else{
				Auth::logout();
				return redirect('login')->with('thongbao', 'Bạn không có quyền đăng nhập');
			}
		}
		return redirect('login')->with('thongbao','Email hoặc mật khẩu không đúng!');
	}
	public function Logout(){
		Auth::logout();
		return redirect('login')->with('thongbao','Đăng xuất thành công');
	}
	
	public function Register(){
		return view('user.register');
	}
	public function PostRegister(Request $request){
		$this->validate($request,
        [
			'username' => 'required|min:3|max:100',
            'email' => 'required|email|unique:users,email',           
            'password' => 'required|min:6|max:40',
            'confirm-password' => 'required|same:password',
			'ngaysinh' =>'required|max:100',
            'diachi' => 'required|max:250',
            'sdt' => 'required|max:250|min:9'
        ],[
            'username.required' => 'Bạn chưa nhập tên người dùng',
            'username.min' => 'Tên người dùng từ 3 kí tự đến 100 kí tự',
            'username.max' => 'Tên người dùng từ 3 kí tự đến 100 kí tự',
            'email.required' => 'Bạn chưa nhập địa chỉ email',
            'email.email' => 'Vui lòng nhập đúng địa chỉ email',
            'email.unique' => 'Email của bạn đã tồn tại',
            'password.required' => 'Bạn chưa nhập password',
            'password.min' => 'Mật khẩu ít nhất 6 kí tự ',
            'password.max' => 'Mật khẩu tối đa 40 kí tự',
            'confirm-password.required' => 'Bạn chưa nhập lại mật khẩu',
            'confirm-password.same' => 'Nhập lại mật khẩu không chính xác',
			'ngaysinh.required' => 'Vui lòng nhập ngày sinh',
			'ngaysinh.max' => 'Ngày sinh không đúng',
            'diachi.required' => 'Bạn chưa nhập địa chỉ',
            'diachi.max' => 'Địa chỉ không dài quá 250 kí tự',
            'sdt.required' => 'Bạn chưa nhập số điện thoại',
            'sdt.max' => 'Số điện thoại không đúng',
            'sdt.min' => 'Số điện thoại không đúng'
        ]);
        $user = new User;
        $user->TenNguoiDung = $request->username;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
		$user->NgaySinh = $request->ngaysinh;
        $user->GioiTinh = $request->txtSex;
        $user->DiaChi = $request->diachi;
        $user->SDT = $request->sdt;
        $user->Quyen = 0;
        $user->save();
        return redirect('login')->with('thongbao','Đăng ký thành công!');
	}
}


