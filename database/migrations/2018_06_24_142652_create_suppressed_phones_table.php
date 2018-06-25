<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppressedPhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppressed_phones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('trunk_code', 1);
            $table->string('phone', 30);
            $table->boolean('sms')->default(1);
            $table->boolean('voicemail')->default(1);
            $table->timestamps();

            $table->unique('phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppressed_phones');
    }
}
