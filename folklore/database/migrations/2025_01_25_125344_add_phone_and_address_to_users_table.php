<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        if (!Schema::hasColumn('users', 'phone')) {
            $table->string('phone')->nullable();
        }

        if (!Schema::hasColumn('users', 'address')) {
            $table->string('address')->nullable();
        }
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        if (Schema::hasColumn('users', 'phone')) {
            $table->dropColumn('phone');
        }

        if (Schema::hasColumn('users', 'address')) {
            $table->dropColumn('address');
        }
    });
}

};
