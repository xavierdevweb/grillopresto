<?php

use App\Models\Meal;
use App\Models\Allergen;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allergen_meal', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Allergen::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Meal::class)->constrained()->cascadeOnDelete();
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
        //
    }
};
