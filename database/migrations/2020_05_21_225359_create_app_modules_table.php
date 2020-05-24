<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_modules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_app');
            $table->unsignedBigInteger('id_module');

            $table->foreign('id_app')->references('id')->on('applications')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_module')->references('id')->on('modules')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('app_modules');
    }
}
