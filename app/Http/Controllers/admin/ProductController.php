<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Session;

class ProductController extends Controller
{
    public function add()
    {
        $brand = Brand::all();
        $cate = Category::all();
        $msg = Session::get('msg');
    

        return view('admin.product.add', [
            'cate' => $cate,
            'brand' => $brand,
            'msg' => $msg
        ]);
    }

    public function list()
    {
        // $products = DB::table('tbl_products')
        // ->join('tbl_category', 'tbl_products.category_id', '=', 'tbl_category.id')
        // ->join('tbl_brand', 'tbl_products.brand_id', '=', 'tbl_brand.id')
        // ->select('tbl_products.*', 'tbl_category.cate_name', 'tbl_brand.brand_name')
        // ->get();
        $products = Product::all();

        return view('admin.product.list', [
            'products'=> $products
        ]);
    }

    public function update(int $id, Request $request)
    {
       $product = Product::find($id);
      
       if ($product) {
            $data = [
                'name' => $request['name'],
                'desciption' => $request['desciption'],
                'status' => $request['status'],
            ];

            Product::where('id', $id)->update($data);

            return view('admin.product.edit')->with('msg', 'Sửa danh mục sản phẩm thành công ');   
        }

       return view('admin.product.edit')->with('msg', 'Sửa danh mục sản phẩm không thành công');
    }

    public function edit(int $id)
    {
        $product = DB::table('tbl_products')
            ->join('tbl_category', 'tbl_products.category_id', '=', 'tbl_category.id')
            ->join('tbl_brand', 'tbl_products.brand_id', '=', 'tbl_brand.id')
            ->select('tbl_products.*', 'tbl_category.cate_name', 'tbl_brand.brand_name')
            ->where('tbl_products.id', $id)
            ->first();
            
        return view('admin.product.edit', [
            'product' => $product,
        ]);
        // $product = Product::find($id);  //select * from product where id = id
        // if ($product) {
        //    return view('admin.product.edit', [
        //     'product' =>$product,
        //    ]);
        // }
    }

    public function create(Request $request)
    {
       
        if (!$request->hasFile('image')) {
            // Nếu không thì in ra thông báo
            return view('')->with('Mời chọn file cần upload');
        }
        // Nếu có thì thục hiện lưu trữ file vào public/images
        $image = $request->file('image');
        $storedPath = $image->move('upload_images', $image->getClientOriginalName());
        $data = [
            'name' => $request['name'],
            'desciption' => $request['desciption'],
            'price' => $request['price'],
            'content' => $request['content'],
            'status' => $request['status'],
            // 'image' => $request->file('image')->storeAs('images', 'avatar.jpg', 'local'),
            'image' => $image->getClientOriginalName(),
            'brand_id' => $request['brand_id'],
            'category_id' => $request['category_id'],
        ]; 
        Product::create($data);
        return redirect()->route('product-add')->with('msg', 'Thêm thành công');
    }

  
    public function delete(int $id)
    {
        $product = Product::find($id);  //select * from product where id = id
        if ($product) {
            $product->delete();
        ;
        return redirect()->route('product-list')->with('msg', 'Xóa thành công');
        }
        return redirect()->route('product-list')->with('msg', 'Xóa không thành công');
    }

    public function active(int $id )
    {
        $product = product::find($id);
        if ($product) {
            if($product->status != 0) {
                Product::where('id', $id)->update(['status' => 0]);

                return redirect()->route('product-list')->with('msg', 'Thanh cong');
            } 
            $product->status = 1;
            $product->save();

            return redirect()->route('product-list')->with('msg', 'Thanh cong');
               
        } 

        return redirect()->route('product-list')->with('msg', 'That bai'); 
    }

    public function detail(int $id)
    {
        $brands = Brand::all();
        $categories = Category::all();
        $product = Product::where('id', $id)->first();
        $related_product = Product::where('category_id', $product->category_id)->where('id','!=',$id)->get();

        return view('pages.detail', [
            'brands' =>$brands,
            'categories' =>$categories,
            'product' => $product,
            'related_product' =>$related_product
        ]);
    }

}
