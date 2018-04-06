<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo validation_errors();

//Formulaire de saisie
echo form_open(base_url('ToDo/update/'.$id));

echo form_label('id : ','id');
echo form_input('id',  set_value('id',$id)).'</br>';

echo form_label('tâche : ','task');
echo form_input('task',  set_value('task',$task)).'</br>';

echo form_submit('Modifier','Modifier');

echo form_close();