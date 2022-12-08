<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Seed_users extends CI_Migration
{
  public function __construct()
  {
    $this->load->dbforge();
    $this->load->database();
  }

  public function up()
  {
    $sql = 'INSERT INTO users VALUES (null,"user1","user1@mail.com","' . password_hash("user1", PASSWORD_DEFAULT) . '","1","1","' . date('Y-m-d') . '",null)';
    $this->db->query($sql);
  }

  public function down()
  {
  }
}