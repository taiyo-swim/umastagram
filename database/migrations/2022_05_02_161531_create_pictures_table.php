<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pictures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image_path')->nullable()->comment('画像ファイルのパス');
            $table->string('comment')->nullable()->comment('コメント');
            $table->unsignedBigInteger('user_id')->comment('ユーザーID');
            $table->unsignedBigInteger('horse_id')->comment('ホースID');
            $table->timestamps();
            
            // 外部キー制約
            $table->foreign("user_id")->references("id")->on("users")->onDelete('cascade');
            $table->foreign("horse_id")->references("id")->on("horses")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pictures');
    }
}
