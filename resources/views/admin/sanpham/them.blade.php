@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản Phẩm
                    <small>Thêm</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>
                @endif
                @if(session('loi'))
                    <div class="alert alert-danger">
                        {{session('loi')}}
                    </div>
                @endif
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif

                <form action="admin/sanpham/them" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input class="form-control" name="TenSanPham"/>
                    </div>
                    <div class="form-group">
                        <label>Giá</label>
                        <input class="form-control" type="number" name="Gia"/>
                    </div>
                    <div class="form-group">
                        <label>Sale</label>
                        <input class="form-control" type="number" name="Sale"/>
                    </div>
                    <div class="form-group">
                        <label>Thể loại</label>
                        <select class="form-control" name="TheLoai" id="TheLoai">
                            @foreach(getTheLoai() as $item)
                                <option value="{{$item->IDTL}}">{{$item->TenTheLoai}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh chính</label>
                        <input id="HinhChinh" type="file" class="form-control" name="HinhChinh" required/>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh phụ</label>
                        <input id="HinhPhu" type="file" class="form-control" name="HinhPhu"  required/>
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea type="text" class="form-control" name="MoTa"/></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Thêm</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection

@section('script')
<script>
    $("#Hinh").change(function(e) {
        for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {        
            var file = e.originalEvent.srcElement.files[i];      
            var img = document.createElement("img");
            var reader = new FileReader();
            reader.onloadend = function() {
                img.src = reader.result;
                img.width = 300;
            }
            reader.readAsDataURL(file);
            $("input").after(img);
        }
    });

</script>
@endsection