<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime:Y-m-d',
        ];
    }
}
