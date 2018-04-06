<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo validation_errors();

//Formulaire de saisie
echo form_open(base_url('ToDo/delete'));

echo form_label('id : ','id');
echo form_input('id',  set_value('id', $id)).'</br>';

echo form_submit('Supprimer','Supprimer');

echo form_close();