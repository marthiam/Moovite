<?php include("algo.php"); ?>  
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Page test</title>
    </head>
    <body>
        <h1>Test de l' algorithme</h1>
        
        <?php var $voyage = new  Trajet("nice","toronto");

            $voyage -> choix(0,50,50);

            echo "le voyage".$voyage;

        ?>  



    </body>
</html>
