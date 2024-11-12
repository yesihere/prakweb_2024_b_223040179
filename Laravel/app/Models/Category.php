<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
  /** @use HasFactory<\Database\Factories\CategoryFactory> */
  use HasFactory, Sluggable;

  protected $fillable = [
    'name',
    'slug',
    'color'
  ];

  public function posts(): HasMany
  {
    return $this->hasMany(Post::class);
  }

  public function getRouteKeyName()
  {
    return 'slug';
  }

  public function sluggable(): array
  {
    return [
      'slug' => [
        'source' => 'category',
      ]
    ];
  }
}
