<?php

/** @property CI_DB $db 
 * 
 */

class ToDoModel extends CI_Model{
    //Crud sur la table ToDo
    //Create
    //Read
    //Update
    //Delete
    //Minimum à mettre en place pour toute les bases de données
   
    public function __construct() {
        parent::__construct();
    }
    
    public function get_By_Id($id){
        return $this->db->get_where('ToDo',array('id'=>$id))->row_object();
    }
    
    public function get_all (){
        $this->db->order_by('ordre');
        return $this->db->get('ToDo')->result_object();
    }
    
    public function add ($params){
        $this->db->insert('ToDo',$params);
    }
    
    public function delete($id){
        $this->db->delete('ToDo',array('id',$id));
    }
    
    public function update($id,$params){
        $this->db->where('id',$id);
        $this->db->update('ToDo',$params);
    }
    
   

}