<?php

use Illuminate\Database\Seeder;

class NewsFeedSeeder extends Seeder
{
    const MAX_TO_CREATE = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Entities\NewsFeed::class, self::MAX_TO_CREATE)->create();
    }
}
