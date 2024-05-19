<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create members table
        Schema::create('members', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->string('phone');
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });

        // sql trigger query to create member id
        DB::unprepared('
            CREATE TRIGGER before_insert_member
            BEFORE INSERT ON members
            FOR EACH ROW
            BEGIN
                DECLARE last_id VARCHAR(6);
                DECLARE generate INT;
                SET last_id = (SELECT id FROM members ORDER BY id DESC LIMIT 1);
                SET generate = IFNULL(CAST(SUBSTRING(last_id, 2) AS UNSIGNED) + 1, 1);
                SET new.id = CONCAT("M", LPAD(generate, 4, "0"));
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
