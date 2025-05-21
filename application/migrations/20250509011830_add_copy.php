<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_copy extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'copy_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'copy_title' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'copy_description' => array(  // ✅ Fixed here
                'type' => 'TEXT',
                'null' => TRUE,
            ),
            'copy_correction' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            )
        ));

        $this->dbforge->add_key('copy_id', TRUE);
        $this->dbforge->create_table('copy');

        echo "copy table created";
    }

    public function down()
    {
        $this->dbforge->drop_table('copy', TRUE);
        echo "copy table dropped";
    }
}
