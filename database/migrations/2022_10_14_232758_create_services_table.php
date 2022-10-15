<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('route_code')->nullable()->unique();
            $table->text('description');
            $table->string('slug')->unique()->nullable();
            $table->text('image')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->text('tags');
            $table->tinyInteger('service_availability')->default(1)->comment('1 => service available now, 0 => service not available');
            $table->decimal('price', 20, 3)->nullable();
            $table->integer('warranty_time')->nullable()->default(0);
            $table->timestamp('available_date')->nullable();
            $table->integer('service_done_count')->nullable()->default(0)->comment('ex : number of devices repaired');
            $table->text('personnel')->nullable()->comment('staff names can gave this service');
            $table->tinyInteger('time_to_give_service')->default(0);
            $table->decimal('customer_satisfaction')->default(0);
            $table->foreignId('parent_id')->nullable()->constrained('services')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('category_id')->nullable()->constrained('product_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('brand_id')->nullable()->constrained('brands')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('services');
    }
}
