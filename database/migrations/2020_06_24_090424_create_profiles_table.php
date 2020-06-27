<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('profile_firstname')->nullable();
            $table->string('profile_lastname')->nullable();
            $table->string('profile_company_name')->nullable();
            $table->string('profile_address')->nullable();
            $table->string('profile_address_number')->nullable();
            $table->string('profile_zipcode')->nullable();
            $table->string('profile_place')->nullable();
            $table->string('profile_country')->nullable();
            $table->string('profile_phone')->nullable();
            $table->string('avatar')->default('avatars/default-avatar.png');
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
        Schema::dropIfExists('profiles');
    }
}
