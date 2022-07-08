@extends('admin.index')
@section('content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê thương hiệu sản phẩm      
    </div>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Tên sản phẩm</option>
            <option value="1">Giá</option>
            <option value="1">Hình ảnh</option>v
            <option value="1">Thương hiệu</option>
            <option value="2">Danh mục</option>
            <option value="2">Hiển thị</option>
          </select>
          <button class="btn btn-sm btn-default">Apply</button>                
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" class="input-sm form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th>
              <th>Tên sản phẩm</th>
              <th>Giá</th>
              <th>Hình ảnh</th>
              <th>Thương hiệu</th>
              <th>Danh mục</th>
              <th>Hiển thị</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $product)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{$product->name}}</td>
              <td>{{$product->price}}</td>
              <td><img src="{{asset('images/'.$product->image)}}" height="100" width="100" alt=""></td>
              <td>{{$product->brand->brand_name}}</td>
              <td>{{$product->category->cate_name}}</td>
              <td><span class="text-ellipsis">
              @if($product->status == 0)
                <a href="{{route('product-active', ['id' => $product->id])}}"><span class="fa-fa-thumb-styling fa fa-thumbs-up"></span></a>
              @else 
              <a href="{{route('product-active', ['id' => $product->id])}}"><span class="fa-fa-thumb-styling fa fa-thumbs-down"></span></a>
              @endif
              </span></td>
              <td>
                <a href="" class="active" ui-toggle-class="">
                
                    <i><a href="{{route('product-edit', ['id' => $product->id])}}">Sửa</a></i>/
                    <i><a onclick="return confim('Bạn chắc chắn muôn xóa ?')" href="{{route('product-delete', ['id' => $product->id])}}">Xóa</a></i> 
                    
              </td>
            </tr>
           @endforeach
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          
          <div class="col-sm-5 text-center">
            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
          </div>
          <div class="col-sm-7 text-right text-center-xs">                
            <ul class="pagination pagination-sm m-t-none m-b-none">
              <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
              <li><a href="">1</a></li>
              <li><a href="">2</a></li>
              <li><a href="">3</a></li>
              <li><a href="">4</a></li>
              <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
@endsection