<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableUsersAddCollumnsFacebookGithubGoogle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users',function(Blueprint $table){
            $table->String('facebook',255)->nullable()->after('email');
            $table->String('github',255)->nullable()->after('email');
            $table->String('google',255)->nullable()->after('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users',function(Blueprint $table){
            $table->dropCollumn('facebook');
            $table->dropCollumn('github');
            $table->dropCollumn('google');
        });
    }
}
