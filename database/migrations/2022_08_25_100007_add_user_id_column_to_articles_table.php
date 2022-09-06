<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            //$table->foreignId('user_id')->after('id');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropForeign('user_id');
            $table->dropColumn('user_id');
        });
    }
};
