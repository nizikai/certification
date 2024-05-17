<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create books table
        Schema::create('books', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('title');
            $table->string('author');
            $table->integer('stock');
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });

        // sql trigger query to create book id
        DB::unprepared('
            CREATE TRIGGER before_insert_book
            BEFORE INSERT ON books
            FOR EACH ROW
            BEGIN
                DECLARE last_id VARCHAR(15);
                DECLARE generate INT;
                SET last_id = (SELECT id FROM books ORDER BY id DESC LIMIT 1);
                SET generate = IFNULL(CAST(SUBSTRING(last_id, 7) AS UNSIGNED) + 1, 1);
                SET new.id = CONCAT(DATE_FORMAT(NOW(), "%y%m%d"), LPAD(generate, 5, "0"));
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
