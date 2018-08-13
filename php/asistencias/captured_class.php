<!--
********************************************************************************************************************************************

	captured_class.php
	
	This page retrieves the posted data from class.php
	Updates the database to register the absent students on the class' absencies table

********************************************************************************************************************************************
-->
<?php
	/* Retrieve the session variables set in the previous page */
	session_start();
?>
<!DOCTYPE HTML>
<html>
	<!--
	*******************************************************************************
		Set the page's character set and content as a HTML page
	*******************************************************************************
	-->
	<meta
		http-equiv="Content-Type"
		content="text/html; charset=utf-8"
		name = "viewport" 
		content = "width = device-width, initial-scale = 1.0"/>
		
	<!--
	*******************************************************************************
		Page head
	*******************************************************************************
	-->
	<head>
		<title>
			Profesores - ¡Asistencias capturadas!
		</title>
		<!--
		***************************************************************************
			
		***************************************************************************
		-->
		<script
			type = "text/javascript"
			src = "/js/teacher_capture_assist.js?v=1.7">
		</script>
		
		<!--
		***************************************************************************
			Main stylesheet
		***************************************************************************
		-->
		<link
			rel = "stylesheet"
			type = "text/css"
			href = "/css/UAD-main-style.css?v=2.8">
	</head>
	
	<!--
	*******************************************************************************
		Page body
	*******************************************************************************
	-->
	<body>
		<?php
			// Load the char set
			header("Content-Type: text/html; charset = utf-8");
			
			$_student_absence_insertion = "";
			
			$_student_name_query = "";
			
			$_student_insertion_result = "";
			
			// Load the database
			/***************************************************************************************************************************
				Start the connection to database
			***************************************************************************************************************************/
			$servername = "localhost"; // Server name: this case localhost, change when mounted
			$username = "root"; // User name for access
			$password = ""; // password for accesing th databases
			$dbname = "uad_personnel"; // Name of database to access
			
			// Connect to database
			$connection = new mysqli($servername, $username, $password, $dbname);
			
			/***************************************************************************************************************************
				Check if connection was done correctly
			***************************************************************************************************************************/
			// Connection had an error, so no further to continue with the script
			if($connection->connect_errno)
			{
				// Warn user of connection error
				echo 
					"<p 
						class = 'uad_text' 
						align = 'center' 
						style = 
						'
							font-size:44px;
							animation-name: vanish-down-entrance; 
							animation-duration: 1.6s;
							transition: transform 1.6s ease-in-out;
						'>
						Error al intentar conectar con la base de datos: " . $dbname . "'.
					</p>";
				
				//
				$connection->close();
				
				// Stop execution of web page
				exit();
			}
			
			/***************************************************************************************************************************
				Check if connection is set with correct character set
			***************************************************************************************************************************/
			if (!$connection->set_charset("utf8")) 
			{
				// Notify user of error 
				printf("Error cargando el conjunto de caracteres utf8: %s\n", $connection->error);
				
				// Close connection
				$connection->close();
				
				// Close page
				exit();
			}
			
			// Get student name
			$name = $_POST['student'];
			
			// If data was succesfully passed to the page
			if(isset($_POST['student']))
			{// Iterate through the students passed in _POST
				foreach($name as $student)
				{
					// Insert the registry into the table
					$_student_absence_insertion = 
					"
						INSERT INTO
							reg_faltas_" . $_SESSION['ClassID'] . " 
							(matricula_alumno, fecha_registro)
						VALUES
							('". $_POST['student'] . "', '" . date("j M Y") . "')
					";
				
					// If query was succesfull 
					if(mysqli_query($connection, $_student_absence_insertion))
					{// Notify user of correct insertion on table
						echo 
						"
							<div
								class = 'uad_msg_box'
								style = 'top: 0px; left: 0px; width: 100%; animation-duration: 3s;'>
								Registro de faltas realizado
							</div>
						";
					}
					
					else
					{// Notify user that register was unsuccesfull
						echo 
						"
							<div
								class = 'uad_error_box'
								style = 'top: 0px; left: 0px; width: 100%; animation-duration: 3s;'>
								Fallo en el registro de faltas
							</div>
						";
					}
				}
			}
			
			// No results were sent
			else
			{
				echo 
				"
					<div
						class = 'uad_msg_box'
						style = 'top: 0px; left: 0px; width: 100%; animation-duration: 3s;'>
						¡Ninguna falta registrada hoy!
					</div>
				";
			}
		
			// Open the table using class ID number	
			// Insert into the table the posted information
			
		?>
		
		<br><br><br><br><br><br>
		
		<!--
		***************************************************************************
			Tell the user that 
		***************************************************************************
		-->
		<div
			class = "row">
			<div
				class = "col"
				align = "center"
				style = "width: 80%;">
					<!--
					***********************************************************
						Display the university's logo
						Check path "../Intranet_UAD/media/image/" for logo
					***********************************************************
					-->
					<img
						class = "uad_logo"
						src = "/media/image/uad_logo.png"
						align = "center"
						width = "613px"
						height = "auto"
						style = "animation-duration : 2.1s;">
			</div>
			<div
				class = "col"
				align = "center">
				
				<!--
				*******************************************************************
				*******************************************************************
				-->
				<center>
					<table
						class = "uad_table"
						style = 
						"
							width :90%;
							animation-name: vanish-down-entrance; 
							animation-duration: 1.6s;
							transition: transform 1.6s ease-in-out;
						">
						<tr
							>
							<th
								class = "uad_head_cell"
								style = "width: 400px;"> 
								Estudiante
							</th>
							
							<th
								class = "uad_head_cell"> 
								Fecha de falta 
							</th>
							
							<th
								class = "uad_head_cell"
								style = "width: 90px;"> 
								Faltas totales 
							</th>
						</tr>
						<?php
							
						?>
					</table>
				</center>
				
				<div
					align = 'center'
					style = 
					'
						animation-name: vanish-down-entrance; 
						animation-duration: 1.6s;
						transition: transform 1.6s ease-in-out;
					'>
					<form 
						action = '/'>
						<input
							class = 'uad_form_button'
							type = 'submit' 
							value = 'Página principal'>
					</form>
				</div>
			</div>
		</div>
		
	</body>
</html>
