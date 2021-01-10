@extends('user.layout.index')

@section('php')
    <?php session_start(); ?>
@endsection

@section('content')
	@include('user.layout.banner')
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
      @include('user.layout.sub-banner')
          <!-- =====  FLASH SALE TAB  ===== -->
          <div id="product-tab" class="mt_50">
            <div class="heading-part mb_10 ">
              <h2 class="main_title">Flash Sale</h2>
            </div>
            <!--<ul class="nav text-right">
              <li class="active"> <a href="shop" data-toggle="tab">Xem tất cả</a> </li>
            </ul>-->
            <div class="tab-content clearfix box">
              <div class="tab-pane active" id="nArrivals">
                <div class="nArrivals owl-carousel">
                  @foreach (getFlashSale() as $item)
                  <div class="product-grid">
                    <div class="item">
                      <div class="product-thumb">
                        <div class="image product-imageblock"><img src="user/images/product/{{$item->HinhChinh}}" style="width:300px;height:200px;" alt="{{$item->TenSanPham}}" title="{{$item->TenSanPham}}" class="img-responsive" onClick="window.location.href = 'product?IDSP={{$item->IDSP}}'">
                          <div class="button-group text-center">
                            <div class="add-to-cart" onClick="window.location.href = 'product?IDSP={{$item->IDSP}}'"><span>Add to cart</span></div>
                          </div>
                          @if($item->Sale > 0)
                          <div class="sale">{{$item->Sale}}%</div>
                          @endif
                        </div>
                        <div class="caption product-detail text-center">
                          <div class="rating"> 
                          	  @for ($i = 0; $i < $item->DanhGia; $i++)
                              <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                              @endfor
                              @for ($i = 0; $i < 5 - $item->DanhGia; $i++)
                              <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                              @endfor
                          </div>
                          <h6 data-name="product_name" class="product-name"><a href="product?IDSP={{$item->IDSP}}" title="{{$item->TenSanPham}}">{{$item->TenSanPham}}</a></h6>
                          <span class="price"><span class="amount"><span class="currencySymbol">
                          @if($item->Sale > 0)
                          	<strike>{{$item->Gia}} VNĐ</strike> / 
                          @endif
                          {{getGiaSale($item->Gia,$item->Sale)}} VNĐ
                          </span></span>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          <!-- =====  FLASH SALE TAB  END ===== -->
          <!--  =====  CATEGORY TAB  ===== -->
          <div id="brand_carouse" class="ptb_50 text-center">
            <div class="heading-part mb_20 ">
               <h2 class="main_title">Danh Mục Sản Phẩm</h2>
            </div>
            <div class="type-01">
              <div class="row">
                <div class="col-sm-12">
                  <div class="brand owl-carousel ptb_20">
                  @foreach (getTheLoai() as $item)
                    <div class="item text-center"> <a href="shop?IDTL={{$item->IDTL}}"><img src="user/images/category/{{$item->HinhTL}}" alt="{{$item->TenTheLoai}}" class="img-responsive" title="{{$item->TenTheLoai}}" /></a> </div>
                  @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- =====  CATEGORY TAB  END ===== -->
          <!-- =====  SUB BANNER  STRAT ===== -->
          <div class="row">
            <div class="cms_banner mt_50">
              <div class="col-sm-12 mt_10">
                <div id="subbanner3" class="sub-hover">
                  <div class="sub-img"><img src="user/images/sub6.jpg" alt="Sub Banner3" class="img-responsive"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- =====  SUB BANNER END  ===== -->
          <!-- =====  PRODUCT TAB  ===== -->
          <div id="product-tab" class="mt_50">
            <div class="heading-part mb_10 ">
              <h2 class="main_title">Sản Phẩm Nổi Bật</h2>
            </div>
            <!--<ul class="nav text-right">
              <li class="active"> <a href="shop" data-toggle="tab">Xem tất cả</a> </li>
            </ul>-->
            <div class="tab-content clearfix box">
              <div class="tab-pane active" id="nArrivals">
                <div class="nArrivals owl-carousel">
                  @foreach (getSanPhamNoiBat() as $item)
                  <div class="product-grid">
                    <div class="item">
                      <div class="product-thumb">
                        <div class="image product-imageblock"><img src="user/images/product/{{$item->HinhChinh}}" style="width:300px;height:200px;" alt="{{$item->TenSanPham}}" title="{{$item->TenSanPham}}" class="img-responsive" onClick="window.location.href = 'product?IDSP={{$item->IDSP}}'">
                          <div class="button-group text-center">
                            <div class="add-to-cart" onClick="window.location.href = 'product?IDSP={{$item->IDSP}}'"><span>Add to cart</span></div>
                          </div>
                          @if($item->Sale > 0)
                          <div class="sale">{{$item->Sale}}%</div>
                          @endif
                        </div>
                        <div class="caption product-detail text-center">
                          <div class="rating"> 
                              @for ($i = 0; $i < $item->DanhGia; $i++)
                              <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                              @endfor
                              @for ($i = 0; $i < 5 - $item->DanhGia; $i++)
                              <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                              @endfor
                          </div>
                          <h6 data-name="product_name" class="product-name"><a href="product?IDSP={{$item->IDSP}}" title="{{$item->TenSanPham}}">{{$item->TenSanPham}}</a></h6>
                          <span class="price"><span class="amount"><span class="currencySymbol">
                          @if($item->Sale > 0)
                          	<strike>{{$item->Gia}} VNĐ</strike> / 
                          @endif
                          {{getGiaSale($item->Gia,$item->Sale)}} VNĐ
                          </span></span>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          <!-- =====  PRODUCT TAB  END ===== -->
          <!-- =====  Blog ===== -->
          <div id="Blog" class="mt_50 pb_20">
            <div class="heading-part mb_10 ">
              <h2 class="main_title">Bài Viết</h2>
            </div>
            <div class="blog-contain box">
              <div class="blog owl-carousel ">
                @foreach(getBlog() as $item)
                <div class="item">
                  <div class="box-holder">
                    <div class="thumb post-img"><a href="single_blog?IDBV={{$item->IDBV}}"> <img src="user/images/blog/{{$item->HinhBV}}" style="width:600px;height:300px;" alt="{{$item->TenBaiViet}}"> </a>
                      <div class="date-time text-center">
                        <div style="color: #000;"> {{$item->TenBaiViet}}</div>
                        <div class="month">{{$item->ThoiGianDang}}</div>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
            <!-- =====  Blog end ===== -->
          </div>
        </div>
      </div>
    </div>
    <!-- =====  CONTAINER END  ===== -->
@endsection
