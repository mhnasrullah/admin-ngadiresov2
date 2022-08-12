<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edits', function (Blueprint $table) {
            $table->id();
            $table->string('jumbotron');
            $table->longText('tentangDesa');
            $table->string('imgTentangDesa');
            $table->string('imgKades');
            $table->longText('sambutanKades');
            $table->string('namaKades');
            $table->integer('jmlPria');
            $table->integer('jmlWanita');
            $table->integer('jmlPenduduk');
            $table->string('jmbtSejarah');
            $table->string('textSejarah');
            $table->string('jmbtKabar');
            $table->string('textKabar');
            $table->string('jmbtFaq');
            $table->string('textFaq');
            $table->string('jmbtWisata');
            $table->string('textWisata');
            $table->string('jmbtSurat');
            $table->string('textSurat');
            $table->longText('sejarahDesa');
            $table->longText('sejarahTirta');
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
        Schema::dropIfExists('edits');
    }
}
