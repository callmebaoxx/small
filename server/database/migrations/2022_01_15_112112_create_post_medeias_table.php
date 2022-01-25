<?php

use \App\Database\Migration\CustomBlueprint as Blueprint;

class CreatePostMedeiasTable extends \App\Database\Migration\Create
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_medeias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('source_url');
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
        Schema::dropIfExists('post_medeias');
    }
}
