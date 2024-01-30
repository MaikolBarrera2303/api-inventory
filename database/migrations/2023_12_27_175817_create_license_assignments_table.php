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
        Schema::create('license_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId("license_id");
            $table->foreign("license_id")->references("id")->on("licenses")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("responsible_id");
            $table->foreign("responsible_id")->references("id")->on("responsible")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("device_id");
            $table->foreign("device_id")->references("id")->on("devices")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("type_device_id");
            $table->foreign("type_device_id")->references("id")->on("type_devices")->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });

        Schema::table('license_assignments', function (Blueprint $table){
            $table->timestamp('created_at')->default(DB::raw("CURRENT_TIMESTAMP"))->change();
            $table->timestamp('updated_at')->default(DB::raw("CURRENT_TIMESTAMP"))->change();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('license_assignments');
    }
};
