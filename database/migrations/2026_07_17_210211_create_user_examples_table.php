<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('user_examples', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignUuid('grammar_rule_id')->constrained('grammar_rules')->cascadeOnDelete();
            $table->string('custom_phrase');
            $table->string('translation');
            $table->string('romanization')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('user_examples');
    }
};
