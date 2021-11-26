<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string("resourcable_type")->nullable();
            $table->unsignedBigInteger("resourcable_id")->nullable();
            $table->index(["resourcable_type", "resourcable_id"], 'resources_resourcable_type_resourcable_id_index');
            $table->string('url');
            $table->string('minified_url')->nullable();
            $table->string('alt');
            $table->string('type');
            $table->integer('position')->nullable();
            $table->boolean('is_main')->default(0);
            $table->foreignId('created_by')->constrained('users');
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
        Schema::dropIfExists('resources');
    }
}
