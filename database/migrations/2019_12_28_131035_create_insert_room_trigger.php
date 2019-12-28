<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Str;


class CreateInsertRoomTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $room_id = Str::random(8);
        $room_name = 'İsimsiz sınıf '.rand(1000,9999);

        DB::unprepared('
            CREATE TRIGGER tr_Insert_Default_Room AFTER INSERT ON `teachers` FOR EACH ROW
                   INSERT INTO `rooms` (`room_id`,`teacher_id`,`room_name`,`is_default`, `created_at`, `updated_at`)
                   VALUES (
                        substring(MD5(RAND()),1,8),
                        NEW.teacher_id,
                        concat(NEW.name,FLOOR(RAND() * (9999 - 1000 + 1)) + 1000),
                        1,
                        NOW(),
                        null
                   )             
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `tr_Insert_Default_Room`');
    }
}
