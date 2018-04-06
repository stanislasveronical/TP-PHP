<!doctype html>
<head> 
    <title>Liste des billets</title>
</head>
<body>
        <?php echo $titre ?>
        <?php foreach ($les_billets as $billet){
            echo $billet['message'];
            echo "<a href=".base_url('Billets/lu/'.$billet['id']);
        }
        ?>
</body>
</html>