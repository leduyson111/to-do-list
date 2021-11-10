<?php

namespace App\Models;

use App\Libraries\Database;

class Work
{
    private $db;

    private $table_name = 'works';

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAll()
    {
        $this->db->query("select * from $this->table_name");
        return $this->db->resultSet();
    }
}
