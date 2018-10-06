<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('first_name');
            $table->string('last_name');

            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
                        
            $table->timestamp('email_verified_at')->nullable();
            
            $table->text('avatar_url')->nullable();
            $table->string('avatar_path')->nullable();
            $table->text('background_url')->nullable();
            $table->string('background_path')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
