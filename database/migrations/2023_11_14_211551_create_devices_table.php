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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->foreignId("responsible_id")->nullable();
            $table->foreign("responsible_id")->references("id")->on("responsible")->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId("type_device_id");
            $table->foreign("type_device_id")->references("id")->on("type_devices")->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum("state",["En Servicio","Sin Asignar","Fuera de Servicio"]);
            $table->string("brand",100);
            $table->string("model",100);
            $table->string("serial",100)->unique();
            $table->string("operating_system")->nullable();
            $table->string("processor")->nullable();
            $table->string("slots")->nullable();
            $table->string("ram")->nullable();
            $table->string("memory")->nullable();
            $table->string("labeling")->nullable()->unique();
            $table->date("purchase_date")->nullable();
            $table->date("warranty")->nullable();
            $table->timestamps();
        });

        Schema::table('devices', function (Blueprint $table){
            $table->timestamp('created_at')->default(DB::raw("CURRENT_TIMESTAMP"))->change();
            $table->timestamp('updated_at')->default(DB::raw("CURRENT_TIMESTAMP"))->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
