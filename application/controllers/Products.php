<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Nur.769
 * Date: 9/8/2018
 * Time: 10:48 AM
 */

class Products extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Product'],true);
    }

    public function index()
    {
        $data['products'] = $this->Product->get_list();
        $this->load->view("Products/index",$data);
    }

    public function add()
    {
        if($_POST){
            $data = $this->input->post();  //$this->pr($data);
            $uploadOK = 1;
            if(!empty($_FILES['image']['name'])){
                $uploadOK = $this->do_upload();
            }

            if($uploadOK){
                $data['image'] = $_FILES['image']['name'];
                if($this->Product->add($data))
                {
                    redirect('Products/index');
                }
            }

        }
        $data['action'] = 'add';
        $this->load->view("Products/save",$data);
    }

    function do_upload(){
//        $this->pr($_FILES['image']);
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
                $uploadOk = 0;
            }
        }
        return $uploadOk;
    }

    public function edit($id){
        if($_POST){
            $data = $this->input->post();  //$this->pr($data);
            $uploadOK = 1;
            if(!empty($_FILES['image']['name'])){
                $uploadOK = $this->do_upload();
            }

            if($uploadOK){
                $data['image'] = $_FILES['image']['name'];
                if($this->Product->add($data))
                {
                    redirect('Products/index');
                }
            }

        }
        $data['action'] = 'edit/'.$id;
        $data['row'] = $this->Product->read($id);
        $this->load->view("Products/save",$data);
    }

}