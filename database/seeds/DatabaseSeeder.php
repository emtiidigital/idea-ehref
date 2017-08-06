<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    const TABLES_TO_TRUNCATE = [
        'emtii_links',
        'emtii_link_details',
        'emtii_link_fqdn',
        'emtii_link_label',
        'emtii_labels'
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
