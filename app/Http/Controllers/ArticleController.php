<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Analytic;


class ArticleController extends Controller
{

    public function create()
    {
        return view('article.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg|max:5120', // Maximum size 5MB
        ]);

        $imageName = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
        }

        $article = Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imageName,
            'user_id' => auth()->user()->id
        ]);
        return redirect('articles');
    }

    public function update(Request $request, Article $article)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg|max:5120', // Maximum size 5MB
        ]);
        $imageName = !empty($request->image) ? $request->image : '';
        
        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
        }

        // Save the changes to the article
        $article->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imageName,
            'user_id' => auth()->user()->id,
        ]);

        // Redirect the user to the articles index page
        return redirect('articles');
    }

    public function index()
    {
        $articles = Article::paginate(3);
        return view('article.articles', compact('articles'));
    }

    public function view(Article $article)
    {
        $analytic = Analytic::firstOrNew(['article_id' =>  $article->id]);
        $analytic->views_count += 1;
        $analytic->save();
        $comments = $article->comments;
        return view('article.view', [
            'article' => $article,
            'comments' => $comments
        ]);
    }

    public function edit(Article $article)
    {
        return view('article.edit', [
            'article' => $article,
        ]);
    }
    
    public function viewLoggedInUserArticles(Request $request)
    {
        $user = $request->user();
        $articles = Article::where('user_id', $user->id)->with(['comments'])->paginate(10);
        $comments = Comment::where('user_id', $user->id);

        return view('article.myArticles', compact('articles', 'comments'));
    }

    public function viewArticlesByUserId($userId)
    {
        // Check if the user is authenticated and is the same as the requested user ID or is an admin
        if (auth()->check() && (auth()->id() == $userId || auth()->user()->isAdmin())) {
            // Retrieve paginated articles based on the provided user ID
            $articles = Article::where('user_id', $userId)->paginate(3); // Paginate with 10 articles per page
            
            // Pass the retrieved articles to the view
            return view('article.articles', ['articles' => $articles]);
        } else {
            // User is not authorized to view articles
            return view('access-denied');
        }
    }
}
