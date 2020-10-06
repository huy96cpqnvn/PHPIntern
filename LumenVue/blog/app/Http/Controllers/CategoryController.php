<?php


namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
// Cách để bảo vệ dữ liệu khi test api yêu cầu phải đăng nhập
//    public function showCategory(Request $request)
//    {
//        if (!empty(Auth::guard('api')->user()->id)) {
//            return response()->json(Category::all());
//        }
//        return response()->json(
//            ['message' => 'ABC'], 403
//        );
//    }

    public function showCategory()
    {
            return response()->json(Category::all());
    }

    public function addCategory(Request $request)
    {

        $this->validate($request, [
            'title' => 'required'
        ]);
        $cate = Category::create($request->all());
//        var_dump($cate);

        return response()->json($cate, 201);
    }

    public function showOneCategory($id)
    {
        return response()->json(Category::find($id));
    }

    public function updateCategory(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);

        $cate = Category::findOrFail($id);
        $cate->update($request->all());

        return response()->json($cate, 200);
    }

    public function deleteCategory($id)
    {
        Category::findOrFail($id)->delete();
        return response('Delete successfully', 200);
    }

    public function searchCategory($search = null)
    {
        $lsSearch = Category::whereRaw("title like '%" . $search . "%'")->get();
        return response()->json($lsSearch, 200);
    }
}
