<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Inertia\Testing\AssertableInertia as Assert;

class PostsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function test_can_view_posts()
    {
        $this->get('/posts')
            ->assertInertia(fn (Assert $assert) => $assert
                ->component('Posts/Index')
                ->has('posts.data', 5)
                ->has('posts.data.0', fn (Assert $assert) => $assert
                // ->dd()
                    ->where("id", 1)
                    ->where("title", "Velit consequatur nesciunt magni rem consequatur ipsa eum.")
                    ->where("excerpt", "Esse ea aut fugit iure asperiores quos. Itaque dolores nihil voluptatem recusandae nam adipisci sunt.")
                    ->where("slug", "nostrum-ut-ut-omnis-aperiam")
                    ->where("body", "Nihil tempora ipsa quae qui. Iste sint cupiditate aperiam quis soluta quas. Veniam eius voluptas sed consequatur odio quas quibusdam et. Praesentium quas recusandae quisquam id blanditiis unde consequuntur.")
                    ->where("deleted_at", null)
                    ->where("thumbnail", null)
                    ->where("published_at", null)
                        // ->has("categories", 2)
                        // ->has("categories.0", fn (Assert $assert) => $assert
                        //     ->where("id", 1)
                        //     ->where("name", "eum")
                        // )
                        // ->has("categories.1", fn(Assert $assert) => $assert
                        //     ->where("id", 2)
                        //     ->where("name", "voluptates")    
                        // )
                )
                //     
                //     ->has('categories', 2)
                //     ->has('categories.0', fn (Assert $assert) => $assert
                //     ->where('id', 1)
                //     ->where('name', 'eum')
                //     ), 
                // )
                // ->has('posts.data.1', fn (Assert $assert) => $assert
                //     ->where('id', 2)
                //     ->where('title', 'necessitatibus-molestiae-dolor-architecto-voluptatem-quia-in')
                //     ->where('excerpt', 'Odio optio omnis laudantium maiores eos qui. Sit atque in magnam quibusdam aspernatur facere. Mollitia dolores eum dolores sit perspiciatis.')
                //     ->where('slug', 'necessitatibus-molestiae-dolor-architecto-voluptatem-quia-in')
                //     ->where('body', 'Aspernatur deserunt quia et blanditiis quia consequuntur. Illo iusto explicabo reiciendis. Alias laudantium suscipit nemo blanditiis perferendis exercitationem. Beatae natus omnis quae aut. Tempora quibusdam eos aut. Possimus nostrum impedit recusandae neque. Quo quasi nihil voluptate laboriosam delectus.')
                //     ->where('deleted_at', null)
                //     ->has('categories', 2)
                //     ->has('categories.1', fn (Assert $assert) => $assert
                //     ->where('id', 3)
                //     ->where('name', 'est')
                //     )
                // )
            );
    }

    // public function test_can_search_for_posts()
    // {
    //     $this->actingAs($this->user)
    //         ->get('/posts?search=test%20title')
    //         ->assertInertia(fn (Assert $assert) => $assert
    //             ->component('Posts/Index')
    //             ->where('filters.search', 'test title')
    //             ->has('posts.data', 1)
    //             ->has('posts.data.0', fn (Assert $assert) => $assert
    //                 ->where('id', 1)
    //                 ->where('title', 'test title')
    //                 ->where('excerpt', 'test excerpt')
    //                 ->where('slug', 'test-post')
    //                 ->where('body', 'test body')
    //                 ->where('deleted_at', null)
    //                 // ->has('categories', fn (Assert $assert) => $assert
    //                 //     ->where('name', ['test1', 'test2'])
    //                 // )
    //             )
    //         );
    // }
}
