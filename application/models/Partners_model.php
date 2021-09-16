<?php
class Partners_model extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert("partners", $data);

        $this->db->select("max(id) as id");
        $this->db->from("partners");
        $query = $this->db->get();
        $result = $query->result();
        if (isset($result[0]))
            return $result[0]->id;

        return null;
    }


    public function selectAll()
    {
        $this->db->select("partners.*, coursesCategories.title as nameCategory");
        $this->db->from("partners");
        $this->db->join("coursesCategories", "coursesCategories.id = partners.partnersCategoriesId");
        $this->db->order_by("title", "asc");

        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function getAllCategories()
    {

        $this->db->select("*");
        $this->db->from("partnersCategories");
        $this->db->order_by("title", "asc");
        $this->db->where("situation", 1);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }







    public function select($id)
    {
        $this->db->select("*");
        $this->db->from("partners");
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
        $this->db->update("partners", $data);
    }

    public function updateCategory($data, $id)
    {
        $this->db->where("id", $id);
        $this->db->update("partnersCategories", $data);
    }

    public function selectCategory($id)
    {
        $this->db->select("*");
        $this->db->from("partnersCategories");
        $this->db->where("id", $id);
        $query = $this->db->get();
        $result = $query->result();
        if (isset($result[0]))
            return $result[0];

        return null;
    }

    public function insertCategoriy($data)
    {
        $this->db->insert("partnersCategories", $data);
    }
}
