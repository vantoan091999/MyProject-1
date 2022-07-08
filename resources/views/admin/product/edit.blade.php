@extends('admin.index')
@section('content')
<div class="form-w3layouts">
    <div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                       Cập nhật sản phẩm 
                    </header>
                    <span>{{$msg ?? ''}}</span>

                    <div class="panel-body">
                        <div class="position-center">
                           
                        <form method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm </label>
                                <input type="text" value="{{$product->name}}" name="name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh sản phẩm </label>
                                <input type="file" value="{{$product->image}}" name="image" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá sản phẩm </label>
                                <input type="text" value="{{$product->price}}" name="price" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">mô tả sản phẩm</label>
                                <textarea style="resize:none" rows="8" name="desciption" class="form-control" id="exampleInputPassword1" placeholder="mô tả sản phẩm ">
                                    {{$product->desciption}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                <textarea style="resize:none" rows="8" name="content" class="form-control" id="exampleInputPassword1" placeholder="Nội dung sản phẩm ">
                                    {{$product->content}}
                                </textarea>
                            </div>
                             
                            <div>
                               
                                <label for="exampleInputPassword1">Thương hiệu </label>
                                <select name="brand_id" class="form-control input-sm m-bot15">
                                    
                                    <option value="{{$product->id}}">{{$product->brand_name}}</option>
                                    
                                </select>
                            </div>
                            <div>
                                <label for="exampleInputPassword1">Danh mục</label>
                                <select name="category_id" class="form-control input-sm m-bot15">
                                    
                                    <option value="{{$product->id}}">{{$product->cate_name}}</option>
                                   
                                </select>
                            </div>
                            
                            <div>
                                <label for="exampleInputPassword1">Hiển thị </label>
                                <select name="status" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                </select>
                            </div>
                            <input type="submit" name="add" class="btn btn-info" value="Thêm">
                            
                        </form>
                        </div>
                    </div>
                </section>
        </div>
    </div>
</div>
@endsection