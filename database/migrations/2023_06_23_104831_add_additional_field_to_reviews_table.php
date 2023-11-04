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
        Schema::table('reviews', function (Blueprint $table) {
            $table->string('name')->nullable()->after('comment');
            $table->string('contact')->nullable()->after('comment');
            $table->string('email')->nullable()->after('comment');
            $table->string('patient_ip_address')->nullable()->after('comment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('contact');
            $table->dropColumn('email');
            $table->dropColumn('patient_ip_address');
        });
    }
};
