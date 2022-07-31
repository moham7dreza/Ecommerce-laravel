<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('user_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('system_id')->constrained('systems')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('product_id')->nullable()->constrained('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('color_id')->nullable()->constrained('product_colors')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('guarantee_id')->nullable()->constrained('guarantees')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('number')->default(1);
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
        Schema::dropIfExists('system_items');
    }
}
