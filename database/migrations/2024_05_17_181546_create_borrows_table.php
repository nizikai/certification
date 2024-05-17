<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBorrowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrows', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('librarian_id');
            $table->string('book_id');
            $table->string('member_id');
            $table->dateTime('borrow');
            $table->dateTime('return')->nullable();
            $table->dateTime('due');
            $table->boolean('deleted')->default(false);
            $table->timestamps();

            $table->foreign('librarian_id')->references('id')->on('librarians')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
        });

        // Create a trigger to auto-generate custom ID for borrows
        DB::unprepared('
            CREATE TRIGGER before_insert_borrow
            BEFORE INSERT ON borrows
            FOR EACH ROW
            BEGIN
                DECLARE last_id VARCHAR(15);
                DECLARE generate INT;
                SET last_id = (SELECT id FROM borrows ORDER BY id DESC LIMIT 1);
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
        Schema::dropIfExists('borrows');
    }
}
