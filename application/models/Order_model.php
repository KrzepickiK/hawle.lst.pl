<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model
{
    public function add()
    {
        
    }
    
    public function get_items($user)
    {
        $this->db->select('
        it.SerialNumber,
        it.Name,
        r.Name,
        i.Quantity'
        );
        $this->db->from('inventory as i');
        $this->db->join('regionalwarehouse as r', 'r.id = i.regionalwarehouse');
        $this->db->join('user as u', 'u.login=r.userlogin');
        $this->db->join('item as it', 'i.item=i.id');
        $this->db->where('u.login', $user);
        $query=$this->db->get();
        $table=$query->result_array();
        return $table;
    }
}

?>