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
        Schema::create('links', function (Blueprint $table) {
            $table->increments('id'); // 1
            $table->timestamp('published_at')->useCurrent();
            $table->timestamps(); // created_at, updated_at
        });

        Schema::create('link_details', function (Blueprint $table) {
            $table->increments('id'); // 1
            $table->integer('link_id'); // 1
            $table->string('name'); // Foobar
            $table->string('locale'); // de_DE
        });

        Schema::create('link_fqdn', function (Blueprint $table) {
            $table->increments('id'); // 1
            $table->integer('link_id'); // 1
            $table->string('scheme'); // https
            $table->string('host'); // www
            $table->string('deeplink'); // /emtii
            $table->string('full_qualified_link'); // https://www.foobar.de/emtii
        });

        Schema::create('labels', function (Blueprint $table) {
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
        Schema::dropIfExists('links');
        Schema::dropIfExists('link_details');
        Schema::dropIfExists('link_fqdn');
        Schema::dropIfExists('labels');
    }
}
