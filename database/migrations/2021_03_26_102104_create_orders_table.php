<?php

use App\Models\OrderModel;
use App\Models\UserModel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(OrderModel::TABLE_NAME, function (Blueprint $table) {
            $table->id();

            $table->bigInteger('user_id')->unique()->unsigned()->nullable(false);
            $table->integer('line', false, true)->nullable(false);
            $table->char('row', 1)->nullable(false);
            $table->string('aircraft_type')->nullable(false);

            $table->timestamps();
        });

        Schema::table(OrderModel::TABLE_NAME, function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')
                ->on(UserModel::TABLE_NAME)
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(OrderModel::TABLE_NAME, function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists(OrderModel::TABLE_NAME);
    }
}
