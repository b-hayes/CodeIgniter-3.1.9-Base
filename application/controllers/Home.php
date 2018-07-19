<?php
/**
 * Created by PhpStorm.
 * User: Brad
 * Date: 19/07/2018
 * Time: 5:39 AM
 */


class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
//        var_dump($GLOBALS);
        echo get_called_class()."::".__FUNCTION__." <br> in ".__FILE__." at ".__LINE__."<br>";
    }
    
    
    public function index($page = "home"){
        if ( ! file_exists(APPPATH.'views/'.get_called_class().'/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
    
        $data['title'] = ucfirst($page); // Capitalize the first letter
        
        $this->load->view('templates/header', $data);
        $this->load->view(''.get_called_class().'/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }
    
}