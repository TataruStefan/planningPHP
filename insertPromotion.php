<?php
require_once "PromotionClass.php";

$db_user = "k1809106";
$db_name = "db_k1809106";
$db_password = "yak";

$type= $_REQUEST["Type"];
$coefficient= $_REQUEST["Coefficient"];
$gameID= $_REQUEST["GameID"];

$pdo = new PDO("mysql:host=kunet;dbname=$db_name", $db_user, $db_password);

$statement =$pdo->query("INSERT INTO Promotion (Type,Coefficient,GameID)VALUES ('$type','$coefficient' ,'$gameID')");
$statement->execute();
//$results = $statement->fetchAll(PDO::FETCH_CLASS,"Promotion");(Type,Coefficient,GameID)
?>
<html>
<body>
<?=$type,$coefficient ,$gameID?>
</body>
</html>