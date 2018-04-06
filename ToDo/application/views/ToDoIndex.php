<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title><?php echo $titre ?></title>
    </head>
    <body>
        <h1 style="text-align:center;"><?php echo $titre ?></h1>
        
        <?php foreach ($LesTodos as $ToDo): ?> 
          
        <center>
            <?php echo $ToDo->task; ?>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="<?php echo base_url('ToDo/Fait/'.$ToDo->id)?>"> Fait </a>&nbsp;
        
        <?php 
        if ($ToDo->task == 'Fait'){
          echo '<strike>'.$POST['task'].'</strike>';
        }           
        //else { 
        //  echo $ToDo->task; }
        
        ?> 
        
        <a href="<?php echo base_url('ToDo/update/'.$ToDo->id)?>"> Modifier </a>&nbsp;
        <a href="<?php echo base_url('ToDo/delete/'.$ToDo->id)?>"> Supprimer </a></center><br>
        <?php endforeach; ?>
        
        
        <center><a href="<?php echo base_url('ToDo/add');?>">Ajouter</a>&nbsp;
        <a href="<?php echo base_url('ToDo/reordonner');?>">Réordonner les tâches</a></center>
    </body>
</html>

