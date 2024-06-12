<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'url',
        'title',
        'content',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'url_hash',
        'created_at',
        'updated_at',
    ];

    /**
     * Find the article by its id or throw an exception.
     *
     * @param string $id article id.
     *
     * @return static instance of the Article model.
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException<static>
     */
    public static function findOrFail(string $id): static
    {
        return Article::query()->findOrFail($id);
    }
}
