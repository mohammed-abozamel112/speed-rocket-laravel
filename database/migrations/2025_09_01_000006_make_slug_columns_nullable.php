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
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('slug_ar')->nullable()->change();
            $table->string('slug_en')->nullable()->change();
        });
        Schema::table('categories', function (Blueprint $table) {
            $table->string('slug_ar')->nullable()->change();
            $table->string('slug_en')->nullable()->change();
        });
        Schema::table('services', function (Blueprint $table) {
            $table->string('slug_ar')->nullable()->change();
            $table->string('slug_en')->nullable()->change();
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->string('slug_ar')->nullable()->change();
            $table->string('slug_en')->nullable()->change();
        });
        Schema::table('tags', function (Blueprint $table) {
            $table->string('slug_ar')->nullable()->change();
            $table->string('slug_en')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('slug_ar')->nullable(false)->change();
            $table->string('slug_en')->nullable(false)->change();
        });
        Schema::table('categories', function (Blueprint $table) {
            $table->string('slug_ar')->nullable(false)->change();
            $table->string('slug_en')->nullable(false)->change();
        });
        Schema::table('services', function (Blueprint $table) {
            $table->string('slug_ar')->nullable(false)->change();
            $table->string('slug_en')->nullable(false)->change();
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->string('slug_ar')->nullable(false)->change();
            $table->string('slug_en')->nullable(false)->change();
        });
        Schema::table('tags', function (Blueprint $table) {
            $table->string('slug_ar')->nullable(false)->change();
            $table->string('slug_en')->nullable(false)->change();
        });
    }
};
