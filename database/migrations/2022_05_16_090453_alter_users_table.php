<?php

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
        Schema::table('users', function (Blueprint $table) {
            $table->date('date_of_birth')->nullable();
            $table->string('address', 255)->nullable();
            $table->string('phone_number', 10)->nullable();
            $table->string('image', 255)->default('./df_user.png');
            $table->boolean('sex')->nullable();
            $table->string('google_id', 255)->nullable();
            $table->string('facebook_id', 255)->nullable();
            $table->timestamp('create_at')->useCurrent();
            $table->unsignedBigInteger('role_id')->default('1');
            $table->foreign('role_id')->references('id')->on('tbl_role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
};
