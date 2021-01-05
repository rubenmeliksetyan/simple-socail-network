<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFriendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_friends', function (Blueprint $table) {
            $table->unsignedBigInteger('sender_id')->unsigned();
            $table->unsignedBigInteger('receiver_id')->unsigned();
            $table->foreign('sender_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('receiver_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->primary(['sender_id', 'receiver_id']);
            $table->tinyInteger('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_friend', function (Blueprint $table) {
            $table->dropForeign( 'user_friend_sender_id_foreign');
            $table->dropForeign('user_friend_receiver_id_foreign');
        });

        Schema::dropIfExists('user_friend');
    }
}
