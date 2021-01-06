<?php

namespace App\Http\Controllers;
use App\TheLoai;
use Illuminate\Support\Str;


use Illuminate\Http\Request;

class TheLoaiController extends Controller
{
    //
    public function getDanhSach()
    {
        $theloai = TheLoai::all();   
        return view('admin.theloai.danhsach',['theloai'=>$theloai]);
    }

    public function getThem()
    {
        return view('admin.theloai.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
        [
            'theloai'=>'required|unique:TheLoai,TenTheLoai|max:250'
        ],[
            'theloai.required'=>'Bạn chưa nhập thể loại sách',
            'theloai.unique'=>'Tên thể loại đã tồn tại',
            'theloai.max'=>'Thể loại không dài quá 250 kí tự'
        ]);
        
        $theloai = new TheLoai;
        $theloai->TenTheLoai = $request->theloai;
        if($request->hasFile('HinhTL')){
            $file = $request->file('HinhTL');
            //Lay ten hinh de kiem tra
            $name = $file->getClientOriginalName();
            $duoi = $file->getClientOriginalExtension();
            $hinh = Str::random(4)."_".$name;
            while(file_exists("user/images/category".$hinh)){
                $hinh = Str::random(4)."_".$name;
            }
            $file->move("user/images/category", $hinh);
            $theloai->HinhTL = $hinh;
        }
        $theloai->save();
        return redirect('admin/theloai/danhsach')->with('thongbao','Thêm thành công!');
    }

    public function getSua(){
        if (isset($_REQUEST['IDTL']))
		{
        $theloai = TheLoai::where('IDTL',$_REQUEST['IDTL'])->first();
        return view('admin.theloai.sua', ['theloai'=>$theloai]);
		}
		else return redirect('admin/theloai/danhsach');
    }

    public function postSua(Request $request){
        $this->validate($request,
        [
            'theloai'=>'required|unique:TheLoai,TenTheLoai|max:250'
        ],[
            'theloai.required'=>'Bạn chưa nhập thể loại sách',
            'theloai.unique'=>'Tên thể loại đã tồn tại',
            'theloai.max'=>'Thể loại không dài quá 250 kí tự'
        ]);

        $theloai = TheLoai::where('IDTL',$_REQUEST['IDTL'])->first();;

        if($request->hasFile('HinhTL')){
            $file = $request->file('HinhTL');
            //Lay ten hinh de kiem tra
            $name = $file->getClientOriginalName();
            $duoi = $file->getClientOriginalExtension();
            $hinh = Str::random(4)."_".$name;
            while(file_exists("user/images/category".$hinh)){
                $hinh = Str::random(4)."_".$name;
            }
            unlink("user/images/category/".$theloai->HinhTL);
            $file->move("user/images/category", $hinh);
            $theloai->Hinh = $hinh;
        }
            if($request->hasFile('HinhTL')){
		    $theloai = TheLoai::where('IDTL',$_REQUEST['IDTL'])
		    ->update([
				    'TenTheLoai' => $request->theloai,
				    'HinhTL' => $hinh
				    ]);}
            else{
		    $theloai = TheLoai::where('IDTL',$_REQUEST['IDTL'])
		    ->update([
				    'TenTheLoai' => $request->theloai
		    ]);}
        return redirect('admin/theloai/danhsach')->with('thongbao','Thay đổi thành công!');
    }

     public function getXoa(){
		if (isset($_REQUEST['IDTL']))
		{
            $theloai = TheLoai::where('IDTL',$_REQUEST['IDTL'])->first();
            if($theloai->sanpham->count() <= 0)
            {
            $theloai->where('IDTL',$_REQUEST['IDTL'])->delete();
            unlink("user/images/category/".$theloai->HinhTL);
            return redirect('admin/theloai/danhsach')->with('thongbao', 'Xóa thành công');
		    }
        }
		return redirect('admin/theloai/danhsach')->with('thongbao', 'Xóa thất bại, thể loại còn sản phẩm nên không thể xóa!');
    }
}
