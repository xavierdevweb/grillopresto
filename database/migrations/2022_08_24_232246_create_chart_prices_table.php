<?php

use App\Models\Menu;
use App\Models\MenuType;
use App\Models\Portion;
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
        Schema::create('chart_prices', function (Blueprint $table) {
            $table->id();  
            $table->foreignIdFor(Portion::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(MenuType::class)->constrained()->cascadeOnDelete();
            $table->integer('price');
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
        Schema::dropIfExists('chart_prices');
    }
};
