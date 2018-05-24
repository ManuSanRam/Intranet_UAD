<!--
********************************************************************************************************************************************

	uad_asist_class.html
	
	This is the main page to capture students assistance in class.
	Here, a teacher logs in and starts capturing 

********************************************************************************************************************************************
-->
<?php
	// Start the session for capturing absent students
	session_start();
?>
<!DOCTYPE html>
<html>

	<!--
	****************************************************************************************************************************************
		Load the character set
	****************************************************************************************************************************************
	-->
	<meta
		http-equiv="Content-Type"
		content="text/html; charset=utf-8"/>
		
		<!--
		***************************************************************************
			Page head
		***************************************************************************
		-->
		<head>
		
			<!--
			***********************************************************************
				Load the JavaScript script
				- Functions to show
			***********************************************************************
			-->
			<script
				type = "text/javascript"
				src = "/js/teacher_capture_assist.js?v=1.7">
			</script>
		
			<!--
			***********************************************************************
				Load this page's stylesheet
			***********************************************************************
			-->
			<link
				rel = "stylesheet"
				type = "text/css"
				href = "/css/UAD-assisthub-style.css?v=4.3">
		
			<!--
			***********************************************************************
				Load the main stylesheet
			***********************************************************************
			-->
			<link
				rel = "stylesheet"
				type = "text/css"
				href = "/css/UAD-main-style.css?v=2.4">
		
			<!--
			***********************************************************************
				Page title
				Title of the tab
			***********************************************************************
			-->
			<title>
				Toma de asistencias
			</title>
		</head>
		
		<!--
		***************************************************************************
			Body of the page 
		***************************************************************************
		-->
		<body onload = "AssistMain()">
			<?php
				/***************************************************************************************************************************
					PHP code starts here...
				***************************************************************************************************************************/
				//
				header("Content-Type: text/html;charset=utf-8");
				
				
				
				/***************************************************************************************************************************
					Variables to save querys for different purposes:
					- #1 Query to obtain the class ID number
					- #2 Qury to obtain the 
					- #3
				***************************************************************************************************************************/
				$class_id_query = ""; //
				$career_logo_query = ""; //
				$students_query = ""; //
				
				
				
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
							style = 'font-size:44px;'>
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
					// Tell
					printf("Error cargando el conjunto de caracteres utf8: %s\n", $connection->error);
					
					// 
					$connection->close();
					
					//
					exit();
				}
			?>
			
			<?php
				// Set the time zone to get the time correctly
				date_default_timezone_set('America/Mexico_City'); 
				
				// Get the current day of the week as an int number
				// Formatted as {Monday = 1, Tuesday = 2, Wednesday = 3, Thursday = 4, Friday = 5, Saturday = 6}
				$_SESSION['DayOfWeek'] = date('w');
				
				/***************************************************************************************************************************
					Query ID number of the class that:
					- Matches the teacher that logged in.
					- Matches the current day of the week.
					- It's equal or past the start time of the class.
					- It's not after the end time of the class.
				***************************************************************************************************************************/
				$class_id_query = 
				"SELECT
						id_materia,
						bloque,
						hora_inicio,
						hora_termino,
						aula
					FROM
						horarios
					WHERE
						matricula_prof = '" . $_SESSION['TeacherID'] . "'
						AND dia_semana = " . $_SESSION['DayOfWeek'] . "
						AND hora_inicio <= TIME(NOW())
						AND hora_termino > TIME(NOW())";
				
				// Save query result, if any was found, on var 
				$class_id_result = $connection->query($class_id_query);
				
				/***************************************************************************************************************************
					Check if matching result was found to be posted 
				***************************************************************************************************************************/
				// Result TRUE: The query returned a result
				if ($class_id_result->num_rows > 0) 
				{
					// Fetch the associated data if any was found
					while($row = $class_id_result->fetch_assoc()) 
					{
						// Save the results to the current session
						$_SESSION['ClassID'] = $row['id_materia']; //
						$_SESSION['ClassStartTime'] = $row['hora_inicio']; //
						$_SESSION['ClassEndTime'] = $row['hora_termino']; //
						$_SESSION['ClassBlock'] = $row['bloque']; //
						$_SESSION['CurrentClassroom'] = $row['aula'];
					}
				}
				
				// Result FALSE: The query returned zero results
				else
				{	
					// Warn user of error 
					echo 
						"<div 
							class = 'row'>
							<div
								class = 'col'
								align = 'center'>
								<img
									src = '/media/image/uad_logo.png'
									align = 'center'
									width = '413px'
									height = 'auto'>
							</div>
					
							<div 
								class = 'col' 
								align = 'center'>
								<p 
									class = 'uad_text'
									align = 'center'
									style = 'font-size:72px;'>
									Buen día
								</p>
								
								<p 
									class = 'uad_text'
									align = 'center'
									style = 'font-size:44px;'>
									" . $_SESSION['TeacherName'] . "
								</p>
							</div>
							
							<div
								class = 'col'
								align = 'center'>
							</div>
						</div>
						
						<div
							class = 'row'>
							<div
								class = 'col'
								align = 'center'>
								<p 
									class = 'uad_text'
									align = 'center'
									style = 'font-size:42px;'>
									En este momento no tiene asistencias que capturar.
								</p>
							</div>
						</div>
						
						<div
							class = 'row'>
							<div
								class = 'col'
								align = 'center'>
								<form 
									action = '/'>
									<input
										class = 'uad_form_button'
										type = 'submit' 
										value = 'Página principal'>
								</form>
							</div>
						</div>";
					
					// End connection to database
					$connection->close();
					
					// Terminate session
					
					// End script
					exit();
				}
				
				/***************************************************************************************************************************
					Career logo query.
					Logo on ny part of the system
				***************************************************************************************************************************/
				// Query for the class information
				$career_logo_query = 
				"SELECT
					nombre,
					cuatrimestre
				FROM
					materias
				WHERE
					id = '" . $_SESSION['ClassID'] . "'
				AND
					carrera = '" . $_SESSION['TeacherCareer'] . "'";
				
				// Save query result, if any was found, on var 
				$career_logo_result = $connection->query($career_logo_query);
				
				/***************************************************************************************************************************
					
				***************************************************************************************************************************/
				// Check if matching result was found to be posted
				if ($career_logo_result->num_rows > 0) 
				{
					// Fetch the associated data if any was found
					while($row = $career_logo_result->fetch_assoc()) 
					{
						//
						$_SESSION['ClassName'] = $row['nombre']; //
						$_SESSION['ClassPeriod'] = $row['cuatrimestre']; //
					}
				}
			?>
			
			<br><br><br>
			
			<!--
				
			-->
			<div>
			
				<!--
					1st row: Page main information
				-->
				<div
					class = "row">
					
					<!--
						1st column: UAD logo.
						Show the university's logo.
						This one is more for formalities, other than anything else
					-->
					<div
						class = "col"
						align = "center">
						
						<!--
							Display the university's logo
							Check path "../Intranet_UAD/media/image/" for logo
						-->
						<img
							src = "/media/image/uad_logo.png"
							align = "center"
							width = "413px"
							height = "auto">
					</div>
					
					<!--
						2nd column: WELCOME TO THE USER
						Display a greeting message to the teacher.
						Values change depending on the user who logged in
					-->
					<div
						class = "col"
						align = "center">
						
						<!--
							Display a simple greeting to the user
						-->
						<h1
							id = "uad_heading_01"
							align = "center"
							style = "font-size:72px;">
							Buen día
						</h1>
						
						<!--
							Display the user's name
							Value changes depending on logged user
						-->
						<p
							class = "uad_text"
							align = "center"
							style = "font-size:44px;">
							<?php
								//
								echo $_SESSION['TeacherName']; 
							?>
						</p>
					</div>
					
					<!--
						3rd column: CAREER LOGO
						Show an image of the class' career.
						Changes depending on the career the class belongs.
						
						Values are:
						- IDV : Ingenieria en Desarrollo de Videojuegos
						- LDDA : Lic. en Diseño y Desarrollo de Aplicaciones
						- LA : Lic. en Animación
						- LPA : Lic. en Producción Audiovisual
						
						Check path "../Intranet/media/image/" for the career logos
					-->
					<div
						class = "col"
						align = "center">
						
						<!--
							Display the university's logo
							Check path "../Intranet_UAD/media/image/" for logo
						-->
						<img
							align = "center"
							width = "auto"
							height = "auto"
							src = "/media/image/<?php
									
									//
									echo $_SESSION['TeacherCareer'] 
								?>_logo.png" alt = "Logotipo de <?php 
									
									//
									echo $_SESSION['TeacherCareer']; 
								?>">
					</div>
				</div>
				
				<br>
				
				<!--
					2nd row: INFO DISPLAY
					- Class name. Info to display to teacher, changes depending on time.
					- Date info. Display to user and used to insert data on ABSENCE table on database
					- Student buttons. Click to set student as NOT PRESENT.
					- Click again to unmark as NOT PRESENT.
				-->
				<div
					class = "row">
					
					<!--
						1st column: CAPTURE ASSISTANCES
						- Save the assistance data on the table.
					-->
					<div
						class = "col"
						align = "center">
						
						<!--
							Display the time on screen
						-->
						<div
							id = "ClockDisplay"
							class = "uad_text"
							align = "center"
							style = "font-size: 48px;">
						</div>
						
						<br>
						
						<!--
							Display the date on screen
						-->
						<div
							id = "DateDisplay"
							class = "uad_text"
							align = "center"
							style = "font-size: 24px"
						>
						</div>
					</div>
					
					<!--
						2nd column: CAPTURE ASSISTANCES
						- Display the name of the 
					-->
					<div
						class = "col"
						align = "center">
						
						<!--
						-->
						<div
							class = "uad_text"
							align = "center"
							style = "font-size: 48px;">
							<?php
								//
								echo $_SESSION['ClassName'];
							?>
						</div>
						
						<br>
						
						<!--
						-->
						<div
							class = "uad_text"
							align = "center"
							style = "font-size: 24px">
							Hora de inicio:  
							<?php
								//
								echo $_SESSION['ClassStartTime'];
							?>
						</div>
						
						<!--
						-->
						<div
							class = "uad_text"
							align = "center"
							style = "font-size: 24px">
							Hora de termino:  
							<?php
								//
								echo $_SESSION['ClassEndTime'];
							?>
						</div>
						
						<br>
						
						<!--
						-->
						<div
							class = "uad_text"
							align = "center"
							style = "font-size: 24px">
							Bloque:  
							<?php
								//
								echo $_SESSION['ClassBlock'];
							?>
						</div>
							
						<div
							class = "uad_text"
							align = "center"
							style = "font-size: 24px">
							Aula:  
							<?php
								//
								echo $_SESSION['CurrentClassroom'];
							?>
						</div>
					</div>	
				</div>
				
				<br><br><br><br><br>
				
				<!--
					
				-->
				<div
					class = "row">
					
					<!--
						
					-->
					<div
						class = "col"
						align = "center">
						
						<!--
							
						-->
						<p
							class = "uad_text"
							align = "center"
							style = "font-size:24px">
							Para registrar una falta, toque la caja junto al nombre del estudiante ausente
						</p>
					</div>
				</div>
				
				<!--
					This form sends out 
				-->
				<form
					action = "/php/asistencias/captured_class.php"
					method = "post">
					<?php
					// Here we control the buttons to get the information to present the pages
					// Here we will...
					/*
						1- Load a new 
					*/
					$students_query = 
					"SELECT 
						matricula, 
						nombre 
					FROM 
						alumnos 
					WHERE 
						carrera = '" . $_SESSION['TeacherCareer'] . "' 
					AND 
						cuatrimestre_activo = '" . $_SESSION['ClassPeriod'] . "'";
					
					//
					$students_result = $connection->query($students_query);
					
					/*
						
					*/
					// Check if matching result was found to be posted
					if ($students_result->num_rows > 0) 
					{
						// Fetch the associated data if any was found
						while($row = $students_result->fetch_assoc()) 
						{
							$_index = 0;
							// Create checkboxes inputs_ when checked, student with given ID is currently marked as absent
							// This means that the date and the students ID will be registered to the database and student's total absences will be added 1 per block
							echo 
								"<div 
									class = 'row'>
									<div 
										class = 'col' 
										align = 'center'>
											<input type = 'checkbox' id = 'student_" . $_index . "' name = '" . $row['matricula'] . "'>
											<label class = 'checkbox-custom-label' for = '" . $row['matricula'] . "' >" . $row['nombre'] . "</label>
									</div>
								</div>";
						}
					} 
					
					//
					else 
					{	
						// 
						echo 
						"<div 
							class = 'row'>
							<div 
								class = 'col' 
								align = 'center'>
								<p 
									class = 'uad_text'
									align = 'center'
									style = 'font-size:44px;'>
									Student list is currently unavailable
								</p>
							</div>
						</div>";
						
						$connection->close();
						
						//
						exit();
					}
				?>
				
				<br><br><br>
				
					<!--
						3rd row: INFO DISPLAY
						- Class name. Info to display to teacher, changes depending on time.
						- Date info. Display to user and used to insert data on ABSENCE table on database
						- Student buttons. Click to set student as NOT PRESENT.
						- Click again to unmark as NOT PRESENT.
					-->
					<div
						class = "row">
						<!--
							1st column: CAPTURE ASSISTANCES
							- Save the assistance data on the table.
						-->
						<div
							class = "col"
							align = "center">
							<!--
								1st column: CAPTURE ASSISTANCES
								- Save the assistance data on the table.
							-->
							<input
								class = "uad_form_button"
								type = "submit"
								align = "center"
								value = "Capturar">
						</div>
					</div>
				</form>
			</div>
			
			<!--
				Footer of the page
				Shows the information of the school, and the year of development
			-->
			<div
				class = "uad_footer">
				Universidad de Artes Digitales &copy 2018 - Guadalajara, Jalisco, México
			</div>
			
			<br><br><br><br><br><br><br>
			
			<?php
				$connection->close();
			?>
		</body>
</html>