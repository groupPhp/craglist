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

    /*
     * create new article
     */
    public function edit($id)
    {
        return view('admin/article/edit')->withArticle(Article::find($id));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
            'title' => 'required|unique:articles|max:255',
            'body' => 'required',
        ]);

        $article = Article::find($id);
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

    public function show($id)
    {
        return view('article/show')->withArticle(Article::with('hasManyComments')->find($id));
    }

    public function destroy($id)
    {
        Article::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('Delete successfully！');
    }
}