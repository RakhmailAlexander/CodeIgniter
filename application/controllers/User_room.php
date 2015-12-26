<?php
    class User_room extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            if (!$this->ion_auth->logged_in())
            {
                redirect('auth/login', 'refresh');
            }
            $this->load->model('blog_model');
        }
        function index()
        {
            $data['name'] = $this->ion_auth->user()->row()->first_name;
            $data['query'] = $this->blog_model->get_last_topics();
            $this->load->view('templates/header');
            $this->load->view('pages/home', $data);
            $this->load->view('templates/footer');
        }
        function create_topic()
        {
            $this->load->helper('form');
            if (isset($_POST['title']) && isset($_POST['content'])) //there are some troubles with $this->load->post['title'], it's not working on unknown reason;
            {
                $this->blog_model->create_new_topic();
                redirect('user_room', 'refresh');
            }
            $this->load->view('templates/header');
            $this->load->view('pages/create');
            $this->load->view('templates/footer');
        }
        function delete_topic()
        {
            $this->load->helper('form');
            $data['topics_to_del'] = $this->blog_model->get_topics_by_author();
            if (isset($_POST['delete']))
            {
                $this->blog_model->user_id = $_POST['delete'];
                $this->blog_model->delete_topic();
                redirect('user_room', 'refresh');
            }
            $this->load->view('templates/header');
            $this->load->view('pages/delete', $data);
            $this->load->view('templates/footer');
        }
        function update_topic()
        {
            if (isset($_POST['update']))
            {
                $this->blog_model->id = $_POST['update'];
                $this->blog_model->title = $_POST['title'];
                $this->blog_model->content = $_POST['content'];
                $this->blog_model->update_topic();
                redirect('user_room', 'refresh');
            }
            $data['topics_to_update'] = $this->blog_model->get_topics_by_author();
            $this->load->helper('form');
            $this->load->view('templates/header');
            $this->load->view('pages/update', $data);
            $this->load->view('templates/footer');
        }
    }