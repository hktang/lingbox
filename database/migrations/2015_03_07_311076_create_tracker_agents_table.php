<?php

use PragmaRX\Tracker\Support\Migration;

class CreateTrackerAgentsTable extends Migration
{
    /**
     * Table related to this migration.
     *
     * @var string
     */
    private $table = 'tracker_agents';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function migrateUp()
    {
        $this->builder->create(
            $this->table,
            function ($table) {
                $table->bigIncrements('id');

                $table->string('name', 255);
                $table->string('browser')->index();
                $table->string('browser_version');

                $table->timestamp('created_at')->index();
                $table->timestamp('updated_at')->index();
                
                $table->unique('name');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function migrateDown()
    {
        $this->drop($this->table);
    }
}
