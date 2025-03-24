<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('systems', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->text('tags')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->decimal('system_price', 20, 3)->default(0);
            $table->string('system_user_type')->nullable();
            $table->tinyInteger('system_marketable')->default(1)->comment('1 => marketable, 0 => is not marketable');
            $table->foreignId('system_category_id')->nullable()->constrained('system_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('system_type_id')->nullable()->constrained('system_types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('system_gen_id')->nullable();
//                ->constrained('system_cpus')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('system_config_id')->nullable()->constrained('system_configs')->onUpdate('cascade')->onDelete('cascade');
            $table->tinyInteger('system_sold_number')->default(0);
            $table->tinyInteger('system_frozen_number')->default(0);
            $table->tinyInteger('system_marketable_number')->default(0);
            $table->tinyInteger('system_view_number')->default(0);
            $table->tinyInteger('system_rating')->default(5);
            $table->timestamp('published_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('systems');
    }
}
