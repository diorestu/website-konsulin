<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class ArticleController extends Controller
{
    public function index(Request $request): Response
    {
        $filters = $request->validate(['search' => ['nullable', 'string', 'max:100'], 'status' => ['nullable', 'in:draft,published,archived']]);
        $articles = Article::query()->select(['id', 'title', 'slug', 'category', 'status', 'published_at', 'updated_at', 'cover_path'])
            ->when($filters['search'] ?? null, fn ($query, $search) => $query->where('title', 'like', '%'.$search.'%'))
            ->when($filters['status'] ?? null, fn ($query, $status) => $query->where('status', $status))
            ->latest('updated_at')->orderByDesc('id')->paginate(15)->withQueryString();

        return Inertia::render('Admin/Articles', ['articles' => $articles, 'filters' => $filters]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/ArticleForm', ['article' => null]);
    }

    public function store(ArticleRequest $request): RedirectResponse
    {
        $article = new Article;
        $article->user_id = $request->user()->id;
        $this->save($request, $article);

        return to_route('admin.articles.edit', $article)->with('success', 'Artikel berhasil dibuat.');
    }

    public function edit(Article $article): Response
    {
        return Inertia::render('Admin/ArticleForm', ['article' => $article]);
    }

    public function update(ArticleRequest $request, Article $article): RedirectResponse
    {
        $this->save($request, $article);

        return back()->with('success', 'Artikel berhasil disimpan.');
    }

    private function save(ArticleRequest $request, Article $article): void
    {
        $oldCover = $article->cover_path;
        $article->fill($request->safe()->except(['cover', 'remove_cover']));
        $article->content = Article::sanitize($article->content);
        if ($request->hasFile('cover')) {
            $path = $request->file('cover')->store('articles', 'public');
            abort_unless($path, 503, 'Gambar gagal disimpan.');
            $article->cover_path = $path;
        } elseif ($request->boolean('remove_cover')) {
            $article->cover_path = null;
        }
        if ($article->status === 'published' && ! $article->published_at) {
            $article->published_at = now();
        }
        $article->save();
        if ($oldCover && $oldCover !== $article->cover_path) {
            Storage::disk('public')->delete($oldCover);
        }
    }

    public function uploadImage(Request $request): JsonResponse
    {
        $request->validate(['image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120']]);
        $path = $request->file('image')->store('articles', 'public');

        abort_unless($path, 503, 'Gambar gagal disimpan.');

        return response()->json(['url' => '/storage/'.$path], 201);
    }
}
