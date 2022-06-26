<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumntsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('user_level')->default(2);
            $table->string('address_line_1')->after('email');
            $table->string('address_line_2')->after('address_line_1');
            $table->string('address_line_3')->after('address_line_2')->nullable();
            $table->date('dob')->after('address_line_3');
            $table->string('contact_no')->after('dob');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropIfExists([
                'user_level',
                'address_line_1',
                'address_line_2',
                'address_line_3',
                'dob',
                'contact_no'
            ]);
        });
    }
}
