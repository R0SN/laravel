<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('website_name');
            $table->string('slogan')->nullable();
            $table->string('logo');
            $table->string('favicon');
            $table->string('header_logo')->nullable();
            $table->text('about_website')->nullable();
            $table->text('about_beer')->nullable();
            $table->text('about_bread')->nullable();
            $table->text('food_description')->nullable();
            // $table->string('footer_logo')->nullable();
            // $table->bigInteger('phone_no');
            // $table->bigInteger('opt_phone_no')->nullable();
            // $table->bigInteger('mobile_no');
            // $table->string('email')->unique();
            // $table->string('opt_email')->unique()->nullable();
            // $table->text('address');
            $table->string('google_map_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('github_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('gmail_link')->nullable();
            // $table->string('facebook_link')->nullable();
            // $table->string('twitter_link')->nullable();
            // $table->string('instagram_link')->nullable();
            // $table->string('youtube_link')->nullable();
            $table->boolean('status')->default(0);
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->softDeletes('deleted_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
