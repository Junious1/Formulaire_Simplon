<?php
    include("connexion_bd.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Participants</title>
    <link rel="stylesheet" href="../css/liste_participant.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>

    <body >
    <div>
        <h1>Liste des Participants</h1>
        <a href="../index.php">S'inscricre</a>
    </div>
    <hr>

        <table class="table">
                <thead>
                    <tr id="header">
                    <th>Noms</th>
                    <th>Prenoms</th>
                    <th>Email</th>
                    <th>Contact</th>
                    </tr>
                </thead>
                    <?php

                        $participants =$db->query('SELECT * FROM participant');
                        foreach ($participants as $val => $participant)
                        {
                    ?>

                <tbody>
                    <tr>
                        <td data-label ="Nom"><?php echo($participant['Nom'])?></td>
                        <td data-label ="Prenom"><?php echo($participant['Prenom'])?></td>
                        <td data-label ="Mail"><?php echo($participant['Mail'])?></td>
                        <td data-label ="Contact"><?php echo($participant['Num'])?></td>
                    </tr>
                </tbody>
                <?php  }?>
        </table>
</body>
</html>