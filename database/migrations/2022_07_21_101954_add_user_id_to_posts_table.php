<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<<< HEAD:database/migrations/2022_07_21_101954_add_user_id_to_posts_table.php
        Schema::table('posts', function (Blueprint $table) {
            $table->foreignId('user_id')->after('id');;
========
        Schema::table('users', function (Blueprint $table) {
            $table->string('featured_image')->after('about')->nullable();
            $table->string('mobile')->after('featured_image')->nullable();
>>>>>>>> 7343cb739bc2e6e65e3ac795e7fc2c56a73e3320:database/migrations/2022_07_22_140318_add_new_fields_to_users_table.php
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
<<<<<<<< HEAD:database/migrations/2022_07_21_101954_add_user_id_to_posts_table.php
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('user_id');
========
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('featured_image');
            $table->dropColumn('mobile');
>>>>>>>> 7343cb739bc2e6e65e3ac795e7fc2c56a73e3320:database/migrations/2022_07_22_140318_add_new_fields_to_users_table.php
        });
    }
};
