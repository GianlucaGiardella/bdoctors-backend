<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('address',255)->nullable(false);
            $table->string('curriculum',255)->nullable();
            $table->string('photo',255)->nullable();
            $table->string('phone',20)->nullable();
            $table->Text('services')->nullable();
            $table->boolean('visible')->nullable()->unsigned();
            




            
        });
    }


    public function down()
    {
        Schema::dropIfExists('profiles');
    }
};