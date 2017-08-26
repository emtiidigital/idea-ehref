<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    const TABLES_TO_TRUNCATE = [
        'links',
        'link_details',
        'link_fqdn',
        'labels',
        'newsfeeds'
    ];

    /**
     * Run the database seeds.
     * Need to run Labels Seeder first as Links Seeder
     * relates on already existing labels.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTablesBeforeSeeding();

        $this->call(LabelsSeeder::class);
        $this->call(LinksSeeder::class);
        $this->call(NewsFeedSeeder::class);
    }

    /**
     * Truncate all tables before
     * they get seeded by model factories.
     */
    private function truncateTablesBeforeSeeding()
    {
        foreach (self::TABLES_TO_TRUNCATE as $tableToTruncate) {
            DB::table($tableToTruncate)->truncate();
        }
    }
}
