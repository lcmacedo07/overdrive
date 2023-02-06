<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeoplesTable extends Migration {

    public function down() {
        Schema::dropIfExists('peoples');
    }

    public function up() {
        Schema::create('peoples', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique();
            
			$table->string('name', 120);
			$table->string('document', 14)->unique();
			$table->string('phone')->unique();
			$table->char('status', 1)->default('P');
			$table->string('user', 120)->unique();
             
            $table->timestamps();
			$table->softDeletes();
             
        });
    }
}
