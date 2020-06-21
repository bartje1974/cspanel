<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFtpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ftps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('domain_id');
            $table->foreignId('website_id');
            $table->string('ftp_username');
            $table->string('ftp_password');
            $table->boolean('ftp_status');
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
        Schema::dropIfExists('ftps');
    }
}
