<?php
/**
 * Created by PhpStorm.
 * User: Nur.769
 * Date: 9/8/2018
 * Time: 10:51 AM
 */

class Product extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_list()
    {
        return $this->db->query("SELECT * FROM `products` ORDER BY `name`")->result_array();
    }

    public function add($data){
        return $this->db->insert('products',$data);
    }

    public function read($id){
        return $this->db->get_where('products',['id'=>$id])->row_array();
    }

}