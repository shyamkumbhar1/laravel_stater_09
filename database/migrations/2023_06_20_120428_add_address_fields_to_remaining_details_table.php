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
        Schema::table('remaining_details', function (Blueprint $table) {
            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('remaining_details', function (Blueprint $table) {
            $table->dropColumn(['address_line1', 'address_line2', 'country', 'state', 'city', 'postal_code']);
        });
    }
};
// php artisan make:migration add_address_fields_to_users_table --table=users
