<?php

use Illuminate\Database\Seeder;

class LabelsSeeder extends Seeder
{
    const MAX_TO_CREATE = 100;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\LabelsModel::class, self::MAX_TO_CREATE)->create();
    }
}
