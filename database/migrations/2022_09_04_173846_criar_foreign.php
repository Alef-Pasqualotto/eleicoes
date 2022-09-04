<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('votantes', function (Blueprint $table) {            
            $table->foreignId('eleitor_id')->constrained('eleitores')->onDelete('cascade');
            $table->foreignId('periodo_id')->constrained('periodos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::table('votantes', function (Blueprint $table) {            
            $table->dropForeign(['periodo_id']);
            $table->dropForeign(['eleitor_id']);

            $table->dropColumn('periodo_id');
            $table->dropColumn('eleitor_id');
        });
    }
};
