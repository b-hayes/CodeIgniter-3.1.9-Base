<?php
/**
 * Created by PhpStorm.
 * User: Brad
 * Date: 19/07/2018
 * Time: 6:55 AM
 */

class test extends MY_Controller
{
    /*Need this table:
CREATE TABLE news (
    id int(11) NOT NULL AUTO_INCREMENT,
    title varchar(128) NOT NULL,
    slug varchar(128) NOT NULL,
    text text NOT NULL,
    PRIMARY KEY (id),
    KEY slug (slug)
);
     * */
    public function __construct()
    {
        parent::__construct();
        echo get_called_class()."::".__FUNCTION__." <br> in ".__FILE__." at ".__LINE__."<br>";
        $this->load->model('test_model');
        $this->load->helper('url_helper');
    }
    
    public function index()
    {
        $data['test'] = $this->test_model->get_test();
        $data['title'] = 'test archive';
        
        $this->load->view('templates/header', $data);
        $this->load->view('test/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function view($slug = NULL)
    {
        $data['test_item'] = $this->test_model->get_test($slug);
        
        if (empty($data['test_item']))
        {
            show_404();
        }
        
        $data['title'] = $data['test_item']['title'];
        
        $this->load->view('templates/header', $data);
        $this->load->view('test/view', $data);
        $this->load->view('templates/footer');
    }
    
    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $data['title'] = 'Create a test item';
        
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');
        
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('test/create');
            $this->load->view('templates/footer');
            
        }
        else
        {
            $this->test_model->set_test();
            $this->load->view('test/success');
        }
    }
    
    public function set_test()
    {
        $this->load->helper('url');
        
        $slug = url_title($this->input->post('title'), 'dash', TRUE);
        
        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'text' => $this->input->post('text')
        );
        
        return $this->db->insert('test', $data);
    }
}