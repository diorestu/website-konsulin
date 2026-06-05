<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebpageImages extends Model
{
    use HasFactory;
    protected $table       = 'webpage_images';
    protected $primaryKey  = 'id';
}
