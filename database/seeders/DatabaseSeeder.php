<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Event;
use App\Models\News;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
          $user = User::factory()->create([
              'last_name' => 'John',
              'first_name' => 'Doe',
              'email' => 'john@example.com',
              'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
          ]);

          Post::factory(5)->hasAttached(Category::factory()->count(2))->create([
              'user_id' => $user->id,
          ]);

          Event::factory(3)->create();

          News::factory(3)->create();
    }
}
