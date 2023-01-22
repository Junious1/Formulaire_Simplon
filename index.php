<?php
    include("traitement/connexion_bd.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"> </script>
  <title>Formulaire D'inscription</title>
</head>
<body>

    <nav>
          <input type="checkbox" id="check">
          <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
          </label>
          <label class="logo">AWS</label>
          <ul>
            <li><a class="active" href="#">Home</a></li>
            <li><a href="traitement/liste_participant.php">Liste</a></li>
          </ul>
    </nav>
      <div class="wrapper">
        <h1> <span> Inscrivez Vous </span> </h1>
        <form action="" method="POST">
            <input type="text" placeholder="Name" name="Nom" required>
            <input type="text" placeholder="Prename" name="Prenom" required>
            <input type="Mail" placeholder="Email" name="Mail" required>
            <input type="contact" placeholder="Numero" name="Num" required>
            <button name = "submit">S'inscricre</button>
          <p>
                Cliquer ici pour voir la liste des Participants
          </p>
          <a class="list" href="traitement/liste_participant.php">Liste</a>
        </form>

      </div>


<?php

  if( isset($_POST['submit']) && !(empty($_POST['Nom'])) && !(empty($_POST['Prenom'])) && !(empty($_POST['Mail']))  && !(empty($_POST['Num'])))
  {
    $nom=trim(strtoupper($_POST['Nom']));;
    $prenom=trim(ucwords(strtolower($_POST['Prenom'])));;
    $mail= htmlentities(strtolower($_POST['Mail']));
    $num= trim($_POST['Num']);

    $sqlquery = 'SELECT COUNT(Num) FROM participant WHERE Num = :Num';
    $participantStatement = $db -> prepare($sqlquery);
    $participantStatement -> execute([
        'Num' => "$num"
    ]);
    $count = $participantStatement-> fetch();
    if ($count[0] != 0){
?>
            <script>
                let error = document.getElementById('error');
                swal ( {
                    title : " Erreur! " ,
                    text : " Ce participant existe dèjà! " ,
                    icon : "error" ,
                    button : "Merci!" ,
                  } ) ;
            </script>
<?php   }
      else{

        $sqlquery = "INSERT INTO participant(Nom, Prenom, Mail, Num)
        VALUES (:Nom, :Prenom, :Mail, :Num);";
        $insertParticpant = $db -> prepare($sqlquery);
        $insertParticpant -> execute([
            'Nom' => "$nom",
            'Prenom' => "$prenom",
            'Mail' => "$mail",
            'Num' => "$num",
        ]);?>

  <script type="text/javascript">swal ( " Validé ! " , " Vous avez été enregistré avec succès ! " , "success" )   ;</script>
<?php }
}

?>





</body>
</html>
