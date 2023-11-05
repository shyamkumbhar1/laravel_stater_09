<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class AddTriggersToCategories extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS `add_url_path`');
        DB::unprepared('CREATE TRIGGER add_url_path BEFORE INSERT ON categories
            FOR EACH ROW
            BEGIN
                DECLARE urlPath VARCHAR(255);
                IF NEW.parent_id IS NULL
                THEN
                    SET NEW.url_path = LOWER(NEW.slug);
                ELSE
                    SELECT url_path INTO urlPath FROM
                    categories WHERE categories.id = NEW.parent_id;
                    SET NEW.url_path = LOWER(concat(urlPath, "/", NEW.slug));
                END IF;
            END
        ');


        DB::unprepared('DROP TRIGGER IF EXISTS `update_url_path`');
        DB::unprepared('CREATE TRIGGER update_url_path BEFORE UPDATE ON categories
            FOR EACH ROW
            BEGIN
                DECLARE urlPath VARCHAR(255);
                IF NEW.parent_id IS NULL
                THEN
                    SET NEW.url_path = LOWER(NEW.slug);
                ELSE
                    SELECT url_path INTO urlPath FROM
                    categories WHERE categories.id = NEW.parent_id;
                    SET NEW.url_path = LOWER(concat(urlPath, "/", NEW.slug));
                END IF;
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
        DB::unprepared('DROP TRIGGER IF EXISTS `add_url_path`');
        DB::unprepared('DROP TRIGGER IF EXISTS `update_url_path`');
    }
}
