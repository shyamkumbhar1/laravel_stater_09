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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->integer('position');
            $table->string('name', 191)->index();
            $table->string('slug', 191)->unique();
            $table->string('image', 191)->nullable();
            $table->text('description')->nullable();
            $table->boolean('status')->default(1);
            $table->text('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('url_path', 255)->nullable()->comment('Maintained by database triggers');
            $table->foreignId('parent_id')->index()->nullable()->constrained('categories')->onDelete('cascade');
            $table->index(['status', 'url_path']);
            $table->index(['position', 'status']);
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
        Schema::dropIfExists('categories');
    }
};
