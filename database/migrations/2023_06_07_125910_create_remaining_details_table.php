<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remaining_details', function (Blueprint $table) {
            $table->id();
            $table->string('phone_number')->nullable();
            $table->string('professional_license_number')->nullable();
            $table->string('state_of_licensure')->nullable();
            $table->text('areas_of_expertise')->nullable();
            $table->text('bio')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('work_address')->nullable();
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
        Schema::dropIfExists('remaining_details');
    }
};
