@extends('user.layout.index')
@section('content')
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
      <div class="row ">
        <!-- =====  BANNER STRAT  ===== -->
        <div class="col-sm-12">
          <div class="breadcrumb ptb_20">
            <h1>Blog</h1>
            <ul>
              <li><a href="././">Trang Chủ</a></li>
              <li class="active">Bài Viết</li>
            </ul>
          </div>
        </div>
        <!-- =====  BREADCRUMB END===== -->
        <div class="col-sm-8 col-lg-12 mtb_20">
          <div class="row">
            <div class="three-col-blog text-left">
              @foreach($blogs as $item)
              <div class="blog-item col-md-4 mb_30">
                <div class="post-format">
                  <div class="thumb post-img"><a href="single_blog?IDBV={{$item->IDBV}}"> <img src="user/images/blog/{{$item->HinhBV}}" style="width:400px;height:250px;" alt="{{$item->TenBaiViet}}"></a></div>
                  <div class="post-type"><i class="fa fa-music" aria-hidden="true"></i></div>
                </div>
                <div class="post-info mtb_20 ">
                  <h3 class="mb_10"> <a href="single_blog?IDBV={{$item->IDBV}}">{{$item->TenBaiViet}}</a> </h3>
                  <div class="details mtb_20">
                    <div class="date pull-left"> <i class="fa fa-calendar" aria-hidden="true"></i>{{$item->ThoiGianDang}} </div>
                    <div class="more pull-right"> <a href="single_blog?IDBV={{$item->IDBV}}">Xem thêm <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
          <div class="pagination-nav text-center mtb_20">
              {{ $blogs->links() }}
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
  </div>
  <!-- =====  CONTAINER END  ===== -->
@endsection
