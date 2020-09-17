<?php


namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;


class NewsController extends Controller
{
    public function showNews()
    {
        $data = [];
        $news = News::all();
        foreach ($news as $new) {
//            $data[$key]['id'] = $value['id'];
            $data[$new->id]['title'] = $new->title;
            $data[$new->id]['category'] = $new->category->title;
            $data[$new->id]['description'] = $new->description;
            $data[$new->id]['content'] = $new->content;
            $data[$new->id]['author'] = $new->author;
            $data[$new->id]['status'] = $new->status;
            $data[$new->id]['id'] = $new->id;
            $data[$new->id]['category_id'] = $new->category_id;
        }
//        var_dump(json_encode($data));die; //var_dump là đưa ra dữ liệu json. encode là chuyển từ mảng về string
                                            //decode là chuyển từ string về mảng

        return response()->json($data,200);

    }


    public function addNews(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'title' => 'required|max:256|min:3',
            'description' => 'required',
            'content' => 'required',
            'author' => 'required'
        ]);

        $news = new News();
        $news->title = $input['title'];
        $news->description = $input['description'];
        $news->content = $input['content'];
        $news->author = $input['author'];
        $news->status = $input['status'];
        $news->category_id = $input['category_id'];
        $news->user_id = $input['user_id'];
        $news->cover = "";

//        $file = $request->file;
//        $upload_image = '';
//        if ($file != null) {
//            $image_name = $file->getClientOriginalName() . "." . $file->getClientOriginalExtension();
//            $image_name = time() . "_" . $image_name;
//            $image_public_path = public_path("images");
//            $file->move($image_public_path, $image_name);
//            $upload_image = "images/" . $image_name;
//        }
//        $news->cover = $upload_image;

        $news->save();

        return response()->json($news, 201);
    }

    public function showOneNews($id)
    {
        return response()->json(News::find($id));
    }

    public function updateNews(Request $request, $id)
    {
        $input = $request->all();
        $this->validate($request, [
            'title' => 'required|max:256|min:3',
            'description' => 'required',
            'content' => 'required',
            'author' => 'required'
        ]);

        $news = News::find($id);
        $news->title = $input['title'];
        $news->description = $input['description'];
        $news->content = $input['content'];
        $news->author = $input['author'];
        $news->status = $input['status'];
        $news->category_id = $input['category_id'];
        $news->user_id = $input['user_id'];
        $news->cover = "";

//        $file = $request->file;
//        $upload_image = '';
//        if ($file != null) {
//            $image_name = $file->getClientOriginalName() . "." . $file->getClientOriginalExtension();
//            $image_name = time() . "_" . $image_name;
//            $image_public_path = public_path("images");
//            $file->move($image_public_path, $image_name);
//            $upload_image = "images/" . $image_name;
//            $news->cover = $upload_image;
//        }


        $news->save();

        return response()->json($news, 200);
    }

    public function deleteNews($id)
    {
        News::findOrFail($id)->delete();
        return response('Delete successfully', 200);
    }

    public function showNewsByStatus($status)
    {
        $data = [];
        $news = News::where('status', $status)->orderBy('created_at', 'desc')->get();
        foreach ($news as $new) {
//            $data[$key]['id'] = $value['id'];
            $data[$new->id]['title'] = $new->title;
            $data[$new->id]['category'] = $new->category->title;
            $data[$new->id]['description'] = $new->description;
            $data[$new->id]['content'] = $new->content;
            $data[$new->id]['author'] = $new->author;
            $data[$new->id]['status'] = $new->status;
            $data[$new->id]['id'] = $new->id;
            $data[$new->id]['category_id'] = $new->category_id;
        }

        return response()->json($data, 200);

    }

    public function searchNews($search = null) {
        $data = [];
        $lsSearch = News::whereRaw("title like '%" . $search . "%'")->get();

        foreach ($lsSearch as $new) {
//            $data[$key]['id'] = $value['id'];
            $data[$new->id]['title'] = $new->title;
            $data[$new->id]['category'] = $new->category->title;
            $data[$new->id]['description'] = $new->description;
            $data[$new->id]['content'] = $new->content;
            $data[$new->id]['author'] = $new->author;
            $data[$new->id]['status'] = $new->status;
            $data[$new->id]['id'] = $new->id;
            $data[$new->id]['category_id'] = $new->category_id;
        }
        return response()->json($data, 200);
    }
}
