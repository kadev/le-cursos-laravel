<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventRegistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_registration', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id')->nullable();
            $table->foreign('event_id')->references('id')->on('events')
                ->onDelete('cascade');
            $table->unsignedBigInteger('event_date_id')->nullable();
            $table->foreign('event_date_id')->references('id')->on('event_dates')
                ->onDelete('set null');
            $table->string('name');
            $table->integer('age')->nullable();
            $table->string('employment')->nullable();
            $table->string('email');
            $table->string('cellphone_number')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('event_registration');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
