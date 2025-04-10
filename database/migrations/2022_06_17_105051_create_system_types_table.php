<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('brief');
            $table->text('description');
            $table->string('slug')->unique()->nullable();
            $table->text('image')->nullable();
            $table->decimal('start_price_from', 20, 3);
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('type')->default(0);
            $table->tinyInteger('show_in_menu')->default(0);
            $table->foreignId('system_category_id')->constrained('system_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->text('tags');
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
        Schema::dropIfExists('system_types');
    }
}
