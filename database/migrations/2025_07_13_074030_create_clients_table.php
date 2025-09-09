<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            // name for ar and en
            $table->string('name_ar')->nullable();
            $table->string('name_en')->nullable();
            // description for ar and en
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
            // image for the client
            $table->string('image')->nullable();
            // status of the client
            $table->boolean('status')->default(true);
            // category of the client ar and en
            $table->string('category_ar')->nullable();
            $table->string('category_en')->nullable();
            // timestamps for created_at and updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
