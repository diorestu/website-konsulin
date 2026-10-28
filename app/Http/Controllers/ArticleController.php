<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;
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

        $recommendedArticles = Article::published()
            ->select(['id', 'title', 'slug', 'excerpt', 'category', 'cover_path', 'cover_alt', 'published_at'])
            ->whereKeyNot($article->id)
            ->when(filled($article->category), fn (Builder $query): Builder => $query
                ->orderByRaw('CASE WHEN LOWER(TRIM(category)) = ? THEN 0 ELSE 1 END', [mb_strtolower(trim($article->category))]))
            ->latest('published_at')->orderByDesc('id')->limit(3)->get()
            ->map(fn (Article $recommended): array => [
                ...$recommended->toArray(),
                'url' => route('blog.show', $recommended->slug, false),
            ]);

        return Inertia::render('ArticleDetail', ['recommendedArticles' => $recommendedArticles, 'article' => [
            'title' => $article->title, 'slug' => $article->slug, 'excerpt' => $article->excerpt,
            'content' => Article::sanitize($article->content), 'category' => $article->category,
            'cover_url' => $article->cover_url, 'cover_alt' => $article->cover_alt, 'published_at' => $article->published_at->toIso8601String(),
        ]]);
    }
}
