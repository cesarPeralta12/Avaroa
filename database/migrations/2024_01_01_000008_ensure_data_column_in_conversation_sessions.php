<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('conversation_sessions') && !Schema::hasColumn('conversation_sessions', 'data')) {
            Schema::table('conversation_sessions', function (Blueprint $table) {
                $table->text('data')->nullable()->after('state');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('conversation_sessions', 'data')) {
            Schema::table('conversation_sessions', function (Blueprint $table) {
                $table->dropColumn('data');
            });
        }
    }
};
