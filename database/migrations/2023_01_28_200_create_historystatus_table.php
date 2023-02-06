<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorystatusTable extends Migration {

    public function down() {
        Schema::dropIfExists('historystatus');
    }

    public function up() {
        Schema::create('historystatus', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique();
            
			$table->integer('people_id')->unsigned();
			$table->foreign('people_id')->references('id')->on('peoples')->onDelete('restrict');

			// $table->char('status', 1);
             
            $table->timestamps();
             
        });
    }
}
