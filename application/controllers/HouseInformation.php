<?php
/**
 * Created by PhpStorm.
 * User: YueLyu
 * Date: 11/14/15
 * Time: 9:45 PM
 */

class HouseInformation extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Houseinfo');
        $this->load->library('session');
        $this->load->helper(array('form','url'));
    }

    public function index() {
        $data['houseInformation'] = $this->Houseinfo->getHouseInformation();
    }

    public function view($id) {
        $data['id'] = $id;
        $data['houseInformation_item'] = $this->Houseinfo->getHouseInformation($id);
        $data['title'] = "House Information";

        $this->load->view('templates/header', $data);
        $this->load->view('house_information', $data);
        $this->load->view('templates/footer');
    }

    public function viewMyPosts() {
        $data['title'] = 'My Posts';
        $this->load->view('templates/header',$data);
        $this->load->view('my_posts',$data);
        $this->load->view('templates/footer');
    }

    public function myPosts() {
        $id = $_SESSION['id'];
        echo $this->Houseinfo->getMyPosts($id);
    }

    # post a new House
    public function newPost() {
      $data['title'] = "House Information";

      $this->load->view('templates/header', $data);
      $this->load->view('new_post', $data);
      $this->load->view('templates/footer');
    }

    # submit a new post
    public function submitNewPost() {
        $data['title'] = 'New Post';
        $data['houseInformation_item']=$this->Houseinfo->newPost($_SESSION['id']);
        $data['msg'] = "New a post successfully.";

        $this->load->view('templates/header',$data);
        $this->load->view('submit_new_post',$data);
        $this->load->view('templates/footer');
    }

    # delete post $id
    public function deletePost($id) {
      $data['id'] = $id;
      $data['houseInformation_item'] = $this->Houseinfo->getHouseInformation($id);
      $data['title'] = "House Information";

      $this->load->view('templates/header', $data);
      $this->load->view('delete_post', $data);
      $this->load->view('templates/footer');
    }

    # submit delete post $id, set deleteStatus = 1.
    public function submitDeletePost($id) {
        $data['id'] = $id;
        $data['title'] = 'Delete Post';
        $data['houseInformation_item']=$this->Houseinfo->deletePost($id);
        $data['msg'] = "Delete post.";

        $this->load->view('templates/header',$data);
        $this->load->view('delete_post',$data);
        $this->load->view('templates/footer');
    }

    # get information of seller
    public function getSellerInformation($id) {
      $data['id'] = $id;
      $data['sellerInformation'] = $this->Houseinfo->getSellerInformation($id);
      $data['title'] = "Seller's Information";

      $this->load->view('templates/header', $data);
      $this->load->view('get_seller_information', $data);
      $this->load->view('templates/footer');
    }

    # get average rating of a post
    public function getPostAverageRating($id) {
      $data['id'] = $id;
      $data['postAverageRating'] = $this->Houseinfo->getPostAverageRating($id);
      $data['title'] = "Average Rating";

      $this->load->view('templates/header', $data);
      $this->load->view('get_post_average_rating', $data);
      $this->load->view('templates/footer');
    }

    # get statistics of all tags
    public function getTagStatistics($id) {
      $data['id'] = $id;
      $data['tagStatistics'] = $this->Houseinfo->getTagStatistics($id);
      $data['title'] = "Statistics of Tag";

      $this->load->view('templates/header', $data);
      $this->load->view('get_tag_statistics', $data);
      $this->load->view('templates/footer');
    }

}
