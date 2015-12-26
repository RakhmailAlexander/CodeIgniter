<?php
    class Blog_model extends CI_Model
    {
        public $title;
        public $content;
        public $user_id;
        public $id;
        public function __construct()
        {
            parent::__construct();
            $this->title = isset($_POST['title']) ? $_POST['title'] : NULL;
            $this->content = isset($_POST['content']) ? $_POST['content'] : NULL;
            $this->user_id = $this->ion_auth->user()->row()->id;
        }
        public function get_last_topics()
        {
            $this->db->select('title, content, create_time');
            $query = $this->db->get('blogs');
            return $query->result();
        }
        public function get_topics_by_author()
        {
            $query = $this->db->get_where('blogs', array('user_id' => $this->user_id));
            return $query->result();
        }
        public function get_topics_by_id()
        {
            $query = $this->db->get_where('blogs', array('id' => $this->id));
            return $query->result();
        }
        public function create_new_topic()
        {
            $data['title'] = $this->title;
            $data['content'] = $this->content;
            $data['user_id'] = $this->user_id;
            $this->db->insert('blogs', $data);
        }
        public function delete_topic()
        {
            $this->db->delete('blogs', array('id' => $this->user_id));
        }
        public function update_topic()
        {
            $data = array (
                'content' => $this->content,
                'title' => $this->title
            );
            $this->db->where('id', $this->id);
            $this->db->update('blogs', $data);
        }
    }