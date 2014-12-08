<%-- 
    Document   : alg
    Author     : Mariam
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <h1>Hello World!</h1>
        <?php
       
          /**
          * Definition de la classe trajet 
          */
          class Trajet 
          {
            var $depart;
            var $arrivee;
            var $date_depart;
            var $date_arrivee;
            var $duree_train;
            var $duree_avion;
            var $duree_covoit;
            var $duree_voit;
            var $compagnie_avion;
            var $prix_train;
            var $prix_avion;
            var $prix_covoit;
            var $co2;
              
              function __construct($tdepart,$tarrivee,$da_depart,$da_arrivee,$d_train,$d_avion,$d_covoit,$compagnie,$p_avion,$p_train,$p_covoit,$pco2)
              {
                    $depart = $tdepart;
                    $arrivee = $tarrivee;
                    $date_depart = $depart;
                    $date_arrivee = $arrivee;
                    $duree_train = $d_train;
                    $duree_avion = $d_avion;
                    $duree_covoit = $d_covoit;
                    $compagnie_avion = $c_avion;
                    $prix_train = $p_train;
                    $prix_avion = $p_avion ;
                    $prix_covoit = $p_covoit;
                    $co2 = $pco2;
              }


             function prixTrajet()
              {
                   return  $prix_train + $prix_avion + $prix_covoit;
              }

          }

          function covertionToSecond($str_time){
            sscanf($str_time, "%d:%d:%d", $hours, $minutes, $seconds);

            $time_seconds = isset($seconds) ? $hours * 3600 + $minutes * 60 + $seconds : $hours * 60 + $minutes;

            return $time_seconds;
          }

          function choix($pref_covoit, $pref_train, $pref_avion)
              {

                // La liste des trajets conforme 
                 $trajets = array();

                //Base de donnée 
                $db_host="localhost";
                $db_usr="root";
                $db_password="moovite";
                $db_name="moovite";
                 // conexion à  la base de données
                      
                $connexion = mysql_connect($db_host,$db_usr) or die("Impossible de se connecter à  la base de donnée");
                 mysql_select_db($db_name,$connexion);
                $query = "select * from voyage v where v.depart = "+$depart+ " and v.arrivee = " +$arrivee;
                $result = mysql_query($query); 
                $NbreData = mysql_num_rows($result);


                //la boucle de recherche de trajets conforme 
                while($voyage = mysql_fetch_array($result)){

                    $duree_tain = covertionToSecond($voyage["duree_train"]);
                    $duree_covoit = covertionToSecond($voyage["duree_covoit"]);
                    $duree_avion = covertionToSecond($voyage["duree_avion"]);
                    $dureet= $duree_avion+ $duree_covoit + $duree_train ; // la duree totale du trajet 
                    $part_train = ((100* $duree_train)/ $dureet);                       // la part de duree en train
                    $part_covoit = ((100* $duree_covoit)/ $dureet);                     // la part de duree en covoiturage
                    $part_avion = ((100* $duree_avion)/ $dureet);                       // la part de duree en avion
                    $conforme= ($part_train <= $pref_train) && ($part_covoit <= $pref_covoit) && ($part_avion <= $pref_avion);
                    
                   if($conforme){ // quand le trajet est conforme 
                    $trajet = Trajet($voyage["depart"],$voyage["arrivee"],$voyage["datedepart"],$voyage["datearrivee"],$voyage["duree_train"],$voyage["duree_avion"],
                                    $voyage["duree_covoit"],$voyage["compagnie_avion"],$voyage["prix_avion"],$voyage["prix_avion"],$voyage["prix_covoit"],$voyage["co2"]);
                    $trajets[] = $trajet;

                   }
              }
              return $trajets; // on retourne la liste des trajets conformes
            }




        ?>
    </body>
</html>