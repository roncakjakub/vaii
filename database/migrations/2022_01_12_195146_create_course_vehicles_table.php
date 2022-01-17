<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_vehicles', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('vehicle_id')->constrained('vehicles');
            $table->primary(['user_id', 'vehicle_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_vehicles');
    }
}
