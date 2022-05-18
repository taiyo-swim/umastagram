<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnSexAndBelongAndTotalResultAndNtekeibaURLToHorsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('horses', function (Blueprint $table) {
            $table->string('sex', 10)->after('name');
            $table->string('belong', 10)->after('owner');
            $table->string('total_result', 20)->after('winning');
            $table->string('netkeiba_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('horses', function (Blueprint $table) {
            //
        });
    }
}
