<?php
namespace App\Http\Controllers\User;

use App\User;
use App\Article;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('blog.articles.index', [
            'articles' => User::find(Auth::id())->articl()->orderBy('created_at', 'desc')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.articles.create', [
            'article'    => [],
            'tag'        => [],
            'categories' => Category::with('children')->where('parent_id', 0)->get(),
            'delimiter'  => ''
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find(Auth::id());
        $article = new Article();
        $art = $user->articl()->save($article->create($request->all()));

        Tag::create([
            'id'         => $request->id,
            'tags'       => $request->tag,
            'created_ap' => $request->created_ap,
            'updated_ap' => $request->updated_ap
        ]);

        // Categories
        if($request->input('categories')) :
            $art->categories()->attach($request->input('categories'));
        endif;
        //Tags
        if($request->input('tags')):
            $art->tags()->attach($request->input('id'));
        endif;
        return redirect()->route('user.article.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Tag  $tag
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article, Tag $tag)
    {
        return view('blog.articles.edit', [
            'article'    => $article,
            'tag'        => $tag,
            'categories' => Category::with('children')->where('parent_id', 0)->get(),
            'delimiter'  => ''
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param  \App\Tag  $tag
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article, Tag $tag)
    {
        $article->update($request->except('slug'));
        $tag->update($request->except(''));

        // Categories
        $article->categories()->detach();
        if($request->input('categories')) :
            $article->categories()->attach($request->input('categories'));
        endif;

        return redirect()->route('user.article.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Tag  $tag
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article, Tag $tag)
    {
        $article->categories()->detach();
        $article->delete();
        $tag->delete();
        return redirect()->route('user.article.index');
    }
}