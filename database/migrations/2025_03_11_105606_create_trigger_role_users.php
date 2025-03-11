<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Exécuter la migration.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE OR REPLACE FUNCTION insert_client_or_admin() 
RETURNS trigger AS
$$
BEGIN 
    IF NEW.role = 'client' THEN 
        INSERT INTO clients (id, created_at, updated_at) 
        VALUES (NEW.id, NOW(), NOW());
    ELSE 
        INSERT INTO admins (id, created_at, updated_at) 
        VALUES (NEW.id, NOW(), NOW());
    END IF;
     
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

        ");
    }

    /**
     * Annuler la migration.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('
            DROP TRIGGER IF EXISTS insert_client_after_user;
        ');
    }
};
