<?php

class Employee extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function findByNip($nip)
    {
        $data = $this->db->get_where('inventarisir', array('nip' => $nip))->row();

        return $data;
    }

    public function insert($data)
    {
        $save = $this->db->insert('inventarisir', $data);

        return $save;
    }

    public function update($data, $id)
    {
        $update = $this->db->update('inventarisir', $data, array('id' => $id));

        return $update;
    }

    public function totalOfDone()
    {
        $query = $this->db->query('SELECT * FROM inventarisir WHERE progress = 12');

        return $query->num_rows();
    }

    public function totalOfProcess()
    {
        $query = $this->db->query('SELECT * FROM inventarisir WHERE progress != 12');

        return $query->num_rows();
    }

}