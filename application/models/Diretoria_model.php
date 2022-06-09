<?php
class Diretoria_model extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert("directions", $data);

        $this->db->select("max(id) as id");
        $this->db->from("directions");
        $query = $this->db->get();
        $result = $query->result();
        if (isset($result[0]))
            return $result[0]->id;

        return null;
    }


    public function selectAll()
    {
        $this->db->select("directions.*, companys.name as companyName");
        $this->db->from("directions");
        $this->db->join("companys", "directions.companys = companys.id ");
        $this->db->order_by("ord", "asc");

        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }








    public function select($id)
    {
        $this->db->select("*");
        $this->db->from("directions");
        $this->db->where("id", $id);
        $query = $this->db->get();
        $result = $query->result();
        if (isset($result[0]))
            return $result[0];

        return null;
    }

    public function update($data, $id)
    {
        $this->db->where("id", $id);
        $this->db->update("directions", $data);
    }
}
