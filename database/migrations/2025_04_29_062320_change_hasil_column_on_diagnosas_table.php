<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('diagnosas', function (Blueprint $table) {
        $table->string('hasil')->change(); // ubah jadi string
    });
}

public function down()
{
    Schema::table('diagnosas', function (Blueprint $table) {
        $table->boolean('hasil')->change(); // kembalikan jika rollback
    });
}

};
