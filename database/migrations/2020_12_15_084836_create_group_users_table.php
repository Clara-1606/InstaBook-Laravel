<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration dans la base de données de la table group_user
 * 
 * @author Clara Vesval B2B Info <clara.vesval@ynov.com>
 * 
 */

class CreateGroupUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_user', function (Blueprint $table) {
            $table->id();
            $table -> foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table -> foreignId('group_id')->nullable()->constrained('groups')->onDelete('set null');
            $table -> unique(['user_id','group_id']);
            $table->timestamps();
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
        Schema::dropIfExists('group_users');
    }
}
