<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MuonSach;
use App\TraSach;
use App\User;
use Illuminate\Support\Facades\DB;

class TaiChinhController extends Controller
{
    //
    public function getPhieuMuon(){
        $muonsach = MuonSach::orderBy('id', 'DESC')->get();
        return view('admin.taichinh.phieumuon', ['muonsach'=>$muonsach]);
    }

    public function getPhieuTra(){
        $trasach = TraSach::orderBy('id', 'DESC')->get();
        return view('admin.taichinh.phieutra', ['trasach'=>$trasach]);
    }

    public function getDoanhThu(){
        $doanhthu = DB::table('trasach')
        ->select(DB::raw('NgayTra, count(NgayTra) as SLTraSach, sum(TienTre) as TongTienTre, sum(TienBoiThuong) as TongTienBoiThuong, sum(TienThueSach) as TongTienThueSach, sum(TongTien) as TongTien'))
        ->groupBy('NgayTra')
        ->orderByDesc('NgayTra')
        ->get();
        return view('admin.taichinh.doanhthu', ['doanhthu'=>$doanhthu, 'fill'=>'ngày']);
    }

    public function getFiller($filler){
        if($filler == 'ngay'){
            $doanhthu = DB::table('trasach')
                ->select(DB::raw('NgayTra, count(NgayTra) as SLTraSach, sum(TienTre) as TongTienTre, sum(TienBoiThuong) as TongTienBoiThuong, sum(TienThueSach) as TongTienThueSach, sum(TongTien) as TongTien'))
                ->groupBy('NgayTra')
                ->orderByDesc('NgayTra')
                ->get();
            return view('admin.taichinh.doanhthu', ['doanhthu'=>$doanhthu, 'fill'=>'ngày']);
        } else if($filler == 'thang'){
            $doanhthu = DB::table('trasach')
                ->select(DB::raw('MONTH(NgayTra) as thang, YEAR(NgayTra) as nam, count(*) as SLTraSach, sum(TienTre) as TongTienTre, sum(TienBoiThuong) as TongTienBoiThuong, sum(TienThueSach) as TongTienThueSach, sum(TongTien) as TongTien'))
                ->groupBy('thang', 'nam')
                ->orderByDesc('thang')
                ->orderByDesc('nam')
                ->get();
                // ->select(DB::raw('YEAR(NgayTra) year, MONTH(NgayTra) month'), DB::raw('count(*) as data'), DB::raw('sum(TienTre) as TongTienTre, sum(TienBoiThuong) as TongTienBoiThuong, sum(TienThueSach) as TongTienThueSach, sum(TongTien) as TongTien'))
                // ->groupby('year','month')
                // ->orderByDesc('month')
                // ->orderByDesc('year')
                // ->get();
            return view('admin.taichinh.doanhthu', ['doanhthu'=>$doanhthu, 'fill'=>'tháng']);
        } else if($filler == 'nam'){
            $doanhthu = DB::table('trasach')
                ->select(DB::raw('year(NgayTra) as nam, count(*) as SLTraSach, sum(TienTre) as TongTienTre, sum(TienBoiThuong) as TongTienBoiThuong, sum(TienThueSach) as TongTienThueSach, sum(TongTien) as TongTien'))
                ->groupBy('nam')
                ->orderByDesc('nam')
                ->get();
                // ->select(DB::raw('YEAR(NgayTra) year'), DB::raw('count(*) as data'), DB::raw('sum(TienTre) as TongTienTre, sum(TienBoiThuong) as TongTienBoiThuong, sum(TienThueSach) as TongTienThueSach, sum(TongTien) as TongTien'))
                // ->groupby('year')
                // ->orderByDesc('year')
                // ->get();
            return view('admin.taichinh.doanhthu', ['doanhthu'=>$doanhthu, 'fill'=>'năm']);
        }
    }
}
