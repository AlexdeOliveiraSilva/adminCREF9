<?php
class Posts_model extends CI_Model
{

    public function selectAllPost($user, $companys)
    {
        $this->db->select("posts.*, TIMESTAMPDIFF(MINUTE, posts.createdAt, now())  as createdAtInMinutes ");
        $this->db->from("posts");

        $this->db->where("posts.companys", $companys);
        $this->db->where("posts.situation", 1);
        $this->db->order_by("posts.createdAt", "DESC");
        $query = $this->db->get();
        $result = $query->result();
        foreach ($result as $item) {

            $this->db->select("*");
            $this->db->from("postsImage");
            $this->db->where("posts", $item->id);
            $query = $this->db->get();
            $result0 = $query->result();
            $item->image = $result0;

            if ($item->createdAtInMinutes  < 1)
                $item->date = "Agora";
            else if ($item->createdAtInMinutes < 60)
                $item->date  = $item->createdAtInMinutes . " minuto" . ($item->createdAtInMinutes > 1 ? "s" : "");
            else if ($item->createdAtInMinutes < 1440)
                $item->date = number_format($item->createdAtInMinutes / 60, 0) . " hora" . (number_format($item->createdAtInMinutes / 60, 0) > 1 ? "s" : "");
            else
                $item->date = date("d/m/Y H:i", strtotime($item->createdAt));

            $this->db->select("customers.id, customers.cliente as nome, customers.photoMiniature");
            $this->db->from("customers");
            $this->db->where("id", $item->author);
            $query = $this->db->get();
            $result1 = $query->result();
            $item->author = $result1[0];


            $this->db->select("*");
            $this->db->from("comments");
            $this->db->where("posts", $item->id);
            $this->db->where("situation", 1);
            $query = $this->db->get();
            $resultComments = $query->result();

            foreach ($resultComments as $item2) {
                $this->db->select("customers.id, customers.cliente as nome, customers.photoMiniature");
                $this->db->from("customers");
                $this->db->where("id", $item2->author);
                $query = $this->db->get();
                $result3 = $query->result();
                $item2->author = $result3[0];
            }
            $item->comments = $resultComments;

            $this->db->select("author");
            $this->db->from("toasts");
            $this->db->where("posts", $item->id);
            $this->db->where("situation", 1);
            $query = $this->db->get();
            $resultToasts = $query->result();

            $toast = false;
            foreach ($resultToasts as $item3) {
                if ($item3->author == $user) {
                    $toast = true;
                    
                }
            }
            
            $item->toastNumber = count($resultToasts);
            $item->toast = $toast;
        }

        return $result;
    }


    public function insertPosts($data)
    {
        $this->db->insert("posts", $data);

        $this->db->select("max(id) as id");
        $this->db->from("posts");
        $this->db->where("situation", 1);
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->result();
        if (isset($result[0]))
            return $result[0]->id;
    }


    public function insertpostsImage($data)
    {
        $this->db->insert("postsImage", $data);
    }


    public function insertComment($data)
    {
        $this->db->insert("comments", $data);
        $this->db->select("max(id) as id");
        $this->db->from("comments");
        $this->db->where("situation", 1);
        $this->db->where("author", $data['author']);
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->result();
        if (isset($result[0]))
            return $result[0]->id;
    }


    public function insertToasts($data)
    {
        $this->db->insert("toasts", $data);
    }

    public function removeToasts($posts, $author)
    {
        $this->db->where("posts", $posts);
        $this->db->where("author", $author);
        $this->db->delete("toasts");
    }


    public function deleteAllCommentFromPost($post){
        $this->db->where("posts", $post);
        $this->db->delete("comments");
    }

    public function deleteAllToastFromPost($post){
        $this->db->where("posts", $post);
        $this->db->delete("toasts");
    }


    public function deletePost($post){
        $this->db->where("id", $post);
        $this->db->delete("posts");
    }

    public function deleteAllPostsImage($post){
        $this->db->where("posts", $post);
        $this->db->delete("postsImage");
    }
    
}
