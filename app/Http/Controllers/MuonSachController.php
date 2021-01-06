<?php

namespace App\Http\Controllers;

use App\Cart;
use App\MuonSach;
use App\User;
use App\Sach;
use App\ChiTietMuonSach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
//use Illuminate\Contracts\Session\Session;
class MuonSachController extends Controller
{
    public function getData(Request $req) {
        $req->session()->forget('cart');
        $book = DB::table('sach') -> get();
        //$lend = DB::table('muon_sach') -> join('users', 'muon_sach.id_User', "=", "users.id" ) -> get();
        $lend = MuonSach::all();
        foreach($lend as $item) {
            $item->user = User::find($item->id_user);
        }
        //dd($lend );
        return view('nhanvien.muonsach.index', compact('lend', 'book'));
    }
    public function goToDetail(Request $req) {
        $lend=MuonSach::find($req->id);
        $lend->user = User::find($lend->id_user);
        $lend_detail = ChiTietMuonSach::where('id_MuonSach', $req->id)->get();
        foreach($lend_detail as $item) {
            $item->book = Sach::find($item->id_Sach);
        }
        return view('nhanvien.muonsach.chitiet.index', compact('lend','lend_detail'));
    }

    public function getCreate(Request $req) {
         if (Session('cart')) {
            $oldCart = $req->session()->get('cart');
            $cart = new Cart($oldCart);
            return view('nhanvien.muonsach.taomoi.index', with(['cart'=>$req->session()->get('cart'), 'book'=> $cart->items, 'totalPrice'=>$cart->totalPrice, 'totalQty'=>$cart->totalQty]));
        } else {
            return view('nhanvien.muonsach.taomoi.index');
        }
    
    }

    public function postCreate(Request $req) {
        //dd($req);
        $cart = $req->session()->get('cart');
        $MuonSach = new MuonSach;
        $MuonSach->id_user = $req->id_user;
        $MuonSach->NgayMuon = $req->NgayMuon;
        $MuonSach->NgayTra = $req->NgayTra;
        $MuonSach->TongTien= $cart->totalPrice;
        $MuonSach->TrangThai = 0;

        $MuonSach->save();
        
        foreach($cart->items as $element) {
            $book = Sach::find($element['item']['id']);
            if($book->SoLuong > 0) {
                $book->SoLuong--;
                $CTMS = new ChiTietMuonSach;
                $CTMS->id_Sach = $element['item']['id'];
                $CTMS->id_MuonSach = $MuonSach->id;
                $CTMS->save();
                $book->save();
            }
            
        }
        return redirect()->route('danhsachmuon')->with('thongbao', 'Thêm phiếu thành công');
    }

    public function addDebtBook(Request $req, $id) {
        $book = Sach::find($id);
        $oldCart = Session('cart')? $req->session()->get('cart'): null;
        $cart = new Cart($oldCart);
        $cart->add($book, $id);
        $req->session()->put('cart', $cart);

        return redirect()->back();
    }
    public function DelDebtBook(Request $req, $id) {
        $oldCart = Session('cart')? $req->session()->get('cart'): null;
        $empty = (count($oldCart->items) == 1) ? true : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($req, $id, $empty);
        $req->session()->put('cart', $cart);

        return redirect()->back();
    }

}