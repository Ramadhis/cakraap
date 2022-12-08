<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Tb_users extends CI_Migration
{
  public function __construct()
  {
    $this->load->dbforge();
    $this->load->database();
  }

  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 5,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'name' => array(
        'type' => 'VARCHAR',
        'constraint' => '128',
      ),
      'email' => array(
        'type' => 'VARCHAR',
        'constraint' => '128',
      ),
      'password' => array(
        'type' => 'VARCHAR',
        'constraint' => '128',
      ),
      'role' => array(
        'type' => 'INT',
        'constraint' => '11',
      ),
      'is_active' => array(
        'type' => 'INT',
        'constraint' => '1',
      ),
      'created_at' => array(
        'type' => 'DATE',
        'null' => TRUE,
      ),
      'update_at' => array(
        'type' => 'DATE',
        'null' => TRUE,
      ),

    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('users');
  }

  public function down()
  {
    $this->dbforge->drop_table('users');
  }
}