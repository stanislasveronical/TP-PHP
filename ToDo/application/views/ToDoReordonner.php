<html>
    <head>
        <title><?php echo $titre ?></title>
    <body><h1 style="text-align:center;"><?php echo $titre ?></h1>
        <?php
        echo validation_errors();

//Formulaire de saisie
        echo form_open(base_url('ToDo/reordonner'));
        
        $index = 10;
        
        foreach ($LesTodos as $ToDo) {
            $this->form_validation->set_rules('ordre[]','required|numeric');
            echo "<center>";
            echo form_input('ordre',  set_value('ordre',$index));
            echo $ToDo->task;
            echo"<br>&nbsp;";
            $index = $index + 10;
        }


        echo form_submit('Reordonner', 'Reordonner');
        echo form_close();
        echo "</center>";
        
        ?>


    </body>
</head>
</html>
