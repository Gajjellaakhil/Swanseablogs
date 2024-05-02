<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Article;
use App\Models\Analytic;


class AnalyticController extends Controller
{
  public function analytics()
  {
      $numberOfUsers = User::count();
      $highestViewAnalytic = Analytic::select('article_id', DB::raw('SUM(views_count) as total_views'))
        ->groupBy('article_id')
        ->orderByDesc('total_views')
        ->first();
      $highestViewArticle = 0;
      if ($highestViewAnalytic) {
        $highestViewArticle = Article::find($highestViewAnalytic->article_id);
      }
      $highestCommentArticle = Article::withCount('comments')->orderBy('comments_count', 'desc')->first();
      $numberOfArticles = Article::count();
  
      return view('analytics.analytics', compact('numberOfUsers', 'highestViewArticle', 'highestCommentArticle', 'numberOfArticles'));
  }
}
