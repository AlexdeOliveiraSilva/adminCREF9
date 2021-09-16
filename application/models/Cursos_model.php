<?php
class Cursos_model extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert("courses", $data);

        $this->db->select("max(id) as id");
        $this->db->from("courses");
        $query = $this->db->get();
        $result = $query->result();
        if (isset($result[0]))
            return $result[0]->id;

        return null;
    }


    public function selectAll()
    {
        $this->db->select("courses.*, coursesCategories.title as nameCategory");
        $this->db->from("courses");
        $this->db->join("coursesCategories", "coursesCategories.id = courses.coursesCategoriesId");
        $this->db->order_by("title", "asc");

        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function getAllCategories()
    {

        $this->db->select("*");
        $this->db->from("coursesCategories");
        $this->db->order_by("title", "asc");
        $this->db->where("situation", 1);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }







    public function select($id)
    {
        $this->db->select("*");
        $this->db->from("courses");
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
        $this->db->update("courses", $data);
    }

    public function updateCategory($data, $id)
    {
        $this->db->where("id", $id);
        $this->db->update("coursesCategories", $data);
    }

    public function selectCategory($id)
    {
        $this->db->select("*");
        $this->db->from("coursesCategories");
        $this->db->where("id", $id);
        $query = $this->db->get();
        $result = $query->result();
        if (isset($result[0]))
            return $result[0];

        return null;
    }

    public function insertCategoriy($data)
    {
        $this->db->insert("coursesCategories", $data);
    }
}
