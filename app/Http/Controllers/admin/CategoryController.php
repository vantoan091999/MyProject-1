<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Session;

class CategoryController extends Controller
{
    public function add() 
    {
        return view('admin.category.add');
    }
    
    public function list()
    {
        $categories = Category::all();
        
        return view('admin.category.list', [
            'categories'=> $categories,
        ]);
    }

    public function update(int $id, Request $request)
    {
       $category = Category::find($id);
     
       if ($category) {
            $data = [
                'name' => $request['name'],
                'description' => $request['description'],
                'status' => $request['status'],
            ];

            Category::where('id', $id)->update($data);
            return view('admin.category.edit')->with('msg', 'Sửa danh mục sản phẩm thành công ');   
       }
       return view('admin.category.edit')->with('msg', 'Sửa danh mục sản phẩm không thành công');
    }

    public function edit(int $id)
    {
        $category = Category::find($id);  //select * from category where id = id
        if ($category) {
           return view('admin.category.edit', [
            'category' => $category,
           ]);
        }
    }
 
    public function create(Request $request)
    {
        
        $data = [
            'name' => $request['name'],
            'description' => $request['description'],
            'status' => $request['status'],
        ];
        Category::create($data);

        return view('admin.category.add')->with('msg', 'Thêm thành công');
    }

  
    public function delete(int $id)
    {
        $category = Category::find($id);  //select * from category where id = id
        if ($category) {
            $category->delete();
        //    return view('admin.category.list', 'msg', 'Xóa thành công');
        return redirect()->route('category-list')->with('msg', 'Xóa thành công');
        }
        return redirect()->route('category-list')->with('msg', 'Xóa không thành công');
    }

    public function active(int $id )
    {
        $category = Category::find($id);
        if ($category) {
            if($category->status != 0) {
                Category::where('id', $id)->update(['status' => 0]);

                return redirect()->route('category-list')->with('msg', 'Thanh cong');
            }
            
            $category->status = 1;
            $category->save();

            return redirect()->route('category-list')->with('msg', 'Thanh cong');
                // $category->status = !$category->status;
                // $category->save();
        } 

        return redirect()->route('category-list')->with('msg', 'That bai'); 
    }

  
   
} 