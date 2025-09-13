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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            // name for ar and en
            $table->string('name_ar');
            $table->string('name_en');
            // short_description for ar and en
            $table->text('short_description_ar');
            $table->text('short_description_en');
            // 3 sub_titles for ar and en
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
            // image for the service
            $table->string('image')->nullable();
            // status of the service
            $table->boolean('status')->default(true);
            // price of service
            /* $table->decimal('price', 10, 2); */
            // timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
