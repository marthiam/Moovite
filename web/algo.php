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
    var $itineraire;
    var $type_trajet1;
    var $type_trajet2;
    var $co2;
      
      function __construct($tdepart,$tarrivee,$da_depart,$da_arrivee,$d_train,$d_avion,$d_covoit,$compagnie,$p_train,$p_avion,$p_covoit,$pco2,$itineraire,$type_trajet1,$type_trajet2)
      {
        
            $this->depart = $tdepart;
            $this->arrivee = $tarrivee;
            $this->date_depart = $da_depart;
            $this->date_arrivee = $da_arrivee;
            $this->duree_train = $d_train;
            $this->duree_avion = $d_avion;
            $this->duree_covoit = $d_covoit;
            $this->compagnie_avion = $compagnie;
            $this->prix_train = $p_train;
            $this->prix_avion = $p_avion ;
            $this->prix_covoit = $p_covoit;
            $this->co2 = $pco2;
            $this->itineraire = $itineraire;
            $this->type_trajet1 = $type_trajet1;
            $this->type_trajet2 =$type_trajet2;
      }


     function prixTrajet()
      {
        return  ($this->prix_train) + ($this->prix_avion) + ($this->prix_covoit);

      }

  }

  function covertionToSecond($str_time){
    sscanf($str_time, "%d:%d:%d", $hours, $minutes, $seconds);

    $time_seconds = isset($seconds) ? $hours * 3600 + $minutes * 60 + $seconds : $hours * 60 + $minutes;

    return $time_seconds;
  }

  function choix($depart, $arrivee, $pref_covoit, $pref_train, $pref_avion,$date_depart)
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
        $query = "select * from voyage where depart =  '".$depart."' and arrivee = '".$arrivee."' and datedepart >= '".$date_depart."'";
        $result = mysql_query($query); 

        $NbreData = mysql_num_rows($result);

        //la boucle de recherche de trajets conforme 
        while($voyage = mysql_fetch_array($result)){


            $duree_train = covertionToSecond($voyage["duree_train"]);
            $duree_covoit = covertionToSecond($voyage["duree_covoit"]);
            $duree_avion = covertionToSecond($voyage["duree_avion"]);
            $dureet= $duree_avion+ $duree_covoit + $duree_train ; // la duree totale du trajet 
            $part_train = ((100* $duree_train)/ $dureet);                       // la part de duree en train
            $part_covoit = ((100* $duree_covoit)/ $dureet);                     // la part de duree en covoiturage
            $part_avion = ((100* $duree_avion)/ $dureet);                       // la part de duree en avion
            $conforme= ($part_train <= $pref_train) && ($part_covoit <= $pref_covoit) && ($part_avion <= $pref_avion);


           if($conforme){ // quand le trajet est conforme 
            $trajet = new Trajet($voyage["depart"],$voyage["arrivee"],$voyage["datedepart"],$voyage["datearrivee"],$voyage["duree_train"],$voyage["duree_avion"],
                            $voyage["duree_covoit"],$voyage["compagnie_avion"],$voyage["prix_train"],$voyage["prix_avion"],$voyage["prix_covoit"],$voyage["co2"], 
                            $voyage["itineraire"],$voyage["type_trajet1"],$voyage["type_trajet2"]);
            $trajets[] = $trajet;

            /* the following are just for checking echo*/

            echo   "depart : ".$trajet->depart ."</br> ";
            echo   "arrivee : ".$trajet->arrivee ."</br> ";
            echo   "date depart : ".$trajet->date_depart ."</br> ";
            echo   "date arrivee : ".$trajet->date_arrivee ."</br> ";
            echo   "duree_train : ".$trajet->duree_train."</br> ";
            echo   "duree_avion : ".$trajet->duree_avion ."</br> ";
            echo   "duree_covoit : ".$trajet->duree_covoit."</br> ";
            echo   "compagnie_avion : ".$trajet->compagnie_avion ."</br> ";
            echo   "prix_train : ".$trajet->prix_train."</br> ";
            echo   "prix_avion : ".$trajet->prix_avion ."</br> ";
            echo   "prix_covoit : ".$trajet->prix_covoit."</br> ";
            echo   "co2 : ".$trajet->co2 ."</br> ";
            echo   "itineraire : ".$trajet->itineraire."</br> ";
            echo   "type_trajet1 : ".$trajet->type_trajet1 ."</br> ";
            echo   "type_trajet2 : ".$trajet->type_trajet2."</br> ";
            echo   "prix  trajet  : ".$trajet->prixTrajet()."</br> ";
            echo "<hr>";
           }
      }
      return $trajets; // on retourne la liste des trajets conformes
    }
?>

