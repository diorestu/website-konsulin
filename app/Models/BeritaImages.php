<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaImages extends Model
{
    use HasFactory;
    protected $table        = "news_images";
    protected $primaryKey   = 'id';
}
