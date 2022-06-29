<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('books', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('coach_id')->nullable();
            $table->unsignedBigInteger('client_id')->nullable();

            $table->date('day');
            $table->double('fees', 15, 2);
            $table->boolean('confirm')->default(0);
            $table->time('time');

            $table->foreign('coach_id')
                ->references('id')->on('coaches')
                ->onDelete('set null');

            $table->foreign('client_id')
                ->references('id')->on('clients')
                ->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('books');
    }
}
