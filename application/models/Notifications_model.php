<?php
class Notifications_model extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert("notifications", $data);
        
    }


    public function selectAll()
    {
        $this->db->select("notifications.*, companys.name as CompanysName");
        $this->db->from("notifications");
        $this->db->join("companys", "companys.id = notifications.companys");
        $this->db->order_by("notifications.sendDateTime", "DESC");
        $this->db->where("notifications.situation", 1);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function selectSend($company)
    {
        $this->db->select("*");
        $this->db->from("notifications");
        $this->db->order_by("sendDateTime", "DESC");
        $this->db->where("situation", 1);
        $this->db->where("companys", $company);
        $this->db->where("sendDateTime <= now()");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

}
