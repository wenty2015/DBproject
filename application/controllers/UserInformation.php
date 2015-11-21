<?php
/**
 * Created by PhpStorm.
 * User: YueLyu
 * Date: 11/21/15
 * Time: 10:35 AM
 */
    class UserInformation extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->database();
            $this->load->library('session');
            $this->load->helper(array('form','url'));
            $this->load->model('IndividualUser');
        }

        public function viewProfile() {
            if (isset($_SESSION['id'])) {
                $data = $this->IndividualUser->getProfile($_SESSION['id']);
                $data['title'] = 'My Profile';

                $this->load->view('templates/header',$data);
                $this->load->view('user_profile',$data);
                $this->load->view('templates/footer');
            }
        }
    }