<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration dans la base de données de la table photo_tag
 * 
 * @author Clara Vesval B2B Info <clara.vesval@ynov.com>
 * 
 */

class CreatePhotoTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_tag', function (Blueprint $table) {
            $table->id();
            $table -> foreignId('tag_id')->nullable()->constrained('tags')->onDelete('set null');
            $table -> foreignId('photo_id')->nullable()->constrained('photos')->onDelete('set null');
            $table->timestamps();
            $table -> unique(['tag_id','photo_id']);
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photo_tags');
    }
}
