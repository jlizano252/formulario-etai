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
        Schema::table('students', function (Blueprint $table) {
            $table->string('emergency_name_1')->after('mobile');
            $table->string('emergency_phone_1')->after('emergency_name_1');

            $table->string('emergency_name_2')->after('emergency_phone_1');
            $table->string('emergency_phone_2')->after('emergency_name_2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn([
                'emergency_name_1',
                'emergency_phone_1',
                'emergency_name_2',
                'emergency_phone_2'
            ]);
        });
    }
};
