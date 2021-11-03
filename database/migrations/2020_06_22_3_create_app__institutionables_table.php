<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppInstitutionablesTable extends Migration
{

    public function up()
    {
        Schema::connection('pgsql-app')->create('institutionables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('institution_id')->constrained('app.institutions');
            $table->morphs('institutionable');
            $table->timestamps();
            $table->unique(['institution_id','institutionable_id','institutionable_type']);
        });
    }

    public function down()
    {
        Schema::connection('pgsql-app')->dropIfExists('institutionables');
    }
}
