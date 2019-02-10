<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckupRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkup_records', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('ieFindings', 200);
            $table->string('bloodPressure', 200);
            $table->string('height', 200);
            $table->string('weight', 200);
            $table->string('heartTones', 200);
            $table->string('AOG', 200);
            $table->string('weightGain', 200);
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
        Schema::dropIfExists('checkup_records');
    }
}
