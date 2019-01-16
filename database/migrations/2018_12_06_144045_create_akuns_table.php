<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAkunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akuns', function (Blueprint $table) {
            $table->increments('akunId');
            $table->integer('akunParentId')->default(0);
            $table->string('akunKode')->unique();
            $table->string('akunNama');
            $table->enum('akunSaldoNormal', ['D', 'K']);
            $table->enum('akunSaldoBertambah', ['D', 'K']);
            $table->enum('akunSaldoBerkurang', ['D', 'K']);
            $table->timestamp('akunCreated')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('akunUpdated')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('akuns');
    }
}
