<?php

/** @property ToDoModel $ToDoModel
 * 
 * 
 */
// if (!defined('BASEPATH')) exit('No direct script access allowed');

class ToDo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ToDoModel');
        $this->load->helper('url','form');
        $this->load->library('form_validation');
    }

    public function index() {
        //charger les données
        $all = array();
        $all = $this->ToDoModel->get_all();
        //préparer les données pour la vue
        $data=array();
        $data['LesTodos']=$all;
        $data['titre']="Liste de mes travaux";
        //générer la vue et la restituer à l'utilisateur
        $this->load->view('ToDoIndex',$data);
    }
    
    public function Fait($id) {
        $params=array('completed'=>1);
        $this->ToDoModel->update($id,$params);
        redirect(base_url('ToDo/index'));
    } 
    
    public function update($id){
        $this->form_validation->set_rules('id','id','required|numeric');
        $this->form_validation->set_rules('task','tâche','required|max_length[66]');
        
        if($this->form_validation->run()==TRUE){
            $id=$this->input->post('id');
            $task=$this->input->post('task');
            
            $params=array('id'=>$id,'task'=>$task);
            $this->ToDoModel->update($id,$params);
            redirect(base_url('ToDo/index'));
        }
        else{
            $occ=$this->ToDoModel->get_By_Id($id);
            $data['id']=$occ->id;
            $data['task']=$occ->task;
            $this->load->view('ToDoUpdate',$data);
        }
        
    }
    
    public function delete($id){
        $this->form_validation->set_rules('id','id','required|numeric');
        
        if($this->form_validation->run()==TRUE){
            $id=$this->input->post('id');
            $params=array('id'=>$id);
            $this->ToDoModel->delete('ToDo',array('id',$id));
            //$this->ToDoModel->delete($id);
            redirect(base_url('ToDo/index'));
        }
        else{
            $occ=$this->ToDoModel->get_By_Id($id);
            $data['id']=$occ->id;
            $this->load->view('ToDoDelete',$data);
        }
    }


    public function add(){
        $this->form_validation->set_rules('ordre','ordre','required|numeric');
        $this->form_validation->set_rules('task','tâche','required|max_length[66]');
        
        if($this->form_validation->run()==TRUE){
            $task=$this->input->post('task');
            $ordre=$this->input->post('ordre');
            $params=array('task'=>$task,'ordre'=>$ordre,'completed'=>0);
            $this->ToDoModel->add($params);
            redirect(base_url('ToDo/index'));
        }
        else{
            $this->load->view('ToDoAdd');
        }
    }
    
    public function reordonner(){
        
        $all = array();
        $all = $this->ToDoModel->get_all();
        //préparer les données pour la vue
        $data=array();
        $data['LesTodos']=$all;
        $data['titre']="Réordonner mes tâches";
        
        $this->form_validation->set_rules('ordre[]','required|numeric');
        
        if($this->form_validation->run()==TRUE){
            $task=$this->input->post('ordre[]');
            $params=$this->input->nouvelOrdre;
            foreach ($LesTodos as $ToDo) {
                $this->ToDoModel->update(id,nouvelOrdre[i]);
            }
            $this->ToDo->index();
            redirect(base_url('ToDo/index'));
        }
        else{
            $this->load->view('ToDoReordonner',$data);
        }
    }
    
    
    

}
