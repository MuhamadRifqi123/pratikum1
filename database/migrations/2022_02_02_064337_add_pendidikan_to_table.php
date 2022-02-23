<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPendidikanToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('biodatas', function (Blueprint $table) {
            $table->string('smp')->after('email')->nullable();
            $table->string('sma')->after('email')->nullable();
            $table->string('universitas')->after('email')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('biodatas', function (Blueprint $table) {
            $table->dropColumn('smp');
            $table->dropColumn('sma');
            $table->dropColumn('universitas');
        });
    }
}
