<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emtii_links', function (Blueprint $table) {
            $table->increments('id'); // 1
            $table->timestamps(); // created_at, updated_at
        });

        Schema::create('emtii_link_details', function (Blueprint $table) {
            $table->increments('id'); // 1
            $table->integer('link_id'); // 1
            $table->string('name'); // Foobar
            $table->string('locale'); // de_DE
        });

        Schema::create('emtii_link_fqdn', function (Blueprint $table) {
            $table->increments('id'); // 1
            $table->integer('link_id'); // 1
            $table->string('protocol'); // https
            $table->string('third_level_label'); // www
            $table->string('second_level_label'); // foobar
            $table->string('top_level_domain'); // de
            $table->string('deeplink'); // /emtii
            $table->string('full_qualified_link'); // https://www.foobar.de/emtii
        });

        Schema::create('emtii_link_labels', function (Blueprint $table) {
            $table->increments('id'); // id
            $table->integer('link_id'); // id
            $table->integer('label_id'); //
        });

        Schema::create('emtii_labels', function (Blueprint $table) {
            $table->increments('id'); // 1
            $table->string('name'); // IT
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emtii_links');
        Schema::dropIfExists('emtii_link_details');
        Schema::dropIfExists('emtii_link_fqdn');
        Schema::dropIfExists('emtii_link_label');
        Schema::dropIfExists('emtii_labels');
    }
}
