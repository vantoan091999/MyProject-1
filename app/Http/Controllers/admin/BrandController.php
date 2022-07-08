<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Session;

class BrandController extends Controller
{
    public function add()
    {
        return view('admin.brand.add');
    }

    public function list()
    {
        $brands = Brand::all();
       
        return view('admin.brand.list', [
            'brands'=> $brands
        ]);
    }

    public function update(int $id, Request $request)
    {
       $brand = Brand::find($id);
      
       if ($brand) {
            $data = [
                'name' => $request['name'],
                'desciption' => $request['desciption'],
                'status' => $request['status'],
            ];

            Brand::where('id', $id)->update($data);
            return view('admin.brand.edit')->with('msg', 'Sửa danh mục sản phẩm thành công ');   
       }
       return view('admin.brand.edit')->with('msg', 'Sửa danh mục sản phẩm không thành công');
    }

    public function show(int $id)
    {
        $brand = Brand::find($id);  //select * from brand where id = id
        if ($brand) {
           return view('admin.brand.edit', [
            'brand' =>$brand,
           ]);
        }
    }

    public function create(Request $request)
    {
        $data = [
            'name' => $request['name'],
            'desciption' => $request['desciption'],
            'status' => $request['status'],
        ];
        Brand::create($data);

        return view('admin.brand.add')->with('msg', 'Thêm thành công');
    }

  
    public function delete(int $id)
    {
        $brand = Brand::find($id);  //select * from brand where id = id
        if ($brand) {
            $brand->delete();
        
            return redirect()->route('brand-list')->with('msg', 'Xóa thành công');
        }

        return redirect()->route('brand-list')->with('msg', 'Xóa không thành công');
    }

    public function active(int $id )
    {
        $brand = Brand::find($id);
        if ($brand) {
            if($brand->status != 0) {
                Brand::where('id', $id)->update(['status' => 0]);

                return redirect()->route('brand-list')->with('msg', 'Thanh cong');
            }
            
            $brand->status = 1;
            $brand->save();

            return redirect()->route('brand-list')->with('msg', 'Thanh cong');
               
        } 

        return redirect()->route('brand-list')->with('msg', 'That bai'); 
    }

}
