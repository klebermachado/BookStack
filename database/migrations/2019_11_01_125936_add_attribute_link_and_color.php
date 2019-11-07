<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAttributeLinkAndColor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookshelves', function (Blueprint $table) {
            $table->string('color')->after('description')->nullable();
            $table->string('link')->after('description')->nullable();
        });
        Schema::table('books', function (Blueprint $table) {
            $table->string('color')->after('description')->nullable();
            $table->string('link')->after('description')->nullable();
        });
        Schema::table('chapters', function (Blueprint $table) {
            $table->integer('image_id')->unsigned()->after('description')->nullable();
            $table->string('link')->after('description')->nullable();
            $table->foreign('image_id')->references('id')->on('images');
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
            $table->dropColumn('color');
        });
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('link');
            $table->dropColumn('color');
        });
        Schema::table('chapters', function (Blueprint $table) {
            $table->dropColumn('link');
            $table->dropColumn('image_id');
        });
    }
}
