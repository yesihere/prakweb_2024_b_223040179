<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
  use HasFactory, Sluggable;

  protected $fillable = [
    'title',
    'author_id',
    'category_id',
    'slug',
    'image',
    'body'
  ];

  protected $with = ['author', 'category'];

  public function author(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  public function category(): BelongsTo
  {
    return $this->belongsTo(Category::class);
  }

  public function scopeFilter($query, array $filters): void
  {
    $query->when($filters['search'] ?? false, fn($query, $search) => $query->where('title', 'like', '%' . $search . '%'));

    $query->when(
      $filters['category'] ?? false,
      fn($query, $category) => $query->whereHas('category', fn($query) => $query->where('slug', $category))
    );

    $query->when(
      $filters['author'] ?? false,
      fn($query, $author) => $query->whereHas('author', fn($query) => $query->where('username', $author))
    );
  }

  public function getRouteKeyName()
  {
    return 'slug';
  }

  public function sluggable(): array
  {
    return [
      'slug' => [
        'source' => 'title',
      ]
    ];
  }
}
