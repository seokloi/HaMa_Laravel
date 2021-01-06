<?php
use App\TheLoai;
use App\Mau;
use App\Size;
use App\SanPham;
use App\GioHang;
use App\BaiViet;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Contracts\Support\Arrayable;
//User
if (!function_exists('getGioHang'))
{
	function getGioHang()
	{
		if (isset(Auth::user()->id))
			{
				$giohang = GioHang::where('IDND',Auth::user()->id)->get();
				return $giohang;
			}
		else
			return 0;
	}
}
if (!function_exists('getTheLoai'))
{
	function getTheLoai()
	{
		return TheLoai::all();
	}
}
if (!function_exists('getMau'))
{
	function getMau()
	{
		return Mau::all();
	}
}
if (!function_exists('getSize'))
{
	function getSize()
	{
		return Size::all();
	}
}
if (!function_exists('getSanPham'))
{
	function getSanPham()
	{
		return SanPham::where('Hidden', '<>' , 1)->get();
	}
}
if (!function_exists('getGiaSale'))
{
	function getGiaSale($gia,$sale)
	{
		$giasale = $gia - $gia*$sale/100;
		return $giasale;
	}
}
if (!function_exists('getFlashSale'))
{
	function getFlashSale()
	{
		$flashsale = DB::table('sanpham')
					 ->where('Sale','>',0)
					 ->where('Hidden', '<>' , 1)
					 ->orderByDesc('Sale')
					 ->take(12)
					 ->get();
		return $flashsale; 
	}
}
if (!function_exists('getSanPhamNoiBat'))
{
	function getSanPhamNoiBat()
	{
		return SanPham::orderByDesc('Created_at')->where('Hidden', '<>' , 1)->take(12)->get(); 
	}
}
if (!function_exists('getSanPhamNoiBat_Left'))
{
	function getSanPhamNoiBat_Left()
	{
		return SanPham::orderByDesc('Created_at')->where('Hidden', '<>' , 1)->take(4)->get(); 
	}
}
if (!function_exists('getSanPhamTuongTu'))
{
	function getSanPhamTuongTu($idtl)
	{
		return SanPham::where('IDTL',$idtl)->where('Hidden', '<>' , 1)->take(8)->get(); 
	}
}
if (!function_exists('getBlog'))
{
	function getBlog()
	{
		return BaiViet::take(4)->get();
	}
}
