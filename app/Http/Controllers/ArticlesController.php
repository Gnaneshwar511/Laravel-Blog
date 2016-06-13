<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use App\User;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;
use Auth;
use DB;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    public function __construct() {
        $this->middleware('create', ['only' => 'create']);
        $this->middleware('edit', ['only' => 'edit']);
    }

    public function index() {
        $articles = Article::where('published_at', '<=', Carbon::now())->get();
        $latest = Article::latest()->first();
        return view('articles.index', compact('articles', 'latest'));
    }

    public function create() {
        $tags = \App\Tag::lists('name', 'id');
        return view('articles.create', compact('tags'));
    }

    public function show(Article $article) {
        return view('articles.show', compact('article'));
    }

    public function store(ArticleRequest $request) {
        $article = Article::create($request->all());
        if($request->file('image')) {
            $article->setImage($request);
        }
        Auth::user()->articles()->save($article);
        $tagIds = $request->input('tags');
        $article->tags()->attach($request->input('tag_list'));
        session()->flash('flash_message', 'Your article has been created!');
        session()->flash('flash_message_important', true);

        return redirect()->route('articles.index');
    }

    public function edit(Article $article) {
        $tags = Tag::lists('name', 'id')->all();
        return view('articles.edit', compact('article', 'tags'));
    }

    public function update(Article $article, ArticleRequest $request) {
        $article->update($request->all());
        $article->tags()->sync($request->input('tag_list'));
        return redirect('articles');
    }

    public function searchcontent(Request $request) {
        $searchTerm = $request->input('title');
        $articles = DB::table('articles')
                    ->where('title', 'like', "%$searchTerm%")
                    ->orwhere('body', 'like', "%$searchTerm%")
                    ->get();
        return view('searchresults.listresults', compact('articles'));
    }

    public function viewauthorsposts($authorid = null) {
        $author = User::where('id', '=', $authorid)->first();
        $articles = $author->articles()->get();
        return view('searchresults.listresults', compact('articles'));
    }

}
