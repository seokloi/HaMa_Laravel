          <div id="category-menu" class="navbar collapse in mb_40" aria-expanded="true" style="" role="button">
            <div class="nav-responsive">
              <div class="heading-part">
                <h2 class="main_title">Danh Mục Sản Phẩm</h2>
              </div>
              <ul class="nav  main-navigation collapse in">
              	<li><a href="shop">Tất cả</a></li>
              	@foreach (getTheLoai() as $item)
                <li><a href="shop?IDTL={{$item->IDTL}}">{{$item->TenTheLoai}}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
