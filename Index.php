<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Home</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/le-frog/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
	
  <link rel="stylesheet" href="jquery-validation-1.13.1/demo/css/screen.css">	
  <script src="//cdn.jsdelivr.net/jquery.validation/1.13.1/jquery.validate.js"></script>
  <link rel="stylesheet" type="text/css"  href="Paneles de la aplicacion.css">
  <script>
      $(function() {
         $( "input[type=submit]" )
          .button()
         .click(function( ) {
         var validator = $( "#signupForm" ).validate();
       validator.form();            
       });
      });

      $(function () {
          $("#date").datepicker({
              changeYear: true,
              changeMonth: true,
              yearRange: "1970:2015"
          });
      });

      $(function () {
          var availableTags = [
           "Paraguay",
           "Argentina",
           "Brasil",
           "Uruguay",
           "Chile",
           "Estados Unidos",
           "Mexico",
           "Canada",
           "Colombia",
           "Bolivia",
           "Venezuela",
           "Peru",
           "Antillas Holandesas",
           "España",
           "Italia",
           "Portugal",
           "Ecuador",
           "Uruguay",
           "Arabia Saudita",
           "Sudafrica",
           "Belgica",
           "Suecia"
         ];
          $("#country").autocomplete({
              source: availableTags
          });
      });

      $(function () {
          $("#tabs").tabs({active: 0});
          
      });

      $(function () {
          $(document).tooltip();
      });

      $().ready(function () {
          // validate signup form on keyup and submit
          $("#signupForm").validate({
              rules: {
                  firstname: "required",
                  lastname: "required",
                  user: {
                      required: true,
                      minlength: 2
                  },
                  pass: {
                      required: true,
                      maxlength: 10,
                      minlength: 8
                  },
                  confirm_pass: {
                      required: true,
                      minlength: 8,
                      equalTo: "#pass"
                  },
                  email: {
                      required: true,
                      email: true
                  },
                  agree: "required"
              },
              messages: {
                  firstname: "Please enter your firstname",
                  lastname: "Please enter your lastname",
                  user: {
                      required: "Please enter a username",
                      minlength: "Your username must consist of at least 2 characters"
                  },
                  pass: {
                      required: "Please provide a password",
                      maxlength: "The input data must have at most 10 characters",
                      minlength: "Your password must be at least 8 characters long"
                  },
                  confirm_pass: {
                      required: "Please provide a password",
                      minlength: "Your password must be at least 5 characters long",
                      equalTo: "Please enter the same password as above"
                  },
                  email: "Please enter a valid email address",
                  agree: "Please select this field"
              }
          });
      });
      $().ready(function () {
          // validate signup form on keyup and submit

          $("#formRemove").validate({
              rules: {
                  id: {
                      required: true,
                      digits: true
                  }
              },
              messages: {
                  id: {
                      required: "This field is required",
                      digits: "Please, enter only digits"
                  }
              }
          });
      });
  </script>

</head>
<body>
<div id = "h101"><h1>Person Manager</h1></div>
<div id="tabs">
   
  <ul>
    <li><a href="#tabs-1">New Person</a></li>
    <li><a href="#tabs-2">View Persons</a></li>
    <li><a href="#tabs-3">Delete Person</a></li>
  </ul>
  <div id="tabs-1">
    <form id = "signupForm" action="Agregar.php" method="POST">
    <fieldset>     
    <legend>Por favor ingrese sus datos personales</legend>         
	<p>
		<label for="firstname">Nombre:</label><br>
		<input id="firstname" name="firstname" type="text" title="Ingresar nombre completo">
	</p>   
	<p>
		<label for="lastname">Apellido:</label><br>
		<input id="lastname" name="lastname" type="text" title="Ingresar apellido completo">
	</p>           
	<p>
		<label for="date">Fecha de nacimiento:</label><br>
		<input id="date" name="date" type="text">
	</p>    
	<p>
		<label for="country">Pais de origen:</label><br>
		<input id="country" name="country" type="text">
	</p> 
	<fieldset>
		<legend>Sexo</legend>
		<label for="gender_male">
			<input type="radio" id="gender_male" value="masculino" name="gender" required>Masculino
		</label>
		<label for="gender_female">
			<input type="radio" id="gender_female" value="femenino" name="gender">Femenino
		</label>
		
	</fieldset>
	<p>
		<label for="email">Email:</label><br>
		<input id="email" name="email" type="text">
	</p> 
	<p>
		<label for="user">Usuario:</label><br>
		<input id="user" name="user" type="text">
	</p> 
	<p>
		<label for="pass">Contraseña:</label><br>
		<input id="pass" name="pass" type="password" title="La contraseña debe contar con al menos 8 caracteres, Se recomienda ingresar caracteres alfanumericos combinados">
	</p> 
	<p>
		<label for="confirm_pass">Confirmacion de contraseña:</label><br>
		<input id="confirm_pass" name="confirm_pass" type="password">
	</p> 
	<p>
		<label for="agree">Confirms that all entries are correct?</label>
		<input type="checkbox" class="checkbox" id="agree" name="agree">
	</p>
	<p>
		<input  type="submit" value="Submit">
	</p>
    </fieldset>
    </form> 

  </div>
  <div id="tabs-2">
  <?php
    echo "<table style='border: solid 1px black;text-align:left;'>";
    echo "<tr><th>Id</th><th>Nombre</th><th>Apellido</th><th>Fecha de nacimiento</th><th>Pais</th><th>Sexo</th><th>Email</th><th>Usuario</th><th>Contraseña</th><th>Fecha de registro</th></tr>";

    class TableRows extends RecursiveIteratorIterator { 
        function __construct($it) { 
            parent::__construct($it, self::LEAVES_ONLY); 
        }

        function current() {
            return "<td style='width:150px;border:1px solid black;text-align:left;'>" . parent::current(). "</td>";
        }

        function beginChildren() { 
            echo "<tr>"; 
        } 

        function endChildren() { 
            echo "</tr>" . "\n";
        } 
    } 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydb";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM Persons"); 
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
            echo $v;
        }
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    echo "</table>";
  ?>
  </div>
  <div id="tabs-3">
    <form id="formRemove" action="Remover.php" method ="POST">
    <fieldset>
        <label for="id">Ingrese el Id de la persona que desea eliminar:</label>
        <input  id="id" name="id">
        <br/>
        <input  type="submit" value="Eliminar">
    </fieldset>
    </form> 
  </div>
    
</div>
 <div><p id ="p01">Copyright 2015 Universidad Catolica Nuestra Señora de la Asunbcion</p></div>
</body>
</html>