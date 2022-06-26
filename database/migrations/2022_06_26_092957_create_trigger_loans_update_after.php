<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriggerLoansUpdateAfter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE TRIGGER loans_update_after AFTER UPDATE on loans FOR EACH ROW
            BEGIN
                IF NEW.status = 'Non Active' then
                    UPDATE books set stock = stock + 1 where id = NEW.book__id;
                END IF;
            END
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP TRIGGER 'loans_update_after'");
    }
}
