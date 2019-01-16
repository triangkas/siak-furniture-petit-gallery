<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJurnalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnals', function (Blueprint $table) {
            $table->increments('jurnalId');
            $table->date('jurnalTanggal');
            $table->string('jurnalRef');
            $table->string('jurnalKodeAkun');
            $table->string('jurnalNamaAkun');
            $table->text('jurnalKeterangan');
            $table->double('jurnalDebit', 10, 2);
            $table->double('jurnalKredit', 10, 2);
            $table->timestamp('jurnalCreated')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('jurnalUpdated')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurnals');
    }
}
