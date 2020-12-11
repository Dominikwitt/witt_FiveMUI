<?php
session_start();
include( "config.php" );
if(isset($_POST['formconnexion'])) {
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);
   if(!empty($mailconnect) AND !empty($mdpconnect)) {
      $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND motdepasse = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['mail'] = $userinfo['mail'];
         header("Location: index.php?id=".$_SESSION['id']);
      } else {
         $erreur = "Deine E-Mail Addresse oder dein Passwort ist Falsch!";
      }
   } else {
      $erreur = "Fülle Bitte Alle Felder aus sonst wird das hier nix!";
   }
}
?>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <h2><b><font color="black">Herzlich Willkommen im L.A.P.D Intranet!</b></font><h2>  
      <link rel="stylesheet" href="css/style.css">  
</head>
<body>
<style>	body {
	background-color: blue;	}
</style>
  <body class="align">
  <div class="grid">
<form method="POST" action="" class="form login">
      <header class="login__header">
	    <img src="/images/logo.png"width="250" height="250">
        <h3 class="login__title">LAPD Intranet</h3>
      </header>
      <div class="login__body">
        <div class="form__field">
          <input type="email" name ="mailconnect" placeholder="E-Mail Addresse">
        </div>
        <div class="form__field">
          <input type="password" name="mdpconnect" placeholder="Passwort">
        </div>
      </div>
      <footer class="login__footer">
        <input type="submit" value="Login" name="formconnexion">

        <p><span class="icon icon--info">?</span><a href="#"><b><font color="red">Ich habe mein Passwort Vergessen!</b></font></a></p>
      </footer>
      <div><b><font color="blue">Wenn du noch keine Login Daten Hast wende dich an deinen Ausbilder!</b></font></div>
    </form>
<?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
  </div>
</body>
</body>
</html>