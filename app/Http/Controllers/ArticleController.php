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
        $empty = ['data' => [], 'current_page' => 1, 'last_page' => 1, 'total' => 0, 'prev_page_url' => null, 'next_page_url' => null];
        if (! Schema::hasTable('articles')) {
            return Inertia::render('Blog', ['articles' => ['data' => []], 'taxArticles' => $empty, 'accountingArticles' => $empty]);
        }
        $query = static fn () => Article::published()->select(['id', 'title', 'slug', 'excerpt', 'category', 'cover_path', 'cover_alt', 'published_at'])
            ->latest('published_at')->orderByDesc('id');

        return Inertia::render('Blog', [
            'articles' => ['data' => $query()->limit(3)->get()],
            'taxArticles' => $query()->whereRaw('LOWER(TRIM(category)) IN (?, ?)', ['pajak', 'perpajakan'])
                ->paginate(5, ['*'], 'pajak_page')->withQueryString(),
            'accountingArticles' => $query()->whereRaw('LOWER(TRIM(category)) IN (?, ?)', ['accounting', 'akuntansi'])
                ->paginate(5, ['*'], 'accounting_page')->withQueryString(),
        ]);
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
