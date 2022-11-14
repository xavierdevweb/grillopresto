<?php

use App\Models\Allergen;
use App\Models\HistoryMeal;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allergen_history_meal', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Allergen::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(HistoryMeal::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('allergen_hystory_meal');
    }
};
