<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColsToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->text('author')->nullable()->after('description');
            $table->text('address')->nullable()->after('icon');
            $table->text('mobile')->nullable()->after('address');
            $table->text('email')->nullable()->after('mobile');
            $table->text('postal_code')->nullable()->after('email');
            $table->text('social_media')->nullable()->after('postal_code');
            $table->text('bank_account')->nullable()->after('social_media');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn(['address', 'mobile', 'email', 'postal_code', 'social_media', 'bank_account', 'author']);
        });
    }
}
