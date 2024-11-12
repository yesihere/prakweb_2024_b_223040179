<?php

namespace Database\Seeders;

use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    // User::factory(10)->create();

    // User::factory()->create([
    //     'name' => 'Test User',
    //     'email' => 'test@example.com',
    // ]);

    // Category::create([
    //   'name' => 'Web Design',
    //   'slug' => 'web-design'
    // ]);

    // Post::create([
    //   'title' => 'Judul Artikel 1',
    //   'author_id' => 1,
    //   'category_id' => 1,
    //   'slug' => 'judul-artikel-1',
    //   'body' => 'testing artikel'
    // ]);

    $this->call([CategorySeeder::class, UserSeeder::class]);

    Post::factory(300)->recycle([
      Category::all(),
      User::all()
    ])->create();
  }
}
