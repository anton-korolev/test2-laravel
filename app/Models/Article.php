<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Article extends Model
{
    use HasFactory;

    /* *
     * The attributes that are mass assignable.xdfgdfgdf
     *
     * @v ar array<int, string>
     */
    /**
     *
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

    protected static function getHash(string $value): string
    {
        return \hash('sha256', $value);
    }

    /**
     * Sets the `url_hash` for the given `url`.
     */
    protected function url(): Attribute
    {
        return Attribute::make(
            set: fn (string $url) => [
                'url' => $url,
                'url_hash' => $this->getHash($url),
            ],
        );
    }

    // /**
    //  * {@inheritdoc}
    //  */
    // public function save(array $options = [])
    // {
    // }

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

    /**
     * Find the article by its id or throw an exception.
     *
     * @param string $id article id.
     *
     * @return static instance of the Article model.
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException<static>
     */
    public static function findByURL(string $url): static|null
    {
        return Article::query()
            ->where('url_hash', '=', static::getHash($url))
            ->first();
    }
}
