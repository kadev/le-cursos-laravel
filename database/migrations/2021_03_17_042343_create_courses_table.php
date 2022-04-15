<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('key_name')->unique();
            $table->mediumText('short_description')->nullable();
            $table->text('description')->nullable();
            $table->integer('category_id')->nullable();
            $table->float('price')->nullable();
            $table->float('discount_price')->nullable();
            $table->boolean('is_free')->nullable();
            $table->boolean('has_a_discount')->nullable();
            $table->string('overview_provider')->nullable();
            $table->string('overview_url')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->mediumText('meta_description')->nullable();
            $table->boolean('featured')->nullable();
            $table->boolean('enabled')->default(1);
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->foreign('owner_id')->references('id')->on('users')
                ->onDelete('set null');
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
        //DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('courses');
        //DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    }
}
