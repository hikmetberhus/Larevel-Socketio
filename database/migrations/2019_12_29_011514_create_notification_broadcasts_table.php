<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationBroadcastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_broadcasts', function (Blueprint $table) {
            $table->unsignedInteger('notification_id');
            $table->foreign('notification_id')
                ->references('notification_id')
                ->on('notifications')
                ->onDeletes('cascade')
                ->onUpdate('cascade');
            $table->string('room_id',8);
            $table->foreign('room_id')
                ->references('room_id')
                ->on('rooms')
                ->onDeletes('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('notification_broadcasts');
    }
}
