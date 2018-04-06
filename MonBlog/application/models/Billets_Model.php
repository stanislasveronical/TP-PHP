<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Billets_Model
 *
 * @author adminSio
 */
class Billets_Model extends CI_Model{
    //put your code here
    private $count;
    
    function __construct(){
        parent::Model();
        $this->count=0;
    }
    
    function findAll(){
        $query = $this->db->get('Billets');
        $this->count=$query->num_rows();
        return $query->result();
    }
    function find($id){
        $query = $this->db->get('Billets');
        $this->db->where('id',$id);
        return $query->row();
    }
    
    function getCount(){
        return $this->count;
    }
    
    function add($data){
        $this->db->insert('Billets',$data);
        return $this->db->inser_id();        
    }
    
    function update($id,$data){
        $this->db->where('id',$id);
        $this->db->update('billets',$data);
    }
    
    function delete($id){
        $this->db->delete('Billets',array('id'=>$id));
    }
    
    function nonLus(){
        $this->db->where('lu',0);
        $this->db->order_by('id');
        $query=$this->db->get('Billets');
        return $query->result();
    }
}