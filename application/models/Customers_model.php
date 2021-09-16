<?php
class Customers_model extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert("customers", $data);
        
        $this->db->select("max(id) as id");
        $this->db->from("customers");
        $query = $this->db->get();
        $result = $query->result();
        if(isset($result[0]))
            return $result[0]->id;

        return null;
    }

    public function insertValidation($data)
    {
        $this->db->insert("validations", $data);
    }


    

    public function selectAll()
    {
        $this->db->select("customers.*, companys.name as companysName, companys.logo as companysLogo");
        $this->db->from("customers");
        $this->db->join("companys", "companys.id = customers.companys");
        $this->db->order_by("cliente", "asc");
        $this->db->where("customers.situation", 1);
        $this->db->where("companys.situation", 1);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }


    public function searchCPF($d){
        $this->db->select("*");
        $this->db->from("customers");
        $this->db->where("REPLACE(REPLACE(cpf, \".\", \"\"), \"-\", \"\") = REPLACE(REPLACE(\"".$d."\", \".\", \"\"), \"-\", \"\")");
        $this->db->where("situation", 1);
        $query = $this->db->get();
        $result = $query->result();
        if(isset($result[0]))
            return $result[0];
        return -1;
    }

    public function loginApp($cpf, $password){
        $this->db->select("*");
        $this->db->from("customers");
        $this->db->where("REPLACE(REPLACE(cpf, \".\", \"\"), \"-\", \"\") = REPLACE(REPLACE(\"".$cpf."\", \".\", \"\"), \"-\", \"\")");
        
        if($password != "")
            $this->db->where("password", md5($password));
        $this->db->where("situation", 1);
        $query = $this->db->get();
        $result = $query->result();
    
        if(isset($result[0]))
            return $result[0];
        return -1;
    }


    

    public function select($id)
    {
        $this->db->select("*");
        $this->db->from("customers");
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
        $this->db->update("customers", $data);
    }

    public function selectAllValidations(){
        $this->db->select("validations.createat, partners.name, customers.cliente");
        $this->db->from("validations");
        $this->db->join("partners", "partners.id = validations.partners", "left");
        $this->db->join("customers", "customers.id = validations.customers", "left");
        $this->db->order_by("createat", "DESC");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
}
