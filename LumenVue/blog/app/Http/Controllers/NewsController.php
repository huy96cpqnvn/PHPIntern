<?php


namespace App\Http\Controllers;
use App\News;
use Illuminate\Http\Request;


class NewsController extends Controller
{
    public function showNews() {
        return response()->json(News::all());
    }

    public function addNews(Request $request) {
        $this->validate($request, [
            'title' => 'required|max:256|min:3',
            'description' => 'required',
            'content' => 'required',
            'author' => 'required'
        ]);

        $news = News::create($request->all());
        return response()->json($news, 201);
    }

    public function showOneNews($id) {
        return response()->json(News::find($id));
    }

    public function updateNews(Request $request, $id) {
        $this->validate($request, [
            'title' => 'required|max:256|min:3',
            'description' => 'required',
            'content' => 'required',
            'author' => 'required'
        ]);

        $news = News::findOrFail($id);
        $news->update($request->all());

        return response()->json($news, 200);
    }

    public function deleteNews($id) {
        News::findOrFail($id)->delete();
        return response('Delete successfully', 200);
    }
}
