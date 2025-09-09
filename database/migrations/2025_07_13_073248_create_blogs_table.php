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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            // title for ar and en
            $table->string('title_ar');
            $table->string('title_en');
            // short description for ar and en
            $table->text('short_description_ar')->nullable();
            $table->text('short_description_en')->nullable();
            //3 sub_titles for ar and en
            $table->string('sub_title1_ar')->nullable();
            $table->string('sub_title1_en')->nullable();
            $table->string('sub_title2_ar')->nullable();
            $table->string('sub_title2_en')->nullable();
            $table->string('sub_title3_ar')->nullable();
            $table->string('sub_title3_en')->nullable();
            // 3 descriptions for ar and en
            $table->text('description1_ar')->nullable();
            $table->text('description1_en')->nullable();
            $table->text('description2_ar')->nullable();
            $table->text('description2_en')->nullable();
            $table->text('description3_ar')->nullable();
            $table->text('description3_en')->nullable();
            // image for the blog
            $table->string('image')->nullable();
            // status of the blog
            $table->enum('status', ['draft', 'published'])->default('draft');
            // author of the blog
            $table->foreignId('user_id')->default(1)->nullable()->constrained('users')->onDelete('cascade');
            // timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
