    <!-- =====  FOOTER START  ===== -->
    <div class="footer pt_60">
      <div class="container">
        <div class="row">
          <div class="col-md-5 footer-block">
            <ul>
              <li><a href="././"> <img alt="HaMa-logo" src="user/images/footer-logo.png" height="500" align="center"> </a> </li>
            </ul>
          </div>
          <div class="col-md-3 footer-block">
            <h6 class="footer-title ptb_20">Danh mục</h6>
            <ul>
              <li><a heft="#"></a></li>
                  @foreach (getTheLoai() as $item)
                  <li>
                    <a href="shop?IDTL={{$item->IDTL}}">{{$item->TenTheLoai}}</a>
                  </li>
                  @endforeach
            </ul>
          </div>
          <div class="col-md-4 footer-block">
            <h6 class="footer-title ptb_20" ><a href="contact_us">Liên hệ</a></h6>
            <ul>
              <li>Ktx Khu A, Khu phố 6 - Phường Linh Trung
                <br> Quận Thủ Đức - TPHCM</li>
              <li>Phone: 084 7603 779</li>
              <li>HaMaShop@gmail.com</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-bottom mt_60 ptb_20">
        <div class="container">
          <div class="row">
            <div class="col-sm-8">
              <a style="align: center"><footer>&copy; Copyright HaMaShop</footer>
</a>
            </div>
            <div class="col-sm-4">
              <div class="payment-icon text-right">
                <ul>
                  <li><i class="fa fa-cc-paypal "></i></li>
                  <li><i class="fa fa-cc-visa"></i></li>
                  <li><i class="fa fa-cc-discover"></i></li>
                  <li><i class="fa fa-cc-mastercard"></i></li>
                  <li><i class="fa fa-cc-amex"></i></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- =====  FOOTER END  ===== -->