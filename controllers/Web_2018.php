<?php
class Web extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper(array('url','text','permission','form'));
        $this->load->helper('pagination');   
    }
 

    public function  index(){
         $data['subview'] = 'web/home';
         $this->load->view('web_home_index',$data);
    }
    
    
     public function  store(){
         $data['subview'] = 'web/store';
         $this->load->view('web_home_index',$data);
    }
    
    
    
        public function king_word()
    {
        $data['subview'] = 'web/about/king_word';
        $this->load->view('web_home_index',$data);
    }


    public function president_word()
    {
        $data['subview'] = 'web/about/president_word';
        $this->load->view('web_home_index',$data);
    }
    
    public function vision()
    {
        $data['subview'] = 'web/about/vision';
        $this->load->view('web_home_index',$data);
    }
    public function managment_members()
    {
        $data['subview'] = 'web/about/managment_members';
        $this->load->view('web_home_index',$data);
    }
    public function managment_general()
    {
        $data['subview'] = 'web/about/managment_general';
        $this->load->view('web_home_index',$data);
    }


    public function structure()
    {
        $data['subview'] = 'web/about/structure';
        $this->load->view('web_home_index',$data);
    }


    public function projects()
    {
        $data['subview'] = 'web/projects';
        $this->load->view('web_home_index',$data);
    }
    public function market()
    {
        $data['subview'] = 'web/market';
        $this->load->view('web_home_index',$data);
    }
    public function membering()
    {
        $data['subview'] = 'web/membering';
        $this->load->view('web_home_index',$data);
    }


    public function news()
    {
        $data['subview'] = 'web/media_center/news';
        $this->load->view('web_home_index',$data);
    }
    public function gallery()
    {
        $data['subview'] = 'web/media_center/gallery';
        $this->load->view('web_home_index',$data);
    }
    public function videos()
    {
        $data['subview'] = 'web/media_center/videos';
        $this->load->view('web_home_index',$data);
    }
    public function reports()
    {
        $data['subview'] = 'web/media_center/reports';
        $this->load->view('web_home_index',$data);
    }
    public function system()
    {
        $data['subview'] = 'web/media_center/system';
        $this->load->view('web_home_index',$data);
    }

    public function plans()
    {
        $data['subview'] = 'web/media_center/plans';
        $this->load->view('web_home_index',$data);
    }

    public function contact()
    {
        $data['subview'] = 'web/contact';
        $this->load->view('web_home_index',$data);
    }
    
    
        public function single_project()
    {
        $data['subview'] = 'web/single_project';
        $this->load->view('web_home_index',$data);
    }
    public function shopping_cart()
    {
        $data['subview'] = 'web/shopping_cart';
        $this->load->view('web_home_index',$data);
    }


    
    
    
   
}