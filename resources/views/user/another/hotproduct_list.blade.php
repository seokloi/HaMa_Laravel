         <div class="left-special left-sidebar-widget mb_50">
            <div class="heading-part mb_10 ">
              <h2 class="main_title">Sản Phẩm Nổi Bật</h2>
            </div>
            <div id="left-special" class="owl-carousel">
              <ul class="row ">
              	@foreach (getSanPhamNoiBat_Left() as $item)
                <li class="item product-layout-left mb_20">
                  <div class="product-list col-xs-4">
                    <div class="product-thumb">
                      <div class="image product-imageblock"> <img class="img-responsive" title="{{$item->TenSanPham}}" alt="{{$item->TenSanPham}}" src="user/images/product/{{$item->HinhChinh}}" onClick="window.location.href = 'product?IDSP={{$item->IDSP}}'"></div>
                      @if($item->Sale > 0)
                      <div class="hotproduct_sale">{{$item->Sale}}%</div>
                      @endif
                    </div>
                  </div>
                  <div class="col-xs-8">
                    <div class="caption product-detail">
                      <h6 class="product-name"><a href="product?IDSP={{$item->IDSP}}">{{$item->TenSanPham}}</a></h6>
                      <div class="rating"> 
                          	  @for ($i = 0; $i < $item->DanhGia; $i++)
                              <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                              @endfor
                              @for ($i = 0; $i < 5 - $item->DanhGia; $i++)
                              <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                              @endfor
                      </div>
                      <span class="price"><span class="amount"><span class="currencySymbol">@if($item->Sale > 0)
                          	<strike>{{$item->Gia}} VNĐ</strike> / 
                          @endif
                          {{getGiaSale($item->Gia,$item->Sale)}} VNĐ</span>
                      </span>
                    </div>
                  </div>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
