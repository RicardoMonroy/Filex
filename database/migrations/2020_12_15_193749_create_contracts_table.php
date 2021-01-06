<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('file_path');

            // $table->string('signer_one_name'); // Tentativo a desaparecer
            // $table->string('signer_one_mail'); // Tentativo a desaparecer

            $table->string('signer_two_name');
            $table->string('signer_two_mail');

            $table->text('message')->nullable();

            $table->unsignedBigInteger('file_id');
            $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');

            $table->unsignedBigInteger('owner_id');
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('guest_id')->nullable();
            $table->foreign('guest_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('contracts');
    }
}
