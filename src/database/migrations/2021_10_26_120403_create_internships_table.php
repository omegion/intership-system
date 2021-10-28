<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internships', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->integer('education_year');
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('company_id')->nullable()->references('id')->on('companies')->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('country_id')->nullable()->references('id')->on('countries')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('city_id')->nullable()->references('id')->on('cities')->cascadeOnUpdate()->nullOnDelete();
            $table->timestamp('verified_at')->nullable();
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('ends_at')->nullable();
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
        Schema::dropIfExists('internships');
    }
}
