<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domains', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('endpoint_id');
            $table->string('email_from');
            $table->string('email_subject');
            $table->string('email_primary');
            $table->string('email_secondary')->nullable();
            $table->timestamps();

            /*
             * A domain record belongs to an endpoint. An Endpoint can
             * have as many domains associated to it.
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
        Schema::dropIfExists('domains');
    }
}
