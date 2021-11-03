<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppPositionsTable extends Migration
{
    public function up()
    {
        Schema::connection('pgsql-app')->create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->json('functions')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::connection('pgsql-app')->dropIfExists('positions');
    }
}
