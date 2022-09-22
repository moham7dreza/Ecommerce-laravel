<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_metas', function (Blueprint $table) {
            $table->id();
            $table->string('meta_key');
            $table->string('meta_value');
            $table->foreignId('system_category_id')->nullable()->constrained('system_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('system_type_id')->nullable()->constrained('system_types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('system_gen_id')->nullable()->constrained('system_cpus')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('system_config_id')->nullable()->constrained('system_configs')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('system_metas');
    }
}
