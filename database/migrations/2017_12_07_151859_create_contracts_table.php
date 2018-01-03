<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year')->unsigned();
            $table->integer('number')->unsigned();
            $table->string('parts', 300);
            $table->text('object');
            $table->string('kindofservice');
            $table->string('source');
            $table->date('signature');
            $table->date('validity');
            $table->double('value', 15, 2); 
            $table->timestamps();
            $table->softDeletes();


            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}
