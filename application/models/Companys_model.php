<?php
class Companys_model extends CI_Model
{



        public function select($id)
        {
                $this->db->select("*");
                $this->db->from("companys");
                $this->db->where("id", $id);
                $query = $this->db->get();
                $result = $query->result();
                if (isset($result[0]))
                        return $result[0];
                return null;
        }



        public function selectAll()
        {
                $this->db->select("companys.*, (select count(*) FROM customers WHERE customers.companys = companys.id and situation = 1) as totaldeusuarios");
                $this->db->from("companys");
                $this->db->order_by("name", "asc");
                $this->db->where("situation", 1);
                $query = $this->db->get();
                $result = $query->result();

                return $result;
        }

        public function selectAllPartnersCompany($id){
                $this->db->select("*");
                $this->db->from("partners_company");
                $this->db->where("companys", $id);
                $query = $this->db->get();
                $result = $query->result();
                return $result;
        }

        public function insert($data)
        {
                $this->db->insert("companys", $data);
                $this->db->select("max(id) as id");
                $this->db->from("companys");

                $query = $this->db->get();
                $result = $query->result();
                return $result[0]->id;
        }

        public function insertPartnersCompany($data)
        {
                $this->db->insert("partners_company", $data);
        }

        public function deletePartnersCompany($company){
                $this->db->where("companys", $company);
                $this->db->delete("partners_company");
        }

        


        public function update($data, $id)
        {
                $this->db->where("id", $id);
                $this->db->update("companys", $data);
        }
}
