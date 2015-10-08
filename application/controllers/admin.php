<?php
// application/controllers/admin.php
require 'admin_base.php';
class Admin extends Admin_Base {
    
    function index()
    {
        redirect('admin/dashboard');
    }
    function dashboard()
    {
       $data['user_id']    = $this->tank_auth->get_user_id();
       $data['username']   = $this->tank_auth->get_username();
       $data['panelheading'] = "Dashboard";
       $data['index'] = "admin/dashboard";
       $this->load->view('layouts/index', $data);
    }
}
?>