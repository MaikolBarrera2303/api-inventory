<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('responsible', function (Blueprint $table) {
            $table->id();
            $table->string("name",100)->unique()->unique();
            $table->string("phone",100)->nullable()->unique();
            $table->string("account",100)->unique();
            $table->timestamps();
        });

        Schema::table('responsible', function (Blueprint $table){
            $table->timestamp('created_at')->default(DB::raw("CURRENT_TIMESTAMP"))->change();
            $table->timestamp('updated_at')->default(DB::raw("CURRENT_TIMESTAMP"))->change();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responsible');
    }
};
