<?php

namespace App\Models;

use Database\Factories\ArticleFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HtmlSanitizer\HtmlSanitizer;
use Symfony\Component\HtmlSanitizer\HtmlSanitizerConfig;

class Article extends Model
{
    /** @use HasFactory<ArticleFactory> */
    use HasFactory;

    protected $fillable = ['title', 'slug', 'excerpt', 'content', 'category', 'status', 'cover_alt', 'seo_title', 'seo_description'];

    protected $appends = ['cover_url'];

    protected function casts(): array
    {
        return ['published_at' => 'datetime'];
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published')->whereNotNull('published_at')->where('published_at', '<=', now());
    }

    public function getCoverUrlAttribute(): ?string
    {
        return $this->cover_path ? '/storage/'.$this->cover_path : null;
    }

    public static function sanitize(string $html): string
    {
        $config = (new HtmlSanitizerConfig)->withMaxInputLength(800000)->allowSafeElements()->allowElement('img', ['src', 'alt', 'title'])
            ->allowRelativeMedias()->allowRelativeLinks()->allowMediaSchemes(['http', 'https'])->allowLinkSchemes(['http', 'https', 'mailto']);

        return (new HtmlSanitizer($config))->sanitize($html);
    }
}
