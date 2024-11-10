<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('cliente', function (Blueprint $table) {
            $table->timestamps();  // Adiciona as colunas 'created_at' e 'updated_at'
        });
    }
    
    public function down()
    {
        Schema::table('cliente', function (Blueprint $table) {
            $table->dropTimestamps();  // Remove as colunas 'created_at' e 'updated_at'
        });
    }
    
};