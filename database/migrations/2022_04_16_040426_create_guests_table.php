<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained();
            $table->string('name');
            $table->date('date_birt');
            $table->enum('sex', ['']);
            $table->string('origin');
            $table->string('document_type');
            $table->string('document_path');
            $table->string('document_country');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('location');
            $table->string('zip');
            $table->string('observations');
            $table->foreignId('user_created_at')->nullable()->constrained('users');
            $table->foreignId('user_updated_at')->nullable()->constrained('users');
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
        Schema::dropIfExists('guests');
    }
}
