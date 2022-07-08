@extends('admin.index')
@section('content')
<div class="form-w3layouts">
    <div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                       Thêm thương hiệu sản phẩm 
                    </header>
                    <span style= "color: blue">{{$msg ?? ''}}</span>

                    <div class="panel-body">
                        <div class="position-center">
                           
                        <form method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên thương hiệu</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">mô tả thương hiệu</label>
                                <textarea style="resize:none" rows="8" name="desciption" class="form-control" id="exampleInputPassword1" placeholder="mô tả danh mục ">
                                </textarea>
                                </div>
                            <label for="exampleInputPassword1">Hiển thị </label>
                            <select name="status" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                            <input type="submit" name="add" class="btn btn-info" value="Thêm">
                            
                        </form>
                        </div>
                    </div>
                </section>
        </div>
    </div>
</div>
@endsection