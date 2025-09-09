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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar'); // Added name column
            $table->string('name_en'); // Added name column
            $table->text('review_ar'); // Added review column
            $table->text('review_en'); // Added review column
            $table->string('image')->nullable(); // Added image column
            $table->integer('rating')->default(5); // Added rating column with default value
            // email column can be added if needed
            $table->string('email')->nullable(); // Uncomment if email is needed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
