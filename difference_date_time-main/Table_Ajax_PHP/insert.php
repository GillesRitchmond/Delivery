<?php
$connect = mysqli_connect("localhost", "root", "", "testing");
if(isset($_POST["numero_fiche"], $_POST["envoyeur"], $_POST["receveur"], $_POST["heure_envoie"], $_POST["heure_reception"], $_POST["temps_attente"] ))
{
    $numero_fiche = mysqli_real_escape_string($connect, $_POST["numero_fiche"]);
    $envoyeur = mysqli_real_escape_string($connect, $_POST["envoyeur"]);
    $receveur = mysqli_real_escape_string($connect, $_POST["receveur"]);
    $heure_envoie = mysqli_real_escape_string($connect, $_POST["heure_envoie"]);
    $heure_reception = mysqli_real_escape_string($connect, $_POST["heure_reception"]);
    $temps_attente = mysqli_real_escape_string($connect, $_POST["temps_attente"]);

 $query = "INSERT INTO tbl_user('numero_fiche', 'envoyeur', 'heure_envoie', 'receveur', 'heure_reception', 'temps_attente')
            VALUES($numero_fiche, $envoyeur, $heure_envoie, $receveur, $heure_reception, $temps_attente )";
    if(mysqli_query($connect, $query))
    {
    echo 'Enregistrement réussi';
    }
}
?>