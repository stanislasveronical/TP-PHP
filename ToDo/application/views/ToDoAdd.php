<html>
<head>
<title><?php echo 'Ajouter une nouvelle tâche' ?></title>
</head>
</html>

<?php
echo validation_errors();

//Formulaire de saisie
echo form_open(base_url('ToDo/add'));

echo form_label('ordre : ','ordre');
echo form_input('ordre',  set_value('ordre',0)).'</br>';

echo form_label('tâche : ','task');
echo form_input('task',  set_value('task','Saisir votre Tâche')).'</br>';

echo form_submit('Ajouter','Ajouter');

echo form_close();
