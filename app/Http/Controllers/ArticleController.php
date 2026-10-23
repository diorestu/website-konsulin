<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\Schema;
use Inertia\Inertia;
use Inertia\Response;

class ArticleController extends Controller
{
    public function index(): Response
    {
        $articles = Schema::hasTable('articles') ? Article::published()->select(['id', 'title', 'slug', 'excerpt', 'category', 'cover_path', 'cover_alt', 'published_at'])
            ->latest('published_at')->orderByDesc('id')->paginate(12) : ['data' => [], 'current_page' => 1, 'last_page' => 1, 'total' => 0, 'prev_page_url' => null, 'next_page_url' => null];

        return Inertia::render('Blog', ['articles' => $articles]);
    }

    public function show(string $slug): Response
    {
        $article = Article::published()->where('slug', $slug)->firstOrFail();

        return Inertia::render('ArticleDetail', ['article' => [
            'title' => $article->title, 'slug' => $article->slug, 'excerpt' => $article->excerpt,
            'content' => Article::sanitize($article->content), 'category' => $article->category,
            'cover_url' => $article->cover_url, 'cover_alt' => $article->cover_alt, 'published_at' => $article->published_at->toIso8601String(),
        ]]);
    }
}
