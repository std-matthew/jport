<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('user_id')->unsigned()->index();

            $table->string('icon')->nullable();
            
            $table->string('favicon')->nullable();
            $table->string('favicon_url')->nullable();

            $table->string('og_image')->nullable();
            $table->string('og_image_url')->nullable();

            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();

            $table->integer('theme')->unsigned()->default(0);

            $table->string('color')->nullable();
            $table->string('color_depth')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
