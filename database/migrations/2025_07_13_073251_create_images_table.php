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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            // name ar and en
            $table->string('name_ar')->nullable();
            $table->string('name_en')->nullable();
            $table->string('image')->nullable();
            // alt text and caption ar and en
            $table->string('alt_text_ar')->nullable();
            $table->string('alt_text_en')->nullable();
            // short description ar and en
            $table->string('short_description_ar')->nullable();
            $table->string('short_description_en')->nullable();
            // caption ar and en
            $table->text('caption_ar')->nullable();
            $table->text('caption_en')->nullable();
            // type of the image (e.g., blog, service, etc.)
            $table->enum('type_ar', ['مدونه', 'خدمة', 'معرض', 'ملف شخصي', 'عميل', 'أعمال', 'الرئيسية', 'حول'])
                ->default('أعمال');
            $table->enum('type_en', ['blog', 'service', 'gallery', 'profile', 'client', 'works', 'home', 'about'])
                ->default('works');
            // foreign key for services
            $table->foreignId('service_id')->nullable()->constrained('services')->onDelete('cascade');
            // foreign key for blog
            $table->foreignId('blog_id')->nullable()->constrained('blogs')->onDelete('cascade');
            //tags foreign key
            $table->foreignId('tag_id')->nullable()->constrained('tags')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
