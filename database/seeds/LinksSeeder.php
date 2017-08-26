<?php

use Illuminate\Database\Seeder;

class LinksSeeder extends Seeder
{
    const MAX_TO_CREATE = 1000;

    /**
     * Run the database seeds with foreign key relations.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Entities\Link::class, self::MAX_TO_CREATE)
            ->create()
            ->each(
                function ($link) {
                    factory(App\Entities\LinkDetails::class)->create([ 'link_id' => $link->id]);
                    factory(App\Entities\LinkFqdn::class)->create([ 'link_id' => $link->id]);
                }
            );
    }
}
