
<?php
require_once "pdo.php";
if (isset($_POST['Title'] )){
$title= $_REQUEST["Title"];
$vision= $_REQUEST["Vision"];

$insertProject =$pdo->prepare("INSERT INTO Project (Title,Vision) VALUES (?,?)")->execute([$title,$vision]);
header("Location: https://kunet.kingston.ac.uk/k1809106/planningPHP/");
exit();
}

?>

                    
        

