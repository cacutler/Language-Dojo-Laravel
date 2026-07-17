<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('progress_tracking', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignUuid('grammar_rule_id')->constrained('grammar_rules')->cascadeOnDelete();
            $table->boolean('is_completed')->default(false);
            $table->timestamps();
            $table->unique(['user_id', 'grammar_rule_id']);
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('progress_tracking');
    }
};
