<?php

/* Affiche données ministage */
function get_MS(){
    global $mysqli;

    $rqt = 'SELECT m.idministage as id, tf.nom_typeformation as typeformation, f.nom_formation as formation, f.idformation as idformation, p.civilite, p.idProf as idprof, p.nom_prof as nomProf, date as dateUS, DATE_FORMAT(date, "%d-%m-%Y") AS dateFR, 
    hdebut, hfin, nbplace, lieu
    FROM t_ministage as m 
    INNER JOIN t_formation as f ON m.idformation = f.idformation
    INNER JOIN t_typeformation as tf ON f.idtypeform = tf.idtypeform
    INNER JOIN t_professeur as p ON p.idProf = m.idProf
    WHERE m.idministage = '.$_GET['id'].'';

    $tab = mysqli_query($mysqli, $rqt) or exit(mysqli_error($mysqli));
    $MS = $tab->fetch_assoc();

    return $MS;
}

// Requete pour la mise à jour d'un ministage et du professeur associé
function updateMS(){
    global $mysqli;

    $rqt = 'UPDATE t_ministage m
            INNER JOIN t_professeur p ON m.idProf = p.idProf
            SET m.date = STR_TO_DATE("'.$_POST['date'].'", "%d-%m-%Y"),
                m.hdebut = "'.$_POST['heure1'].'",
                m.hfin = "'.$_POST['heure2'].'",
                m.nbplace = '.$_POST['place'].',
                m.lieu = "'.$_POST['lieu'].'",
                p.civilite = "'.$_POST['civilite'].'",
                p.nom_prof = "'.$_POST['nomprof'].'"
            WHERE m.idministage = "'.$_POST['id'].'"';

    $result = mysqli_query($mysqli, $rqt);
    if (!$result) {
        echo 'Erreur SQL : ' . mysqli_error($mysqli);
    } else {
        echo 'Mise à jour réussie !';
    }
}

?>
