<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 20)->comment('名前');
            $table->string('color', 10)->comment('馬体の色');
            $table->string('father_name', 20)->comment('父');
            $table->string('mother_name', 20)->comment('母');
            $table->string('mothers_father_name', 20)->comment('母の父');
            $table->string('owner', 20)->comment('馬主');
            $table->string('trainer', 20)->comment('調教師');
            $table->string('producer', 20)->comment('生産者');
            $table->string('birthday', 20)->comment('生年月日');
            $table->string('winning')->comment('主な勝ち鞍');
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
        Schema::dropIfExists('horses');
    }
}
