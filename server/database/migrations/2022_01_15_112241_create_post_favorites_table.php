<?php

use \App\Database\Migration\CustomBlueprint as Blueprint;

class CreatePostFavoritesTable extends \App\Database\Migration\Create
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_favorites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('post_id');
            $table->actionBy();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_favorites');
    }
}
