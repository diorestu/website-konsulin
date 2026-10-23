<?php

namespace App\Models;

use Database\Factories\ServiceFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /** @use HasFactory<ServiceFactory> */
    use HasFactory;

    protected $fillable = ['slug', 'name', 'summary', 'description', 'scope', 'preparation', 'sort_order', 'is_active', 'seo_title', 'seo_description', 'related_services'];

    protected function casts(): array
    {
        return ['scope' => 'array', 'preparation' => 'array', 'related_services' => 'array', 'is_active' => 'boolean', 'sort_order' => 'integer'];
    }
}
