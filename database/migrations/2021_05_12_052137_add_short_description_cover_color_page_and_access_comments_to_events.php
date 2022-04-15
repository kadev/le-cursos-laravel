<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShortDescriptionCoverColorPageAndAccessCommentsToEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->mediumText('short_description')->nullable();
            $table->string('page_cover')->nullable();
            $table->string('page_main_color')->nullable();
            $table->mediumText('access_comments')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('short_description');
            $table->dropColumn('page_cover');
            $table->dropColumn('page_main_color');
            $table->dropColumn('access_comments');
        });
    }
}
