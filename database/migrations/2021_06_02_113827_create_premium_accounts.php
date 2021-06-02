<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePremiumAccounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premium_accounts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->timestamp('premium_expiration_date')->useCurrent();
            $table->string('ccname');
            $table->string('ccnumber');
            $table->string('ccexpdate');
            $table->integer('cccvv');
        });

        Schema::table('users', function (Blueprint $table){
            $table->foreign('premium_id')
                ->references('id')->on('premium_accounts')
                ->onDelete('set null');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('premium_accounts');
    }
}
