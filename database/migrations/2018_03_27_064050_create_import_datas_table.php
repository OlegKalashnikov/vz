<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImportDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('smo_id')->unsigned();
            $table->integer('registry_id')->unsigned();
            $table->integer('code_lpu_vz')->unsigned();
            $table->integer('code_lpu_attachment')->unsigned()->nullable();
            $table->string('policy');
            $table->string('patient');
            $table->date('birthday');
            $table->date('data_direction');
            $table->string('code_lpu_direction');
            $table->string('code_service');
            $table->string('price');
            $table->string('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('import_datas');
    }
}
