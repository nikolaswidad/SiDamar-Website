<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Event;
use App\Models\EventCategory;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Event::factory(10)->create();

        EventCategory::create([
            'name' => 'Event'
        ]);
        EventCategory::create([
            'name' => 'Production'
        ]);
        EventCategory::create([
            'name' => 'Donation'
        ]);

    // User seeder start
        User  ::create([
            'name' => 'Sidamar',
            // 'username' => 'sidamar',
            'email' => 'sidamar@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::factory(3)->create();
    // User seeder end

    // Author seeder start
        PostCategory::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);
        PostCategory::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);
        PostCategory::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::create([
            'title' => 'Judul Pertama',
            'slug' => 'judul-pertama',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem earum, fugiat..',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem earum, fugiat ipsa cupiditate fuga esse quidem perferendis labore minima libero suscipit consequuntur laudantium quo nobis, aliquam rem odit, iure quas! Omnis vel modi ex, eius nobis possimus quos, illum veritatis impedit velit dolor in nisi voluptates ratione unde tempora consectetur facilis praesentium, explicabo iure quo nesciunt! Fugit nemo, autem, corrupti pariatur reiciendis possimus, perferendis corporis voluptas delectus laboriosam facilis consequatur minus cupiditate in omnis. Recusandae officiis ut veniam sit animi quis consequuntur suscipit dolor ab laboriosam consectetur aut similique sapiente, velit labore odio iure saepe aperiam. Placeat numquam voluptatibus aut!',
            'category_id' => 1,
            // 'user_id' => 1
        ]);

        Post::create([
            'title' => 'Judul Kedua',
            'slug' => 'judul-kedua',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem earum, fugiat..',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem earum, fugiat ipsa cupiditate fuga esse quidem perferendis labore minima libero suscipit consequuntur laudantium quo nobis, aliquam rem odit, iure quas! Omnis vel modi ex, eius nobis possimus quos, illum veritatis impedit velit dolor in nisi voluptates ratione unde tempora consectetur facilis praesentium, explicabo iure quo nesciunt! Fugit nemo, autem, corrupti pariatur reiciendis possimus, perferendis corporis voluptas delectus laboriosam facilis consequatur minus cupiditate in omnis. Recusandae officiis ut veniam sit animi quis consequuntur suscipit dolor ab laboriosam consectetur aut similique sapiente, velit labore odio iure saepe aperiam. Placeat numquam voluptatibus aut!',
            'category_id' => 1,
            // 'user_id' => 1
        ]);

        Post::create([
            'title' => 'Judul Ketiga',
            'slug' => 'judul-ketiga',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem earum, fugiat..',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem earum, fugiat ipsa cupiditate fuga esse quidem perferendis labore minima libero suscipit consequuntur laudantium quo nobis, aliquam rem odit, iure quas! Omnis vel modi ex, eius nobis possimus quos, illum veritatis impedit velit dolor in nisi voluptates ratione unde tempora consectetur facilis praesentium, explicabo iure quo nesciunt! Fugit nemo, autem, corrupti pariatur reiciendis possimus, perferendis corporis voluptas delectus laboriosam facilis consequatur minus cupiditate in omnis. Recusandae officiis ut veniam sit animi quis consequuntur suscipit dolor ab laboriosam consectetur aut similique sapiente, velit labore odio iure saepe aperiam. Placeat numquam voluptatibus aut!',
            'category_id' => 2,
            // 'user_id' => 1
        ]);

        Post::create([
            'title' => 'Judul Keempat',
            'slug' => 'judul-keempat',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem earum, fugiat..',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem earum, fugiat ipsa cupiditate fuga esse quidem perferendis labore minima libero suscipit consequuntur laudantium quo nobis, aliquam rem odit, iure quas! Omnis vel modi ex, eius nobis possimus quos, illum veritatis impedit velit dolor in nisi voluptates ratione unde tempora consectetur facilis praesentium, explicabo iure quo nesciunt! Fugit nemo, autem, corrupti pariatur reiciendis possimus, perferendis corporis voluptas delectus laboriosam facilis consequatur minus cupiditate in omnis. Recusandae officiis ut veniam sit animi quis consequuntur suscipit dolor ab laboriosam consectetur aut similique sapiente, velit labore odio iure saepe aperiam. Placeat numquam voluptatibus aut!',
            'category_id' => 2,
            // 'user_id' => 2
        ]);

    // Author seeder end

    }
}
