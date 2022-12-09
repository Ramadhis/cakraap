<?php

class Model_auth extends CI_Model
{
  function login_check($table, $where)
  {
    return $this->db->get_where($table, $where);
  }
}