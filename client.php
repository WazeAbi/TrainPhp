<?php 
$bdd = new PDO('mysql:host=localhost;dbname=Plat', 'root', 'root');
if (isset($_POST['submit'])){
 $client = $_POST['Client'];
 $plat =$_POST['Plat'];
 $dessert =$_POST['Dessert'];
 $query=$bdd->prepare('INSERT INTO Commande (Prénom , Plat , Dessert) VALUES (:Client ,:Plat ,:Dessert)');
 $query->execute(array('Client'=>$client , 'Plat'=>$plat ,'Dessert'=>$dessert));
 $afficheAll=$bdd->query('SELECT * FROM Commande ');
 $donnees = $afficheAll->fetchAll();
foreach($donnees as $row){
   echo $row['Prénom']; 
   echo $row['Plat'];
   echo $row['Dessert'];
}
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?> "  method="post">
    <div class="Client">
        <label for="Client">Client </label>
        <input type="text" name="Client" id="Client" >
    </div>
    <div class="Plat">
        <label for="Plat">Plat </label>
        <input type="text" name="Plat" id="Plat" >
    </div>
    <div class="Dessert">
        <label for="Dessert">Dessert </label>
        <input type="text" name="Dessert" id="Dessert" >
    </div>  
    
    <div>
        <input type="submit" name="submit" value="Miam"> <input type="submit" name="modifier" value="modifier">
    </div>
    


    </form>
    
</body>
</html>

