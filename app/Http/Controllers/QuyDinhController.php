<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuyDinh;

class QuyDinhController extends Controller
{
    //
    public function getDanhSach(){
        $quydinh = QuyDinh::all();
        return view('admin.quydinh.danhsach', ['quydinh'=>$quydinh]);
    }

    Public function getThem(){
        return view('admin.quydinh.them');
    }

    public function postThem(Request $request){
        $this->validate($request,
        [
            'NoiDung' => 'required|max:250'
        ],
        [
            'NoiDung.required'=>'Bạn chưa nhập nội dung quy định',
            'NoiDung.max'=>'Quy đinh không dài hơn 250 ký tự'
        ]);
        
        $quydinh = new QuyDinh;
        $quydinh->NoiDung = $request->NoiDung;

        $quydinh->save();

        return redirect('admin/quydinh/them')->with('thongbao', 'Bạn đã thêm thành công');
    }

    public function getSua($id){
        $quydinh = QuyDinh::find($id);
        return view('admin.quydinh.sua', ['quydinh'=>$quydinh]);
    }

    public function postSua(Request $request, $id){
        $this->validate($request, 
        [
            'NoiDung' => 'required|max:250'
        ],
        [
            'NoiDung.required'=>'Bạn chưa nhập nội dung quy định',
            'NoiDung.max'=>'Quy đinh không dài hơn 250 ký tự'
        ]);

        $quydinh = QuyDinh::find($id);
        $quydinh->NoiDung = $request->NoiDung;
        $quydinh->save();

        return redirect('admin/quydinh/sua/'.$id)->with('thongbao', 'Thay đổi thành công');
    }

    public function getXoa($id){
        $quydinh = QuyDinh::find($id);
        $quydinh->delete();

        return redirect('admin/quydinh/danhsach')->with('thongbao', 'Đã xóa thành công');
    }
}
