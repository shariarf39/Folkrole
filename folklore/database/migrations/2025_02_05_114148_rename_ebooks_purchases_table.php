<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::rename('ebooks_purchases', 'ebook_purchases');
    }

    public function down()
    {
        Schema::rename('ebook_purchases', 'ebooks_purchases');
    }
};
