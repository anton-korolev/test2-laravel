<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('words_in_articles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('word_id', false, true);
            $table->bigInteger('article_id', false, true);
            $table->integer('count');
            // $table->primary(['word_id', 'article_id']);
            $table->index(['word_id', 'article_id', 'count']);
            $table
                ->foreign('word_id', 'word_id_foreign')
                ->references('id')
                ->on('words')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table
                ->foreign('article_id', 'article_id_foreign')
                ->references('id')
                ->on('articles')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropForeign('article_id_foreign');
        Schema::dropForeign('word_id_foreign');
        Schema::dropIfExists('words_in_articles');
    }
};
