    <!-- =====  HEADER START  ===== -->
    <header id="header">
      <div class="header">
        <div class="container">
          <div class="row">
            <div class="navbar-header col-xs-6 col-sm-2"> <a href="././"> <img alt="HaMa-logo" src="user/images/logo.png"> </a> 
            </div>
            <!-- ===== Search ===== -->
            <div class="col-xs-12 col-sm-4">
              <div class="main-search mt_40">
              <form action="search" method="get">
                <input id="search-input" name="search" value="" placeholder="Tìm Kiếm Sản Phẩm" class="form-control input-lg" autocomplete="off" type="text">
                <span class="input-group-btn">
              <button type="submit" class="btn btn-default btn-lg"><i class="fa fa-search"></i></button>
              </form>
              </span> </div>
            </div>
            <!-- ==== Search End === -->
            <div class="col-xs-6 col-sm-4 shopcart">
              @if(isset($thongtindangnhap))
              <div id="cart" class="btn-group btn-block mtb_40">
                <button type="button" class="btn" data-target="#cart-dropdown" data-toggle="collapse" aria-expanded="true"><span id="shippingcart">Giỏ Hàng</span><span id="cart-total">Items ({{getGioHang()->count()}})</span> </button>
              </div>
              <div id="cart-dropdown" class="cart-menu collapse">
                <ul>
                  <li>
                    <table class="table table-striped">
                      <tbody>
                        @foreach(getGioHang() as $item)
                        <tr>
                          <td class="text-center" width="100px"><a href="product?IDSP={{$item->ct_sp->IDSP}}"><img src="user/images/product/{{$item->ct_sp->sanpham->HinhChinh}}" alt="{{$item->ct_sp->sanpham->TenSanPham}}" title="{{$item->ct_sp->sanpham->TenSanPham}}">
                          </td>
                          <td class="text-left product-name"><a href="product?IDSP={{$item->ct_sp->IDSP}}">{{$item->ct_sp->sanpham->TenSanPham}}</a> <span class="text-left price">@if($item->ct_sp->sanpham->Sale > 0)
                              <strike>{{$item->ct_sp->sanpham->Gia}}</strike> / 
                              @endif
                              {{getGiaSale($item->ct_sp->sanpham->Gia,$item->ct_sp->sanpham->Sale)}}
                              @if($item->ct_sp->sanpham->Sale > 0)
                              <span class="cart_sale">Sale:{{$item->ct_sp->sanpham->Sale}}%</span>
                              @endif
                          </span>
                            <input class="cart-qty" name="product_quantity" min="1" value="{{$item->SoLuong}}" type="number"> Thành tiền: {{getThanhTien($item)}}
                          </td>
                          <td class="text-center"><a class="close-cart"><i class="fa fa-times-circle"></i></a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </li>
                  <li>
                    <table class="table">
                      <tbody>
                        <tr>
                          <td class="text-right"><strong>Tổng tiền</strong></td>
                          <td class="text-right">{{getTongTien()}}</td>
                        </tr>
                        <tr>
                          <td class="text-right"><strong>Phí ship</strong></td>
                          <td class="text-right">{{getPhiShip()}}</td>
                        </tr>
                        <tr>
                          <td class="text-right"><strong>Voucher</strong></td>
                          <td class="text-right">0%</td>
                        </tr>
                        <tr>
                          <td class="text-right"><strong>Tổng thanh toán</strong></td>
                          <td class="text-right">{{getTongThanhToan()}}</td>
                        </tr>
                      </tbody>
                    </table>
                  </li>
                  <li>
                    <form action="cart_page">
                      <input class="btn pull-left mt_10" value="Giỏ Hàng" type="button" onclick="window.location.href = 'cart_page'">
                    </form>
                    <form action="checkout_page">
                      <input class="btn pull-right mt_10" value="Thanh Toán" type="button" onclick="window.location.href = 'checkout_page'">
                    </form>
                  </li>
                </ul>
              </div>
              @endif
            </div>
            <div class="col-xs-6 col-sm-2">
              <ul class="text-right">
              	<li style="padding:10px 20px"> &nbsp </li>
                <li class="btn">
                	@if(isset($thongtindangnhap))
                    	{{$thongtindangnhap->TenNguoiDung}} | 
                    	<a href='logout'>Đăng Xuất</a>
                    @else
                    	<a href='login'>Đăng Nhập</a> | <a href='register'>Đăng Ký</a>
                    @endif</a></li>
              </ul>
            </div>
          </div>
          
          <nav class="navbar">
            <p>Menu</p>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse"> <span class="i-bar"><i class="fa fa-bars"></i></span></button>
            <div class="collapse navbar-collapse js-navbar-collapse">
              <ul id="menu" class="nav navbar-nav">
                <li> <a href="././">Trang Chủ</a></li>
                <li class="dropdown mega-dropdown" onclick="window.location.href = 'shop'"> <a href="shop" class="dropdown-toggle" data-toggle="dropdown">Cửa Hàng</a>
                  <ul class="dropdown-menu mega-dropdown-menu row">
                  <?php
                    $chiatl = getTheLoai()->count()%4;
                    if($chiatl > 0)
                    $tl1 = getTheLoai()->count()/4 +1;
                    else $tl1 = getTheLoai()->count()/4 ;
                    if($chiatl > 1)
                    $tl2 = getTheLoai()->count()/4 +1;
                    else $tl2 = getTheLoai()->count()/4 ;
                    if($chiatl > 2)
                    $tl3 = getTheLoai()->count()/4 +1;
                    else $tl3 = getTheLoai()->count()/4 ;
                    if($chiatl > 3)
                    $tl4 = getTheLoai()->count()/4 +1;
                    else $tl4 = getTheLoai()->count()/4 ;
                  ?>
                    <li class="col-md-3">
                      <ul>
                      	<li class="dropdown-header">Danh Sách Thể Loại</li>
                        @foreach (getTheLoai()->take($tl1) as $item)
                        <li><a href="shop?IDTL={{$item->IDTL}}">{{$item->TenTheLoai}}</a></li>
                        @endforeach
                      </ul>
                    </li>
                    <li class="col-md-3">
                      <ul>
                        <li class="dropdown-header">&nbsp;</li>
                        @foreach (getTheLoai()->skip($tl1)->take($tl2) as $item)
                        <li><a href="shop?IDTL={{$item->IDTL}}">{{$item->TenTheLoai}}</a></li>
                        @endforeach
                      </ul>
                    </li>
                    <li class="col-md-3">
                      <ul>
                        <li class="dropdown-header">&nbsp;</li>
                        @foreach (getTheLoai()->skip($tl1+$tl2)->take($tl3) as $item)
                        <li><a href="shop?IDTL={{$item->IDTL}}">{{$item->TenTheLoai}}</a></li>
                        @endforeach
                      </ul>
                    </li>
                    <li class="col-md-3">
                      <ul>
                        <li class="dropdown-header">&nbsp;</li>
                        @foreach (getTheLoai()->skip($tl1+$tl2+$tl3)->take($tl4) as $item)
                        <li><a href="shop?IDTL={{$item->IDTL}}">{{$item->TenTheLoai}}</a></li>
                        @endforeach
                      </ul>
                    </li>
                  </ul>
                </li>
                <li> <a href="blog_page">Bài Viết</a></li>
                <li> <a href="contact_us">Liên Hệ</a></li>
                <li> <a href="about">Về Chúng Tôi</a></li>
              </ul>
            </div>
            <!-- /.nav-collapse -->
          </nav>
        </div>
      </div>
    </header>
    <!-- =====  HEADER END  ===== -->
