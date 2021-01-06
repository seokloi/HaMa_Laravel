@extends('user.layout.index')
@section('content')
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
      <div class="row ">
        <!-- =====  BANNER STRAT  ===== -->
        <div class="col-sm-12">
          <div class="breadcrumb ptb_20">
            <h1>Về Chúng Tôi</h1>
            <ul>
              <li><a href="././">Trang Chủ</a></li>
              <li class="active">Về Chúng Tôi</li>
            </ul>
          </div>
        </div>
        <!-- =====  BREADCRUMB END===== -->
        <div class="col-sm-8 col-lg-9 mtb_20">
          <!-- about  -->
          <div class="row">
            <div class="col-md-12">
              <figure> <img src="user/images/about-page-gaando.png" alt="#"> </figure>
            </div>
            <div class="col-md-12">
              <div class="about-text">
                <div class="about-heading-wrap">
                  <h2 class="about-heading mb_20 mt_40 ptb_10">HaMa Shop <span>HandMade From The Heart</span></h2>
                </div>
                <p>Trang web là sản phẩm đồ án của nhóm sinh viên trường ĐH Công Nghệ Thông Tin, Đại học Quốc Gia Tp Hồ Chí Minh.
               	<br /><p>Với mục đích học tập. Đề nghị mọi người không copy dưới mọi hình thức.
               	<br /><p>Xin chân thành cảm ơn.
              </div>
            </div>
          </div>
          <!--Team Carousel -->
          <div class="heading-part mb_10">
            <h2 class="main_title mt_50">Nhóm HaMa</h2>
          </div>
          <div class="team_grid box">
            <div class="team3col  owl-carousel">
              <div class="item team-detail">
                <div class="team-item-img"> <img src="user/images/tm1.jpg" alt="Trần Nguyên Lợi" /> </div>
                <div class="team-designation mt_20">Web Developer</div>
                <h4 class="team-title  mtb_10">Trần Nguyên Lợi </h4>
                <p>Phụ trách Font-end, Back-end, Thiết kế</p>
                <ul class="social mt_20 mb_80">
                  <li><a href="https://www.facebook.com/seokloi99" target="_blank"><i class="fa fa-facebook"></i></a></li>
                </ul>
              </div>
              <div class="item team-detail">
                <div class="team-item-img"> <img src="user/images/tm2.jpg" alt="Lê Bảo Lâm" /> </div>
                <div class="team-designation mt_20">Web Developer</div>
                <h4 class="team-title  mtb_10">Lê Bảo Lâm </h4>
                <p>Phụ trách xây dựng CSDL và Back-end</p>
                <ul class="social mt_20 mb_80">
                  <li><a href="https://www.facebook.com/lebaolam1999" target="_blank"><i class="fa fa-facebook"></i></a></li>
                </ul>
              </div>
            </div>
            <!--End Team Carousel -->
          </div>
        </div>
        <div id="column-left" class="col-sm-4 col-lg-3 hidden-xs">
          <div class="left_banner left-sidebar-widget mt_30 mb_40"><img src="user/images/about-right.jpg" alt="Left Banner" class="img-responsive" /></div>
        </div>
      </div>
    </div>
  </div>
  <!-- =====  CONTAINER END  ===== -->
@endsection