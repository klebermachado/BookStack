<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAttributeLink extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookshelves', function (Blueprint $table) {
            $table->string('link')->after('description')->nullable();
        });
        Schema::table('books', function (Blueprint $table) {
            $table->string('link')->after('description')->nullable();
        });
        Schema::table('chapters', function (Blueprint $table) {
            $table->string('link')->after('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookshelves', function (Blueprint $table) {
            $table->dropColumn('link');
        });
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('link');
        });
        Schema::table('chapters', function (Blueprint $table) {
            $table->dropColumn('link');
        });
    }
}
