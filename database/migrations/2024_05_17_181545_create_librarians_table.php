<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateLibrariansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create librarians table
        Schema::create('librarians', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('admin')->default(false);
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });

        // Execute sql query to create trigger
        DB::unprepared('
            CREATE TRIGGER before_insert_librarian
            BEFORE INSERT ON librarians
            FOR EACH ROW
            BEGIN
                DECLARE last_id VARCHAR(6);
                DECLARE generate INT;
                SET last_id = (SELECT id FROM librarians ORDER BY id DESC LIMIT 1);
                SET generate = IFNULL(CAST(SUBSTRING(last_id, 2) AS UNSIGNED) + 1, 1);
                SET new.id = CONCAT("L", LPAD(generate, 4, "0"));
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
        Schema::dropIfExists('librarians');
    }
}
