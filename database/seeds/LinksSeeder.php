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
        factory(App\Models\LinksModel::class, self::MAX_TO_CREATE)
            ->create()
            ->each(
                function ($link) {
                    factory(App\Models\LinksDetailsModel::class)->create(['link_id' => $link->id]);
                    factory(App\Models\LinksDetailsFqdnModel::class)->create(['link_id' => $link->id]);
                    factory(App\Models\LinksLabelsModel::class)->create(['link_id' => $link->id]);
                }
            );
    }
}
