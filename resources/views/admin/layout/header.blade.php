<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="admin/sanpham/danhsach">Quản Lý Shop</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                @if(isset($thongtindangnhap))
                <li><a><i class="fa fa-user fa-fw"></i> {{$thongtindangnhap->TenNguoiDung}}</a>
                </li>
                <li><a href="admin/{{$thongtindangnhap->id}}"><i class="fa fa-gear fa-fw"></i> Đổi mật khẩu {{$thongtindangnhap->id}}</a>
                </li>
                <li class="divider"></li>
                <li><a href="admin/dangxuat"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                </li>
                @endif
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    @include('admin.layout.menu')
    <!-- /.navbar-static-side -->
</nav>
