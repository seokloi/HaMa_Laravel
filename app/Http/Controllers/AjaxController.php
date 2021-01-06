<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChiTietMuonSach;
use App\ChiTietTraSach;
use App\MuonSach;
use App\User;
use App\Sach;
use App\TheLoai;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    //
    public function getChiTietMuonSach($idMuonSach){
        $chitiet = ChiTietMuonSach::where('id_MuonSach', $idMuonSach)->get();
        foreach($chitiet as $ct){
            $sach = Sach::find($ct->id_Sach);
            $theloai = TheLoai::find($sach->id_TheLoai);
            echo "<tr class='odd gradeX' align='center'><td>".$ct->id_MuonSach."</td><td>".$sach->TenSach."</td><td>".$theloai->Ten."</td></tr>";
        }
    }

    public function getChiTietTraSach($idTraSach){
        $chitiet = ChiTietTraSach::where('id_TraSach', $idTraSach)->get();
        foreach($chitiet as $ct){
            $sach = Sach::find($ct->id_Sach);
            $theloai = TheLoai::find($sach->id_TheLoai);
            echo "<tr class='odd gradeX' align='center'><td>".$ct->id_TraSach."</td><td>".$sach->TenSach."</td><td>".$theloai->Ten."</td></tr>";
        }
    }

    public function getInfoUser($id_User) {
        return User::find($id_User);
    }
}
