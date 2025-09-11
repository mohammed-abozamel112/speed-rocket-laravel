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
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            // name for ar and en
            $table->string('name_ar')->nullable();
            $table->string('name_en')->nullable();
            // description for ar and en
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
            //image of tag
            $table->string('image')->nullable();
            // foreign ID key for services and blogs
            $table->foreignId('service_id')->nullable()->constrained('services')->onDelete('cascade');
            $table->foreignId('blog_id')->nullable()->constrained('blogs')->onDelete('cascade');
            // timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};
