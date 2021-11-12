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

    public function addWork($data)
    {
        $this->db->query("INSERT INTO works (name, start_date, end_date, status) values (:name, :start_date, :end_date, :status)");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':start_date', $data['start_date']);
        $this->db->bind(':end_date', $data['end_date']);
        $this->db->bind(':status', $data['status']);
        if( $this->db->execute() ){
            return true;
        } else {
            return false;
        }
    }

    public function getWorktById($id){
        $this->db->query('select * from works where id = :id');
        $this->db->bind(':id',$id);
        return $this->db->single();
    }

    public function updateWork($data){
        $this->db->query('UPDATE works SET title = :title, body = :body where id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);

        if( $this->db->execute() ){
            return true;
        } else {
            return false;
        }
    }
}
