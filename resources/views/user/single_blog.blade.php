@extends('user.layout.index')
@section('content')
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
      <div class="row ">
        <!-- =====  BANNER STRAT  ===== -->
        <div class="col-sm-12">
          <div class="breadcrumb ptb_20">
            <h1>{{$baiviet->TenBaiViet}}</h1>
            <ul>
              <li><a href="././">Trang Chủ</a></li>
              <li><a href="blog_page">Bài Viết</a></li>
              <li class="active">Blog</li>
            </ul>
          </div>
        </div>
        <!-- =====  BREADCRUMB END===== -->
        <div id="column-left" class="col-sm-4 col-lg-3 hidden-xs">
          <div class="left-blog left-sidebar-widget mb_50">
            <div class="heading-part mb_20 ">
              <h2 class="main_title">Blog khác</h2>
            </div>
            <div id="left-blog">
              <div class="row ">
                @foreach(getBlog() as $item)
                <div class="blog-item mb_20">
                  <div class="post-format col-xs-4">
                    <div class="thumb post-img"><a href="single_blog?IDBV={{$item->IDBV}}"> <img src="user/images/blog/{{$item->HinhBV}}"  alt="{{$item->TenBaiViet}}"></a></div>
                  </div>
                  <div class="post-info col-xs-8 ">
                    <h5> <a href="single_blog?IDBV={{$item->IDBV}}">{{$item->TenBaiViet}}</a> </h5>
                    <div class="date pull-left"> <i class="fa fa-calendar" aria-hidden="true"></i>{{$item->ThoiGianDang}}</div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-8 col-lg-9 mtb_20">
          <div class="row">
            <div class="blog-item listing-effect col-md-12 mb_50">
              <div class="post-info mtb_20 ">
                <h2 class="mb_10">{{$baiviet->TenBaiViet}}</h2>
               </div>
               @include('user.blog.'.$baiviet->TenFile)

              <div class="details mt_20">
                <div class="date"> <i class="fa fa-calendar" aria-hidden="true"></i>{{$baiviet->ThoiGianDang}}</div>
              </div>
              <div class="author-about">
                <h3 class="author-about-title">{{$baiviet->NguoiDang}}</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Single Blog  -->
  <!-- End Blog   -->
  <!-- =====  CONTAINER END  ===== -->
@endsection
