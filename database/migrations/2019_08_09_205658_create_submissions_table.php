<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->nullable();
            $table->string('name')->nullable();
//            $table->json('data')->nullable();
            $table->longText('data')->nullable();
            $table->unsignedBigInteger('domain_id');
            $table->unsignedBigInteger('endpoint_id');
            $table->timestamps();

            /*
             * A submission must be associated with a domain
             * */
            $table->foreign('domain_id')->references('id')
                ->on('domains');
            /*
             * And a submission is also associated with an endpoint.
             * */
            $table->foreign('endpoint_id')->references('id')
                ->on('endpoints');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submissions');
    }
}
