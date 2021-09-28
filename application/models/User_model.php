<?php
class User_model extends CI_Model
{
        public function login($email, $password)
        {

                $this->db->select("*");
                $this->db->from("usersAdmin");
                $this->db->where("email", $email);
                $this->db->where("password", md5($password));
                $this->db->where("situation", 1);
                $this->db->limit(1);
                $query = $this->db->get();
                $result = $query->result();
                if (isset($result[0]))
                        return $result[0];
                return null;
        }


        public function insert($data)
        {
                $this->db->insert("usersAdmin", $data);
        }

        public function selectAllUtilizatons()
        {
                $this->db->select("accessPartner.createdAt, users.registration, partners.title as partners");
                $this->db->from("accessPartner");
                $this->db->join("partners", "partners.id = accessPartner.partnersId");
                $this->db->join("users", "users.id = accessPartner.usersId");
                $this->db->where("accessPartner.used", 1);
                $this->db->order_by("accessPartner.createdAt", "DESC");
                $query = $this->db->get();
                $result = $query->result();
                return $result;
        }
}
