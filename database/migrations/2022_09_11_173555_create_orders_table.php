<?php

use App\Models\Menu;
use App\Models\User;
use App\Models\Portion;
use App\Models\OrderStatus;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable()->constrained()->cascadeOnDelete();
            $table->string('prenom');
            $table->string('nom');
            $table->string('rue');
            $table->string('no_porte');
            $table->string('appartement')->nullable();
            $table->string('code_postal');
            $table->string('ville');
            $table->string('telephone');
            $table->string('email');
            $table->foreignIdFor(Menu::class)->constrained()->cascadeOnDelete();
            $table->integer('price');
            $table->string('order_number');
            $table->foreignIdFor(OrderStatus::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Portion::class)->constrained()->cascadeOnDelete();
            $table->json('meals');
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
        Schema::dropIfExists('orders');
    }
};
