<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $start_date = date('Y-m-d');  
            $date = strtotime($start_date);
            $date = strtotime("+7 day", $date);

            $table->id();
            $table->unsignedBigInteger('book__id');
            $table->date('expire_date')->format('Y-m-d')->default(date('Y-m-d',$date));
            $table->unsignedBigInteger('user__id');
            $table->string('status')->default('active');
            $table->string('penalty');
            $table->timestamps();
            $table->foreign('book__id')
                ->references('id')->on('books');
            $table->foreign('user__id')
                ->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }
}
