@extends('admin.index')
@section('content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê danh mục sản phẩm      
    </div>
      <div class="row w3-res-tb">
        {{-- <div class="col-sm-5 m-b-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Tên danh mục</option>
            <option value="1">Hiển thị</option>
            <option value="2">ngày thêm</option>
          </select>
          <button class="btn btn-sm btn-default">Apply</button>                
        </div> --}}
        <div class="col-sm-4">
        </div>
        {{-- <div class="col-sm-3">
          <div class="input-group">
            <input type="text" class="input-sm form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="button">Go!</button>
            </span>
          </div>
        </div> --}}
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
              <th>Tên danh mục</th>
              <th>Trang thái</th>
              <th></th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
            <tr>
              {{-- <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td> --}}
              <td>{{$category->name}}</td>
              <td><span class="text-ellipsis">
              @if($category->status == 0)
                <a href="{{route('category-active', ['id' => $category->id])}}"><span class="fa-fa-thumb-styling fa fa-thumbs-up"></span></a>
              @else 
              <a href="{{route('category-active', ['id' => $category->id])}}"><span class="fa-fa-thumb-styling fa fa-thumbs-down"></span></a>
              @endif
              </span>
              </td>
              <td>
                <a href="" class="active" ui-toggle-class="">
                    <i><a href="{{route('category-edit', ['id' => $category->id])}}">Sửa</a></i>/
                    <i><a onclick="return confim('Bạn chắc chắn muôn xóa ?')" href="{{route('category-delete', ['id' => $category->id])}}">Xóa</a></i>   
              </td>
              
            </tr>
           @endforeach
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          
          {{-- <div class="col-sm-5 text-center">
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
          </div> --}}
        </div>
      </footer>
    </div>
  </div>
@endsection