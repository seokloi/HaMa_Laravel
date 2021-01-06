          <div class="row">
            <div class="col-md-12">
              <div class="heading-part text-center mb_10">
                <h2 class="main_title mt_50">Sản Phẩm Tương Tự</h2>
              </div>
              <div class="related_pro box">
                <div class="product-layout  product-grid related-pro  owl-carousel mb_50 ">
                  @foreach (getSanPhamTuongTu($sanpham->IDTL) as $item)
                  <div class="item">
                    <div class="product-thumb">
                      <div class="image product-imageblock"><img src="user/images/product/{{$item->HinhChinh}}" style="width:300px;height:200px;" alt="{{$item->TenSanPham}}" title="{{$item->TenSanPham}}" class="img-responsive" onClick="window.location.href = 'product?IDSP={{$item->IDSP}}'">
                        <div class="button-group text-center">
                          <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                          <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
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
                        <span class="price"><span class="amount"><span class="currencySymbol">@if($item->Sale > 0)
                          	<strike>{{$item->Gia}} VNĐ</strike> / 
                          @endif
                          {{getGiaSale($item->Gia,$item->Sale)}} VNĐ</span></span>
                        </span>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
