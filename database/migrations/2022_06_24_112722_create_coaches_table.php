<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoachesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('coaches', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_ar')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('mobile')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->integer('session_time')->nullable();
            $table->string('address_en')->nullable();
            $table->string('address_ar')->nullable();
            $table->unsignedBigInteger('fees')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('specialist_id')->nullable();
            $table->foreign('specialist_id')
                ->references('id')
                ->on('specialists');
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')
                ->references('id')
                ->on('countries');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')
                ->references('id')
                ->on('cities');
            $table->unsignedBigInteger('district_id')->nullable();
            $table->foreign('district_id')
                ->references('id')
                ->on('districts');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('coaches');
    }
}
