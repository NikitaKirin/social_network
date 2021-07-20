<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('page_comments', function (Blueprint $table) {
            $table->id();
            $table->text('text');
            $table->foreignId('creator_id')->constrained('users', 'id')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('page_comments');
    }
}
