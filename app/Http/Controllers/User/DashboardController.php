<?php

namespace App\Http\Controllers\User;
use App\User;
use App\Article;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //Dashboard
    public function dashboard() {
        return view('blog.home', [
            'articles' => User::find(Auth::id())->articl()->orderBy('created_at', 'desc')->paginate(5),
            'count_articles' => User::find(Auth::id())->articl()->count()
        ]);
    }
}