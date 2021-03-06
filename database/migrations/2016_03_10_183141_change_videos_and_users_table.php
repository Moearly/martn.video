<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeVideosAndUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // videos
        DB::statement("ALTER TABLE learner.videos change column resource_id resource_id varchar(26)");

        // users
        DB::statement("ALTER TABLE learner.users ADD nickname VARCHAR(255) NULL AFTER email");
        DB::statement("ALTER TABLE learner.users MODIFY password VARCHAR(60)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // videos
        DB::statement("ALTER TABLE videos change column resource_id resource_id int");

        // users
        DB::statement("ALTER TABLE learner.users DROP nicknam");
        DB::statement("ALTER TABLE learner.users MODIFY password VARCHAR(60) NOT NULL");
    }
}
