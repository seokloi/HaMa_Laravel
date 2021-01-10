@extends('user.layout.index')
@section('content')
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
      <div class="row ">
        <!-- =====  BANNER STRAT  ===== -->
        <div class="col-sm-12">
          <div class="breadcrumb ptb_20">
            <h1>Cửa Hàng</h1>
            <ul>
              <li><a href="././">Trang Chủ</a></li>
              <li class="active">Cửa Hàng</li>
            </ul>
          </div>
        </div>
        <!-- =====  BREADCRUMB END===== -->
        <div id="column-left" class="col-sm-4 col-lg-3 ">
          @include('user.another.category_list')
          <div class="filter left-sidebar-widget mb_50">
            <div class="heading-part mtb_20 ">
              <h2 class="main_title">Tìm Kiếm Nhanh</h2>
            </div>
            <div class="filter-block">
              <div class="list-group">
                <div class="list-group-item mb_10">
                  <label>Màu Sắc</label>
                  <div id="filter-group1">
                  	@foreach (getMau() as $item)
                    <div class="checkbox">
                      <label>
                        <input value="" type="checkbox"> {{$item->Mau}}</label>
                    </div>
                    @endforeach
                  </div>
                </div>
                <div class="list-group-item mb_10">
                  <label>Size</label>
                  <div id="filter-group3">
                  	@foreach (getSize() as $item)
                    <div class="checkbox">
                      <label>
                        <input value="" type="checkbox"> {{$item->Size}}</label>
                    </div>
                    @endforeach
                  </div>
                </div>
                <button type="button" class="btn">Tìm Kiếm</button>
              </div>
            </div>
          </div>
          @include('user.another.hotproduct_list')
        </div>
        <div class="col-sm-8 col-lg-9 mtb_20">
          <div class="category-page-wrapper mb_30">
            <div class="page-wrapper pull-right">
              <label class="control-label" for="input-limit">Hiển thị:</label>
              <div class="limit">
                <select id="input-limit" class="form-control">
                  <option value="12" selected="selected">12</option>
                  <option value="25">25</option>
                  <option value="50">50</option>
                  <option value="75">75</option>
                  <option value="100">100</option>
                </select>
              </div>
              <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
            </div>
            <div class="sort-wrapper pull-right">
              <label class="control-label" for="input-sort">Sắp xếp :</label>
              <div class="sort-inner">
                <select id="input-sort" class="form-control">
                  <option value="ASC" selected="selected">Default</option>
                  <option value="ASC">Name (A - Z)</option>
                  <option value="DESC">Name (Z - A)</option>
                  <option value="ASC">Price (Low &gt; High)</option>
                  <option value="DESC">Price (High &gt; Low)</option>
                  <option value="DESC">Rating (Highest)</option>
                  <option value="ASC">Rating (Lowest)</option>
                  <option value="ASC">Model (A - Z)</option>
                  <option value="DESC">Model (Z - A)</option>
                </select>
              </div>
              <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
            </div>
          </div>
          <div class="row">
            @foreach ($sanpham as $item)
            <div class="product-layout  product-grid  col-md-4 col-sm-6 col-xs-12 ">
              <div class="item">
                <div class="product-thumb clearfix mb_30">
                  <div class="image product-imageblock"><img data-name="product_image" style="width:300px;height:250px;" src="user/images/product/{{$item->HinhChinh}}" alt="{{$item->TenSanPham}}" title="{{$item->TenSanPham}}" class="img-responsive" onClick="window.location.href = 'product?IDSP={{$item->IDSP}}'"/>
                    <div class="button-group text-center">
                            <div class="add-to-cart" onClick="window.location.href = 'product?IDSP={{$item->IDSP}}'"><span>Add to cart</span></div>
                          </div>
                    @if($item->Sale > 0)
                    <div class="sale">{{$item->Sale}}%</div>
                    @endif
                  </div>
                  <div class="caption product-detail text-center">
                    <h6 data-name="product_name" class="product-name mt_20"><a href="product?IDSP={{$item->IDSP}}" title="{{$item->TenSanPham}}">{{$item->TenSanPham}}</a></h6>
                    <div class="rating"> 
                          	  @for ($i = 0; $i < $item->DanhGia; $i++)
                              <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                              @endfor
                              @for ($i = 0; $i < 5 - $item->DanhGia; $i++)
                              <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                              @endfor
                    </div>
                    <span class="price"><span class="amount"><span class="currencySymbol">
                     @if($item->Sale > 0)
                     <strike>{{$item->Gia}} VNĐ</strike> / 
                     @endif
                     {{getGiaSale($item->Gia,$item->Sale)}} VNĐ</span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <div class="pagination-nav text-center mt_50">
              @if(isset($_REQUEST['IDTL']))
                {{ $sanpham->appends(['IDTL' => $_REQUEST['IDTL'] ])->links() }}
              @else
                {{ $sanpham->links() }}
              @endif
              <script>
                  $('.pagination a').unbind('click').on('click', function(e) {
                         e.preventDefault();
                         var page = $(this).attr('href').split('page=')[1];
                         getPosts(page);
                   });
      
                   function getPosts(page)
                   {
                        $.ajax({
                             type: "GET",
                             url: '?page='+ page
                        })
                        .success(function(data) {
                             $('body').html(data);
                        });
                   }
              </script>
          </div>
        </div>
      </div>
    </div>
    <!-- =====  CONTAINER END  ===== -->
@endsection
