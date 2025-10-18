<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateNewsTable extends Migration
{
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('header');
            $table->string('short_text');
            $table->text('article');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE news ADD COLUMN image MEDIUMBLOB');
    }

    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
