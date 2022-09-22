<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('brief')->nullable();
            $table->text('image')->nullable();
            $table->text('url')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('show_in_menu')->default(0);
            $table->foreignId('parent_id')->nullable()->constrained('system_menus');
            $table->decimal('price', 20, 3)->default(0);
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
        Schema::dropIfExists('system_menus');
    }
}
