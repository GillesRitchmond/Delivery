<?php
$connect = mysqli_connect("localhost", "root", "", "testing");
if(isset($_POST["numero_fiche"]) AND ($_POST["envoyeur"]) AND ($_POST["heure_envoie"]) AND ($_POST["receveur"]) )
{
    // $numero_fiche = mysqli_real_escape_string($connect, $_POST["numero_fiche"]);
    // $envoyeur = mysqli_real_escape_string($connect, $_POST["envoyeur"]);
    // $receveur = mysqli_real_escape_string($connect, $_POST["receveur"]);
    // $heure_envoie = mysqli_real_escape_string($connect, $_POST["heure_envoie"]);
    // $heure_reception = mysqli_real_escape_string($connect, $_POST["heure_reception"]);
    // $temps_attente = mysqli_real_escape_string($connect, $_POST["temps_attente"]);

    // $query = "INSERT INTO tbl_user('numero_fiche', 'envoyeur', 'heure_envoie', 'receveur', 'heure_reception', 'temps_attente')
    //         VALUES($numero_fiche, $envoyeur, $heure_envoie, $receveur, $heure_reception, $temps_attente )";
    // if(mysqli_query($connect, $query))
    // {
    // echo 'Enregistrement réussi';
    // }

    try {

        $stmt = $connect->prepare(" INSERT INTO tbl_user(numero_fiche, envoyeur, heure_envoie, receveur)
                            VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $numero_fiche, $envoyeur, $heure_envoie, $receveur);
        
        $input = filter_input_array(INPUT_POST);

        $numero_fiche = mysqli_real_escape_string($connect, $input["numero_fiche"]);
        $envoyeur = mysqli_real_escape_string($connect, $input["envoyeur"]);
        $receveur = mysqli_real_escape_string($connect, $input["receveur"]);
        $heure_envoie = mysqli_real_escape_string($connect, $input["heure_envoie"]);
        // $heure_reception = mysqli_real_escape_string($connect, $input["heure_reception"]);
        // $temps_attente = mysqli_real_escape_string($connect, $input["temps_attente"]);

        if($stmt->execute()){
            echo 'Enregistrement réussi';
        } else {
            echo 'Enregistrement echoue';
        }
        
        // $mysqli->close();
        // mysqli_query($connect, $stmt);
        // echo'<div class="alert alert-success" role="alert">
        //     Enregistrement réussi !
        //     </div>'
        // ;
    } catch(PDOException $e) {
        
        echo '<div class="alert alert-danger" role="alert">
            L\' enregistrement n\'a pas été faite  !
            </div>'
        ;
        // echo "Error: " . $e->getMessage();
    }

}
?>