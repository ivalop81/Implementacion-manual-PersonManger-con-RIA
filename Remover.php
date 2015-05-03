<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/le-frog/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
	
  <link rel="stylesheet" href="jquery-validation-1.13.1/demo/css/screen.css">	
  <script src="//cdn.jsdelivr.net/jquery.validation/1.13.1/jquery.validate.js"></script>
</head>
<body>
<?php
    $id = $_POST["id"];      
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydb";

    try 
    {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "DELETE FROM Persons WHERE id=$id";

        // use exec() because no results are returned
        $conn->exec($sql);
        echo "La persona con el Id = $id  se ha removido del sistema <br> <a href=\"\Index.php\"\>Volver</a>"; 

    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
?> 
</body>
</html>