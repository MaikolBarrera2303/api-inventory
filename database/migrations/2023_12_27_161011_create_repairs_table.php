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
        Schema::create('repairs', function (Blueprint $table) {
            $table->id();
            $table->foreignId("responsible_report_id");
            $table->foreign("responsible_report_id")->references("id")->on("responsible")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("device_id");
            $table->foreign("device_id")->references("id")->on("devices")->cascadeOnDelete()->cascadeOnUpdate();
            $table->date("date_report");
            $table->text("observation_report");
            $table->string("responsible_diagnosis")->nullable();
            $table->enum("type_repair",["software","hardware"])->nullable();
            $table->date("date_diagnosis")->nullable();
            $table->text("diagnosis")->nullable();
            $table->date("date_repair")->nullable();
            $table->text("observation_repair")->nullable();
            $table->timestamps();
        });

        Schema::table('repairs', function (Blueprint $table){
            $table->timestamp('created_at')->default(DB::raw("CURRENT_TIMESTAMP"))->change();
            $table->timestamp('updated_at')->default(DB::raw("CURRENT_TIMESTAMP"))->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repairs');
    }
};
