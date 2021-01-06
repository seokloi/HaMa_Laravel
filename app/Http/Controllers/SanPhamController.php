<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\CT_SP;
use App\Mau;
use App\Size;
use App\SanPham;
use App\HinhSP;
use App\TheLoai;

class SanPhamController extends Controller
{
    public function getDanhSach(){
        if(isset($_REQUEST['maloai'])){
            $sanpham = SanPham::where('IDSP', $_REQUEST['maloai'])->get();
            return view('admin.sanpham.danhsach', ['sanpham'=>$sanpham]);
        }else{
            $sanpham = SanPham::all();
            return view('admin.sanpham.danhsach', ['sanpham'=>$sanpham]);
        }
    }

    public function getThem(){
        return view('admin.sanpham.them');
    }
    public function postThem(Request $request){
        $this->validate($request,
        [
            'TenSanPham'=>'required|max:30',
            'Gia'=>'required|max:10',
            'Sale'=>'required|max:3',
            'TheLoai'=>'required|max:10',
            'MoTa'=>'required|max:1500'
        ],[
            'TenSanPham.required'=>'Bạn chưa nhập tên sản phẩm',
            'TenSanPham.max'=>'Tên sản phẩm không dài quá 30 kí tự',
            'Gia.required'=>'Bạn chưa nhập giá sản phẩm',
            'Gia.max'=>'Giá không dài quá 10 kí tự',
            'Sale.max'=>'Sale không vượt quá 100%',
            'TheLoai.required'=>'Bạn chưa chọn thể loại',
            'HinhChinh.required'=>'Bạn chưa chọn hình chính',
            'MoTa.max'=>'Mô tả không được vượt quá 1500 kí tự'
        ]);

        $sanpham = new SanPham;
        $sanpham->TenSanPham = $request->TenSanPham;
		$sanpham->Gia = $request->Gia;
		$sanpham->Sale = $request->Sale;
		$sanpham->IDTL = $request->TheLoai;
		$sanpham->MoTa = $request->MoTa;
        if($request->hasFile('HinhChinh')){
            $file = $request->file('HinhChinh');
            //Lay ten hinh de kiem tra
            $name = $file->getClientOriginalName();
            $duoi = $file->getClientOriginalExtension();
            $hinh = Str::random(4)."_".$name;
            while(file_exists("user/images/product".$hinh)){
                $hinh = Str::random(4).$name;
            }
            $file->move("user/images/product", $hinh);
            $sanpham->HinhChinh = $hinh;
        }
		$sanpham->save();
		/*$hinhsp = new HinhSP;
		$hinhsp->IDSP = $sanpham->IDSP;
		$hinhsp->TenHinhSP = $sanpham->HinhChinh;
		$hinhsp->save();
		if($request->hasFile('HinhPhu')){
			$hinhsp = new HinhSP;
			$hinhsp->IDSP = $sanpham->IDSP;
			
            $file = $request->file('HinhPhu');
            //Lay ten hinh de kiem tra
            $name = $file->getClientOriginalName();
            $duoi = $file->getClientOriginalExtension();
            $hinh = Str::random(4)."_".$name;
            while(file_exists("user/images/product".$hinh)){
                $hinh = Str::random(4).$name;
            }
            $file->move("user/images/product", $hinh);
            $hinhsp->TenHinhSP = $hinh;
			$hinhsp->save();
        } */
        return redirect('admin/sanpham/danhsach')->with('thongbao','Thêm thành công');
    }

    public function getSua(){
		if (isset($_REQUEST['IDSP']))
		{
        $sanpham = SanPham::where('IDSP',$_REQUEST['IDSP'])->first();
        return view('admin.sanpham.sua', ['sanpham'=>$sanpham]);
		}
		else return redirect('admin/sanpham/danhsach');
    }
    public function postSua(Request $request){
        $this->validate($request,
        [
            'TenSanPham'=>'required|max:30',
            'Gia'=>'required|max:10',
            'Sale'=>'required|max:3',
            'TheLoai'=>'required|max:10',
            'MoTa'=>'required|max:1500'
        ],[
            'TenSanPham.required'=>'Bạn chưa nhập tên sản phẩm',
            'TenSanPham.max'=>'Tên sản phẩm không dài quá 30 kí tự',
            'Gia.required'=>'Bạn chưa nhập giá sản phẩm',
            'Gia.max'=>'Giá không dài quá 10 kí tự',
            'Sale.max'=>'Sale không vượt quá 100%',
            'TheLoai.required'=>'Bạn chưa chọn thể loại',
            'HinhChinh.required'=>'Bạn chưa chọn hình chính',
            'MoTa.max'=>'Mô tả không được vượt quá 1500 kí tự'
        ]);

        $sanpham = SanPham::where('IDSP',$_REQUEST['IDSP']);

		if($request->hasFile('HinhChinh')){
            $file = $request->file('HinhChinh');
            //Lay ten hinh de kiem tra
            $name = $file->getClientOriginalName();
            $duoi = $file->getClientOriginalExtension();
            $hinh = Str::random(4)."_".$name;
            while(file_exists("user/images/product".$hinh)){
                $hinh = Str::random(4).$name;
            }
			unlink("user/images/product/".$sanpham->HinhChinh);
            $file->move("user/images/product", $hinh);
            $sanpham->HinhChinh = $hinh;
        }
		if($request->hasFile('HinhChinh')){
		$sanpham = SanPham::where('IDSP',$_REQUEST['IDSP'])
		->update([
				'TenSanPham' => $request->TenSanPham,
				'Gia' => $request->Gia,
				'Sale' => $request->Sale,
				'IDTL' => $request->TheLoai,
				'MoTa' => $request->MoTa,
				'HinhChinh' => $hinh
				]);}else{
		$sanpham = SanPham::where('IDSP',$_REQUEST['IDSP'])
		->update([
				'TenSanPham' => $request->TenSanPham,
				'Gia' => $request->Gia,
				'Sale' => $request->Sale,
				'IDTL' => $request->TheLoai,
				'MoTa' => $request->MoTa
				]);}
        return redirect('admin/sanpham/danhsach')->with('thongbao', 'Thay đổi thành công');
    }
	
    public function getXoa(){
		if (isset($_REQUEST['IDSP']))
		{
        $sanpham = SanPham::where('IDSP',$_REQUEST['IDSP'])
							->update(['Hidden' => 1]);
        return redirect('admin/sanpham/danhsach')->with('thongbao', 'Xóa thành công');
		}
		else return redirect('admin/sanpham/danhsach')->with('thongbao', 'Xóa thất bại');
    }
	public function getKhoiPhuc(){
		if (isset($_REQUEST['IDSP']))
		{
        $sanpham = SanPham::where('IDSP',$_REQUEST['IDSP'])
							->update(['Hidden' => 0]);
        return redirect('admin/sanpham/danhsach')->with('thongbao', 'Khôi phục thành công');
		}
		else return redirect('admin/sanpham/danhsach')->with('thongbao', 'Khôi phục thất bại');
    }
}
