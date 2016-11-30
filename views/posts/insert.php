<?php
  

  	$link = mysqli_connect("localhost", "root", "", "php_mvc");

  	if($link === false){
    	die("ERROR: Could not connect. " . mysqli_connect_error());
	}


 	$id = mysqli_real_escape_string($link, $_POST['id']);
    $author = mysqli_real_escape_string($link, $_POST['author']);
    $content = mysqli_real_escape_string($link, $_POST['content']);
    //$sql = "UPDATE posts SET author = " . $author . ", content = " . $content . " WHERE id = " . $id;
    $sql = "UPDATE `posts` SET `author` = '$author', `content` = '$content' WHERE `posts`.`id` = $id";
    //mysqli_query($link, $sql)
	
	if (mysqli_query($link, $sql)) {
    	echo "Records added successfully.";
    	echo "bla bla bla";
	} else {
    	echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
    
    header("Location:/?controller=posts&action=update&id=$id");
    
  #$db = Database::getInstance();
#$mysqli = $db->getConnection(); 
#$sql_query = "SELECT foo FROM .....";
#$result = $mysqli->query($sql_query);
?>