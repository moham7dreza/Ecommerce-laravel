<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReadtimeToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->tinyInteger('time_to_read')->default(0)->after('status');
            $table->integer('view_count')->default(0)->after('time_to_read');
            $table->integer('comment_count')->default(0)->after('view_count');
            $table->integer('like_count')->default(0)->after('comment_count');
            $table->double('rating')->default(0)->after('like_count');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['time_to_read', 'view_count', 'comment_count', 'like_count', 'rating']);
        });
    }
}
