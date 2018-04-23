<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;

class ArticleController extends Controller
{
    public function index()
    {
        return view('admin/article/index')->with('articles',Article::all());
    }

    /*
     * create new article
     */
    public function create()
    {
        return view('admin/article/create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
            'title' => 'required|unique:articles|max:255',
            'body' => 'required',
        ]);

        $article = new Article;
        $article->type = $request->get('type');
        $article->title = $request->get('title');
        $article->body = $request->get('body');
        $article->user_id = $request->user()->id;

        if ($article->save()) {
            return redirect('admin/articles');
        } else {
            return redirect()->back()->withInput()->withErrors('Fail to Save！');
        }
    }

    public function destroy($id)
    {
        Article::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('Delete successfully！');
    }
}
