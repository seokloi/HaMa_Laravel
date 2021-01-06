@extends('user.layout.index')
@section('content')
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
      <div class="row ">
        <!-- =====  BANNER STRAT  ===== -->
        <div class="col-sm-12">
          <div class="breadcrumb ptb_20">
            <h1>Liên Hệ</h1>
            <ul>
              <li><a href="././">Trang Chủ</a></li>
              <li class="active">Liên Hệ</li>
            </ul>
          </div>
        </div>
        <!-- =====  BREADCRUMB END===== -->
        <div class="col-lg-1 mtb_20">
        </div>
        <div class="col-sm-8 col-lg-10 mtb_20">
          <!-- contact  -->
          <div class="row">
            <div class="col-md-4 col-xs-12 contact">
              <div class="location mb_50">
                <h5 class="capitalize mb_20"><strong>HaMa Shop</strong></h5>
                <div class="address">Địa chỉ văn phòng
                  <br>Ktx Khu A, Khu phố 6 
                  <br>Phường Linh Trung 
                  <br>Quận Thủ Đức - TPHCM</div>
                <div class="call mt_10"><i class="fa fa-phone" aria-hidden="true"></i>084 7603 779</div>
              </div>
              <div class="Career mb_50">
                <h5 class="capitalize mb_20"><strong>Gmail làm việc</strong></h5>
                <div class="address">Chỉ nhận gmail làm việc.<br>Nội dung tiêu đề: Cc|Nội dung<br>Gmail liên hệ gửi bằng biểu mẫu bên cạnh </div>
                <div class="email mt_10"><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:careers@yourdomain.com" target="_top">HaMaShop@gmail.com</a></div>
              </div>
            </div>
            <div class="col-md-8 col-xs-12 contact-form mb_50">
              <!-- Contact FORM -->
              <div id="contact_form">
                <form id="contact_body" method="post" action="contact_me">
                  <!--                                <label class="full-with-form" ><span>Name</span></label>
-->
                  <input class="full-with-form " type="text" name="name" placeholder="Họ Tên" data-required="true" />
                  <!--                <label class="full-with-form" ><span>Email Address</span></label>
-->
                  <input class="full-with-form  mt_30" type="email" name="email" placeholder="Địa chỉ Email" data-required="true" />
                  <!--                <label class="full-with-form" ><span>Phone Number</span></label>
-->
                  <input class="full-with-form  mt_30" type="text" name="phone1" placeholder="Số điện thoại" maxlength="15" data-required="true" />
                  <!--                <label class="full-with-form" ><span>Subject</span></label>
-->
                  <input class="full-with-form  mt_30" type="text" name="subject" placeholder="Tiêu đề" data-required="true">
                  <!--                                <label class="full-with-form" ><span>Attachment</span></label>
-->
                  <!--                                <label class="full-with-form" ><span>Message</span></label>
-->
                  <textarea class="full-with-form  mt_30" name="message" placeholder="Nội dung" data-required="true"></textarea>
                  <button class="btn mt_30" type="submit">Gửi</button>
                </form>
                <div id="contact_results"></div>
              </div>
              <!-- END Contact FORM -->
            </div>
          </div>
          <!-- map  -->
          <div class="row">
            <div class="col-xs-12 map mb_80">
              <div id="map">
              	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9610.483945707467!2d106.80250020337952!3d10.877851254533569!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x29d5aeb365cee20b!2sKTX%20Khu%20A%20%C4%90HQG%20TP.HCM!5e0!3m2!1svi!2s!4v1591037826077!5m2!1svi!2s" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-1 mtb_20">
        </div>
      </div>
    </div>
  </div>
  <!-- Single Blog  -->
  <!-- End Blog   -->
  <!-- =====  CONTAINER END  ===== -->
@endsection
