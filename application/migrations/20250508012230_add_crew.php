<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Crew extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'crew_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'crew_title' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
            ),
            'crew_description' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
            'crew_correction' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
        ));

        $this->dbforge->add_key('crew_id', TRUE); // Primary Key
        $this->dbforge->create_table('crew');     // Create Table

        echo "Crew table created";
    }

    public function down()
    {
        $this->dbforge->drop_table('crew',TRUE);
        echo "Crew table dropped";
    }
}

