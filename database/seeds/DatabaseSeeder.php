<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
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
        $tablesToTruncate = [
            'emtii_links',
            'emtii_links_details',
            'emtii_links_details_fqdn',
            'emtii_links_labels',
            'emtii_labels'
        ];

        foreach ($tablesToTruncate as $tableToTruncate) {
            DB::table($tableToTruncate)->truncate();
        }
    }
}
