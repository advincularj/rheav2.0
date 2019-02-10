<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryIdToMaternalGuides extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('maternal_guides', function (Blueprint $table) {
            $table->integer('category_id')->nullable()->after('cover_image')->unsigned();

//            $table->foreign('category_id')->refernces('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('maternal_guides', function (Blueprint $table) {
            $table->dropColumn('category_id');
        });
    }
}
