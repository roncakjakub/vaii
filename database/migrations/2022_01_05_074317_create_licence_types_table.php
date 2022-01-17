<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenceTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licence_types', function (Blueprint $table) {
//            $table->id();
            $table->string('code', 20)->primary();
            $table->string('short_desc_1')->nullable();
            $table->string('short_desc_2')->nullable();
            $table->string('short_desc_3')->nullable();
            $table->unsignedDouble('price');
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
        Schema::dropIfExists('licence_types');
    }
}
