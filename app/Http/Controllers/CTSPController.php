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

class CTSPController extends Controller
{
    public function getCTSP(){
        if(isset($_REQUEST['IDSP'])){
            $sanpham = SanPham::where('IDSP', $_REQUEST['IDSP'])->first();
            $ct_sp = CT_SP::where('IDSP', $_REQUEST['IDSP'])->get();
            return view('admin.ct_sp.danhsach', ['ct_sp'=>$ct_sp,'sanpham'=>$sanpham]);
        }else{
            return redirect('admin/sanpham/danhsach');
        }
    }

    public function getThem(){
        if(isset($_REQUEST['IDSP'])){
            $sanpham = SanPham::where('IDSP', $_REQUEST['IDSP'])->first();
            return view('admin.ct_sp.them', ['sanpham'=>$sanpham]);
        }else{
            return redirect('admin/sanpham/danhsach');
        }
    }
    public function postThem(Request $request){
        $this->validate($request,
        [
            'Mau'=>'required|max:3',
            'Size'=>'required|max:3',
            'SoLuong'=>'required|max:5',
        ],[
            'Mau.max'=>'Tên màu không dài quá 3 kí tự',
            'Size.max'=>'Tên size không dài quá 3 kí tự',
            'SoLuong.required'=>'Bạn chưa nhập số lượng',
            'SoLuong.max'=>'Số lượng không được vượt quá 5 kí tự'
        ]);

        $ct_sp = new CT_SP;
        $ct_sp->IDSP = $_REQUEST['IDSP'];
        $ct_sp->IDM = $request->Mau;
        $ct_sp->IDS = $request->Size;
        $ct_sp->SoLuongTon = $request->SoLuong;
		$ct_sp->save();
		
        return redirect('admin/ct_sp/danhsach?IDSP='.$_REQUEST['IDSP'])->with('thongbao','Thêm thành công');
    }

    public function getSua(){
		if (isset($_REQUEST['IDCTSP']))
		{
        $ct_sp = CT_SP::where('IDCTSP',$_REQUEST['IDCTSP'])->first();
        return view('admin.ct_sp.sua', ['ct_sp'=>$ct_sp]);
		}
		else return redirect('admin/ct_sp/danhsach');
    }
    public function postSua(Request $request){
        $this->validate($request,
        [
            'Mau'=>'required|max:3',
            'Size'=>'required|max:3',
            'SoLuong'=>'required|max:5',
        ],[
            'Mau.max'=>'Tên màu không dài quá 3 kí tự',
            'Size.max'=>'Tên size không dài quá 3 kí tự',
            'SoLuong.required'=>'Bạn chưa nhập số lượng',
            'SoLuong.max'=>'Số lượng không được vượt quá 5 kí tự'
        ]);
        if($request->Mau!= 0 && $request->Size!= 0 )
        {
            $ct_sp = CT_SP::where('IDCTSP',$_REQUEST['IDCTSP'])
		    ->update([
                    'IDM' => $request->Mau,
                    'IDS' => $request->Size,
				    'SoLuongTon' => $request->SoLuong
				    ]);
        }else if($request->Mau!= 0 && $request->Size== 0 )
        {
            $ct_sp = CT_SP::where('IDCTSP',$_REQUEST['IDCTSP'])
		    ->update([
                    'IDM' => $request->Mau,
				    'SoLuongTon' => $request->SoLuong
				    ]);
        }else if($request->Mau== 0 && $request->Size!= 0 )
        {
            $ct_sp = CT_SP::where('IDCTSP',$_REQUEST['IDCTSP'])
		    ->update([
                    'IDS' => $request->Size,
				    'SoLuongTon' => $request->SoLuong
				    ]);
        }else
        {
            $ct_sp = CT_SP::where('IDCTSP',$_REQUEST['IDCTSP'])
		    ->update([
				    'SoLuongTon' => $request->SoLuong
				    ]);
        }
        $ct_sp = CT_SP::where('IDCTSP',$_REQUEST['IDCTSP'])->first();
        return redirect('admin/ct_sp/danhsach?IDSP='.$ct_sp->IDSP)->with('thongbao', 'Thay đổi thành công');
    }
	
    public function getXoa(){
		if (isset($_REQUEST['IDCTSP']))
		{
            $ct_sp = CT_SP::where('IDCTSP',$_REQUEST['IDCTSP'])->first();
            if($ct_sp->SoLuongTon <= 0)
            {
            $ct_sp->where('IDCTSP',$_REQUEST['IDCTSP'])->delete();
            return redirect('admin/ct_sp/danhsach?IDSP='.$ct_sp->IDSP)->with('thongbao', 'Xóa thành công');
		    }
        }
		return redirect('admin/ct_sp/danhsach?IDSP='.$ct_sp->IDSP)->with('thongbao', 'Xóa thất bại, sản phẩm còn số lượng tồn nên không thể xóa!');
    }
}
