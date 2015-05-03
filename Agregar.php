
    <?php
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $date = $_POST["date"];
    $country = $_POST["country"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $user = $_POST["user"];
    $pass = $_POST["pass"];
       

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydb";

    try 
    {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        // sql to create table
       /* $sql = "CREATE TABLE Persons (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        date VARCHAR(30) NOT NULL,
        country VARCHAR(30),
        sex VARCHAR(10),
        email VARCHAR(50),
        user VARCHAR(50),
        password VARCHAR(50),
        reg_date TIMESTAMP
        )"; 

        // use exec() because no results are returned
        $conn->exec($sql);
        echo "Table Persons created successfully";  */

        $sql = "INSERT INTO Persons (firstname, lastname, date, country, gender, email, user, password)
        VALUES ('$firstname', '$lastname', '$date', '$country', '$gender', '$email', '$user', '$pass')";

        // use exec() because no results are returned
        $conn->exec($sql);
        echo 'New record created successfully <br> <a href="Index.php">Volver</a>'; 
    }
    catch(PDOException $e)
    {
        // roll back the transaction if something failed
        //$conn->rollback();
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
?> 

