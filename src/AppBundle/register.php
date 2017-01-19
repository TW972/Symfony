<?php include('includes/config.php'); 
if(isset($_POST['envoyer']) {
	if(isset($_POST['name']) AND isset($_POST['surname']) AND isset($_POST['dateNaiss']) AND isset($_POST['adress']) AND isset($_POST['pseudo']) AND isset($_POST['motdepasse']) AND !empty($_POST['motdepasse2']) AND isset($_POST['email'])
	{
	// Tous les champs ont été remplis

//N'oublie de continuer quand le problème sera résolu ****
$pseudo = mysql_escape_string($_POST['pseudo']);
$motdepasse = mysql_escape_string(md5($_POST['motdepasse']));
$motdepasse2 = mysql_escape_string(md5($_POST['motdepasse2']));
$nom = mysql_escape_string(($_POST['nom']));
$prenom =  mysql_escape_string($_POST['surname']);
$datedenaissance = mysql_escape_string($_POST['dateNaiss']);

$longueur_pseudo = strlen($pseudo) ;
if($longueur_pseudo <= 30)
{
	//Le pseudo respecte le format
if($motdepasse == motdepasse2)
{
	//Les mdp sont identiques
//Ici aussi il faut continuer *****	
mysql_query('INSERT INTO liste_licencies VALUE(" " , ".$name." , ".$surname." , ".motdepasse. " , " " , " " , " " , " " )' ;
$succes = ' Le compte a correctement été créé ! Vous pouvez maintenant vous connecter en cliquant <a href = "login.php">ici</a>';
}
else
{
$erreur = 'Le mot de passe et le mot de passe de confirmation ne correspondent pas';
}
}
else
{
$erreur = 'Le pseudo est trop long (max : 30)';
}

}

else
{
$erreur = "Tous les champs sont obligatoires.";
}
}

?>
<h1> Créer un compte </h1>
<?php if(isset($erreur) { echo $erreur ;} ?>
<?php if(isset($succes) { echo $succes ;} ?>
<hr />

<form action="register.php" method="POST">

Nom :<input type="text" name="name" /><br />
Prenom :<input type="text" name="surname" /><br />
Date de naissance :<input type="text" name="dateNaiss" /><br />
Adresse :<input type="text" name="adress" /><br />
Pseudo:<input type="text" name="pseudo" /><br />
Mot de passe :<input type="password" name="motdepasse" /><br />
Mot de passe confirmation :<input type="password" name="motdepasse2" /><br />
Email :<input type="text" name="email" /><br />
<input type="submit" name="envoyer" value="S'inscrire" /> 
</form>