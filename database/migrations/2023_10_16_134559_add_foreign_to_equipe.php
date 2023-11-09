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
        Schema::table('equipe', function (Blueprint $table) {
            $table->unsignedBigInteger('equipe_id');
            $table->foreign('equipe_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
                Schema::enableForeignKeyConstraints();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('equipe', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();
            $table->dropForeign('equipe_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
};
