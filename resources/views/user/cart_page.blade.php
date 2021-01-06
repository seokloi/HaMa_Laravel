@extends('user.layout.index')
@section('content')
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
      <div class="row ">
        <!-- =====  BANNER STRAT  ===== -->
        <div class="col-sm-12">
          <div class="breadcrumb ptb_20">
            <h1>Giỏ Hàng</h1>
            <ul>
              <li><a href="././">Trang Chủ</a></li>
              <li class="active">Giỏ Hàng</li>
            </ul>
          </div>
        </div>
        <!-- =====  BREADCRUMB END===== -->
        <div id="column-left" class="col-sm-4 col-lg-3 hidden-xs">
          @include('user.another.category_list')
          @include('user.another.hotproduct_list')
        </div>
        <div class="col-sm-8 col-lg-9 mtb_20">
          <form enctype="multipart/form-data" method="post" action="#">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <td class="text-center" width="100px">Hình Ảnh</td>
                    <td class="text-left">Tên Sản Phẩm</td>
                    <td class="text-center">Thông Số</td>
                    <td class="text-left">Số Lượng</td>
                    <td class="text-right">Đơn Giá</td>
                    <td class="text-right">Số Tiền</td>
                  </tr>
                </thead>
                <tbody>
                  <?php
				  		$thanhtien = 0 ;
						$tongtien = 0;
						$phiship = 0;
						$tongthanhtoan = 0;
				  ?>
                  @foreach(getGioHang() as $item)
                  <?php 
						$thanhtien = getGiaSale($item->ct_sp->sanpham->Gia,$item->ct_sp->sanpham->Sale) * $item->SoLuong ;
						$tongtien = $tongtien+$thanhtien;
						$phiship = 30000;
						$tongthanhtoan = $tongtien + $phiship;
				  ?>
                  <tr>
                    <td class="text-center"><a href="product?IDSP={{$item->ct_sp->IDSP}}"><img src="user/images/product/{{$item->ct_sp->sanpham->HinhChinh}}" alt="{{$item->ct_sp->sanpham->TenSanPham}}" title="{{$item->ct_sp->sanpham->TenSanPham}}"></a></td>
                    <td class="text-left"><a href="product?IDSP={{$item->ct_sp->IDSP}}">{{$item->ct_sp->sanpham->TenSanPham}}</a></td>
                    <td class="text-center">@if(isset($item->ct_sp->mau->Mau)) {{$item->ct_sp->mau->Mau}} @endif  @if(isset($item->ct_sp->size->Size)) {{$item->ct_sp->size->Size}} @endif</td>
                    <td class="text-left">
                      <div style="max-width: 200px;" class="input-group btn-block">
                        <input type="text" class="form-control quantity" size="1" value="{{$item->SoLuong}}" name="quantity">
                        <span class="input-group-btn">
                      <button class="btn" title="" data-toggle="tooltip" type="submit" data-original-title="Update"><i class="fa fa-refresh"></i></button>
                      <button  class="btn btn-danger" title="" data-toggle="tooltip" type="button" data-original-title="Remove"><i class="fa fa-times-circle"></i></button>
                      </span></div>
                    </td>
                    <td class="text-right">
                    @if($item->ct_sp->sanpham->Sale > 0)
                    <strike>{{$item->ct_sp->sanpham->Gia}}</strike> /
                    @endif
                    {{getGiaSale($item->ct_sp->sanpham->Gia,$item->ct_sp->sanpham->Sale)}}
                    @if($item->ct_sp->sanpham->Sale > 0)
                    <span class="cart_sale"><br>Sale:{{$item->ct_sp->sanpham->Sale}}%</span>
                    @endif</td>
                    <td class="text-right">{{$thanhtien}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </form>
          <div class="panel-group mt_20" id="accordion">
            <div class="panel panel-default pull-left">
              <div class="panel-heading">
                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">HaMa Voucher <i class="fa fa-caret-down"></i></a> </h4>
              </div>
              <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                  <label for="input-voucher" class="col-sm-4 control-label">Nhập voucher</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="input-voucher" placeholder="" value="" name="voucher">
                    <span class="input-group-btn">
                  <input type="button" class="btn" data-loading-text="Loading..." id="button-voucher" value="Áp dụng">
                  </span> </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4 col-sm-offset-8">
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td class="text-right"><strong>Tổng tiền:</strong></td>
                    <td class="text-right">{{$tongtien}} VNĐ</td>
                  </tr>
                  <tr>
                    <td class="text-right"><strong>Phí ship:</strong></td>
                    <td class="text-right">{{$phiship}} VNĐ</td>
                  </tr>
                  <tr>
                    <td class="text-right"><strong>Voucher:</strong></td>
                    <td class="text-right">20%</td>
                  </tr>
                  <tr>
                    <td class="text-right"><strong>Tổng thanh toán:</strong></td>
                    <td class="text-right">{{$tongthanhtoan}} VNĐ</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <form action="">
          	<a href="shop">
            <input class="btn pull-left mt_30" type="button" value="Tiếp tục shoppiing" />
            </a>
          </form>
          <form action="">
          	<a href="checkout_page">
            <input class="btn pull-right mt_30" type="button" value="Thanh toán" />
            </a>
          </form>
        </div>
      </div>
    </div>
    <!-- =====  CONTAINER END  ===== -->
@endsection
