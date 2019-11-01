
<?php 
    include("index.php");
?>
<?php	
	if( isset($_POST['toyid']) ){
    
    $sql = "DELETE FROM Toyproduct WHERE toyid = :toyid";
    $stmt= $pdo->prepare($sql);
    $stmt->bindValue(':toyid', $_POST['toyid'], PDO::PARAM_INT);
