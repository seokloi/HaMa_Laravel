@extends('user.layout.index')
@section('content')
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
      <div class="row ">
        <!-- =====  BANNER STRAT  ===== -->
        <div class="col-sm-12">
          <div class="breadcrumb ptb_20">
            <h1>{{$sanpham->TenSanPham}}</h1>
            <ul>
              <li><a href="././">Trang Chủ</a></li>
              <li><a href="shop">Cửa Hàng</a></li>
              <li class="active">{{$sanpham->TenSanPham}}</li>
            </ul>
          </div>
        </div>
        <!-- =====  BREADCRUMB END===== -->
        <div id="column-left" class="col-sm-4 col-lg-3 hidden-xs">
          @include('user.another.category_list')
          <div class="left_banner left-sidebar-widget mt_30 mb_40"> <a href="#"><img src="user/images/left1.jpg" alt="Left Banner" class="img-responsive" /></a> </div>
          @include('user.another.hotproduct_list')
        </div>
        <div class="col-sm-8 col-lg-9 mtb_20">
          <div class="row mt_10 ">
            <div class="col-md-6">
              <div><a class="thumbnails"> <img data-name="product_image" src="user/images/product/{{$sanpham->HinhChinh}}" alt="" /></a>
              @if($sanpham->Sale > 0)
              <div class="sale">{{$sanpham->Sale}}%</div>
              @endif
              </div>
              <div id="product-thumbnail" class="owl-carousel">
              	@foreach ($hinhsp as $item)
                <div class="item">
                  <div class="image-additional"><a class="thumbnail" href="user/images/product/{{$item->TenHinhSP}}" data-fancybox="group1"> <img src="user/images/product/{{$item->TenHinhSP}}" alt="" /></a></div>
                </div>
                @endforeach
              </div>
            </div>
            <div class="col-md-6 prodetail caption product-thumb">
              <h4 data-name="product_name" class="product-name">{{$sanpham->TenSanPham}}</h4>
              <div class="rating"> 
                          	  @for ($i = 0; $i < $sanpham->DanhGia; $i++)
                              <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                              @endfor
                              @for ($i = 0; $i < 5 - $sanpham->DanhGia; $i++)
                              <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                              @endfor
              </div>
              <span class="price mb_20"><span class="amount"><span class="currencySymbol">@if($sanpham->Sale > 0)
                          	<strike>{{$sanpham->Gia}} VNĐ</strike> / 
                          @endif
                          {{getGiaSale($sanpham->Gia,$sanpham->Sale)}} VNĐ</span></span>
              </span>
              <hr>
              <ul class="list-unstyled product_info mtb_20">
                <li>
                  <label>Thể Loại:</label>
                  <span> <a href="shop?IDTL={{$sanpham->IDTL}}">{{$sanpham->theloai->TenTheLoai}}</a></span></li>
                <li>
              </ul>
              <hr>
              <p class="product-desc mb_20"></p>
              <div id="product">
                <form action="product?IDSP={{$sanpham->IDSP}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                      <div class="row">
                        <div class="Sort-by col-md-6">
                          <label>Loại</label>
                          <select name="product_size" id="select-by-size" class="selectpicker form-control">
                            @foreach($sanpham->ct_sp as $item)
                                <option value="{{$item->IDCTSP}}">@if(isset($item->size->Size)){{$item->size->Size}}@endif
                                @if(isset($item->size->Size)&&isset($item->mau->Mau)),@endif
                                @if(isset($item->mau->Mau)){{$item->mau->Mau}}@endif</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="qty col-md-6 form-group2">
                          <label>Số lượng</label>
                          <input name="product_quantity" min="1" value="1" type="number">
                        </div>
                      </div>
                    </div>
                    <div class="button-group mt_30">
                      @if(isset($thongtindangnhap))
                      <input type="submit" name="sm_order" value="" class="add-to-cart">
                      @else
                      <div class="add-to-cart" onclick="window.location.href = 'login'"><a href="postGioHang()"><span>Add to cart</span></a></div>
                      @endif

                        @if(count($errors) > 0)
                                @foreach($errors->all() as $err)
                                    <script>alert('{{$err}}');</script>
                                @endforeach
                        @endif
                        @if(session('loi'))
                                <script>alert("{{session('loi')}}");</script>
                        @endif
                        @if(session('thongbao'))
                            <script>alert("{{session('thongbao')}}");</script>
                        @endif
                    </div>
                </form>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div id="exTab5" class="mtb_30">
                <ul class="nav nav-tabs">
                  <li class="active"> <a href="#1c" data-toggle="tab">Chi tiết sản phẩm</a> </li>
                  <li><a href="#2c" data-toggle="tab">Đánh giá</a> </li>
                </ul>
                <div class="tab-content ">
                  <div class="tab-pane active" id="1c">
                    <p>{{$sanpham->MoTa}}
                  </div>
                  <div class="tab-pane" id="2c">
                    <form class="form-horizontal">
                      <div id="review"></div>
                      <h4 class="mt_20 mb_30">Write a review</h4>
                      <div class="form-group required">
                        <div class="col-sm-12">
                          <label class="control-label" for="input-name">Your Name</label>
                          <input name="name" value="" id="input-name" class="form-control" type="text">
                        </div>
                      </div>
                      <div class="form-group required">
                        <div class="col-sm-12">
                          <label class="control-label" for="input-review">Your Review</label>
                          <textarea name="text" rows="5" id="input-review" class="form-control"></textarea>
                          <div class="help-block"><span class="text-danger">Note:</span> Say the truth!</div>
                        </div>
                      </div>
                      <div class="form-group required">
                        <div class="col-md-6">
                          <label class="control-label">Rating</label>
                          <div class="rates"><span>Bad</span>
                            <input name="rating" value="1" type="radio">
                            <input name="rating" value="2" type="radio">
                            <input name="rating" value="3" type="radio">
                            <input name="rating" value="4" type="radio">
                            <input name="rating" value="5" type="radio">
                            <span>Good</span></div>
                        </div>
                        <div class="col-md-6">
                          <div class="buttons pull-right">
                            <button type="submit" class="btn btn-md btn-link">Continue</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @include('user.another.sameproduct_list')
        </div>
      </div>
    </div>
    <!-- =====  CONTAINER END  ===== -->
@endsection
