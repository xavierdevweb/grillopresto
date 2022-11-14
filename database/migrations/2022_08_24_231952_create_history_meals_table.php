<?php

use App\Models\Allergen;
use App\Models\Menu;
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
        Schema::create('history_meals', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->json('ingredients')->nullable(true);
            $table->text('description');
            $table->boolean('vegetarian')->default(false);
            $table->boolean('gluten_free')->default(false);
            $table->foreignIdFor(Menu::class)->constrained()->cascadeOnDelete();
            $table->string('image_path')->nullable(false);
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
        Schema::dropIfExists('history_meals');
    }
};
