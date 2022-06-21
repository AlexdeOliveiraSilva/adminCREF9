<?php
class Customers_model extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert("users", $data);
        
        $this->db->select("max(id) as id");
        $this->db->from("users");
        $query = $this->db->get();
        $result = $query->result();
        if(isset($result[0]))
            return $result[0]->id;

        return null;
    }


    

    public function selectAll($company = null)
    {
        $this->db->select("users.*, companys.name as companysName");
        $this->db->from("users");
        $this->db->join("companys", "companys.id = users.companysId");
        $this->db->order_by("users.name", "asc");
        $this->db->where("users.situation", 1);
        $this->db->where("companys.situation", 1);
        if($company !==null){
            $this->db->where("companys.id", $company);
        }
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }



  

    public function select($id)
    {
        $this->db->select("*");
        $this->db->from("users");
        $this->db->where("id", $id);
        $this->db->where("situation", 1);
        $query = $this->db->get();
        $result = $query->result();
        if(isset($result[0]))
            return $result[0];
        
        return null;
    }

    public function update($data, $id){
        $this->db->where("id", $id);
        $this->db->update("users", $data);
    }

}
