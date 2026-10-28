<?php

namespace Tests\Feature;

use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class BlogLayoutTest extends TestCase
{
    use RefreshDatabase;

    public function test_blog_shows_latest_three_and_separate_tax_and_accounting_lists(): void
    {
        $this->withoutVite();
        $this->freezeTime();
        foreach (['Pajak', 'Perpajakan', 'Accounting', 'Akuntansi', 'Lainnya'] as $index => $category) {
            Article::factory()->create(['title' => 'Artikel '.$index, 'category' => $category, 'status' => 'published', 'published_at' => now()->subDays(5 - $index)]);
        }
        Article::factory()->create(['category' => 'Pajak', 'status' => 'draft']);
        Article::factory()->create(['category' => 'Accounting', 'status' => 'archived', 'published_at' => now()]);
        Article::factory()->create(['category' => 'Pajak', 'status' => 'published', 'published_at' => now()->addDay()]);

        $this->get('/blog')->assertOk()->assertInertia(fn (Assert $page) => $page->component('Blog')
            ->has('articles.data', 3)->where('articles.data.0.title', 'Artikel 4')->where('articles.data.2.title', 'Artikel 2')
            ->has('taxArticles.data', 2)->where('taxArticles.data.0.category', 'Perpajakan')
            ->has('accountingArticles.data', 2)->where('accountingArticles.data.0.category', 'Akuntansi')
            ->missing('taxArticles.data.0.content'));
    }

    public function test_category_lists_paginate_independently(): void
    {
        $this->withoutVite();
        Article::factory()->count(6)->create(['category' => 'Pajak', 'status' => 'published', 'published_at' => now()->subDay()]);
        Article::factory()->count(2)->create(['category' => 'Accounting', 'status' => 'published', 'published_at' => now()->subDay()]);

        $this->get('/blog?pajak_page=2')->assertOk()->assertInertia(fn (Assert $page) => $page
            ->has('articles.data', 3)->has('taxArticles.data', 1)->where('taxArticles.current_page', 2)
            ->has('accountingArticles.data', 2)->where('accountingArticles.current_page', 1));
    }

    public function test_article_recommendations_prioritize_category_and_only_include_other_published_articles(): void
    {
        $this->withoutVite();
        $this->freezeTime();
        $current = Article::factory()->create(['category' => 'Pajak', 'status' => 'published', 'published_at' => now()]);
        $related = Article::factory()->create(['category' => 'pajak', 'status' => 'published', 'published_at' => now()->subWeek()]);
        $recent = Article::factory()->create(['category' => 'Accounting', 'status' => 'published', 'published_at' => now()->subDay()]);
        $older = Article::factory()->create(['category' => null, 'status' => 'published', 'published_at' => now()->subDays(2)]);
        Article::factory()->create(['status' => 'published', 'published_at' => now()->subMonth()]);
        Article::factory()->create(['category' => 'Pajak', 'status' => 'draft']);
        Article::factory()->create(['category' => 'Pajak', 'status' => 'archived', 'published_at' => now()]);
        Article::factory()->create(['category' => 'Pajak', 'status' => 'published', 'published_at' => now()->addDay()]);

        $this->get('/blog/'.$current->slug)->assertOk()->assertInertia(fn (Assert $page) => $page
            ->component('ArticleDetail')->has('recommendedArticles', 3)
            ->where('recommendedArticles.0.id', $related->id)
            ->where('recommendedArticles.1.id', $recent->id)
            ->where('recommendedArticles.2.id', $older->id)
            ->where('recommendedArticles.0.url', route('blog.show', $related->slug, false))
            ->missing('recommendedArticles.0.content'));
    }

    public function test_article_without_other_published_articles_has_no_recommendations(): void
    {
        $this->withoutVite();
        $article = Article::factory()->create(['status' => 'published', 'published_at' => now()->subDay()]);

        $this->get('/blog/'.$article->slug)->assertOk()->assertInertia(fn (Assert $page) => $page
            ->has('recommendedArticles', 0));
    }
}
