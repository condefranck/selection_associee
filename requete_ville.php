<?php
    require_once("config.php");

    // Creation et envoi de la requete
    $id = $_GET['id'];
    $query = "SELECT * FROM ville WHERE id_pays = $id ORDER BY nom_ville";
    $result = mysql_query($query);
    sleep(1);
    while ($row = mysql_fetch_assoc($result)){
        $data[] = $row;
    }

    echo json_encode(array('ville' => $data));
?>