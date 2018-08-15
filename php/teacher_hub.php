<!--
********************************************************************************************************************************************

	teacher_hub.php
	
	This is the main page to capture students assistance in class.
	Here, a teacher logs in and starts capturing 

********************************************************************************************************************************************
-->
<?php
	// Start the session from log-in screen
	session_start();
?>
<!DOCTYPE html>
<html>
	<!--
	****************************************************************************************************************************************
		Load the page to adapt to the viewport on any devices
	****************************************************************************************************************************************
	-->
	<meta 
		http-equiv="Content-Type"
		content="text/html; charset=utf-8"
		name = "viewport" 
		content = "width = device-width, initial-scale = 1.0">
		
		<head>
			<!--
			***********************************************************************
				Load script file
				Loads the functions for this page
			***********************************************************************
			-->
			<script 
				type = "text/javascript" 
				src = "../js/teacher_hub.js?v=1.3">
			</script>
			
			<!--
			***********************************************************************
				Load the stylesheet
				This stylesheet contains:
				>> Buttons styling
				>> Paragraphs and text styling
				>> Custom formularies
			***********************************************************************
			-->
			<link
				rel = "stylesheet"
				type = "text/css"
				href = "../css/UAD-main-style.css?v=2.5">
			
			<link
				rel = "stylesheet"
				type = "text/css"
				href = "../css/UAD-assisthub-style.css?v=4.3">
			
			<!--
			***********************************************************************
				Page title on Chrome, Firefox tabs
			***********************************************************************
			-->
			<title>
				Profesores - Inicio
			</title>
		</head>
		
		<!--
		************************************************************************************************************************************
			The page performs the function RealTimeClock
			This function is defined on file 'UAD-realtime-clock.js'
		************************************************************************************************************************************
		 -->
		<body>
		<?php
			/*******************************************************************************************************************************
				PHP code starts here...
			*******************************************************************************************************************************/
			// Set the character set 
			header("Content-Type: text/html;charset=utf-8");
			
			// SQL query to search for teachers on PROFESORES table
			$teacher_query = "";
			
			/*******************************************************************************************************************************
				Check if data posted from teacher_assistance_login.php was loaded succesfully
			*******************************************************************************************************************************/
			// Posted data arrived succesfully
			if(isset($_POST['TeacherLogIn']))
			{
				// Save the teacher's code on variable to check with SQL query
				$_SESSION['TeacherCode'] = $_POST['TeacherLogIn'];
			}
			
			// Posted data couldn't be retrieved
			else
			{
				// Warn user about error with POST
				echo
				"
					<p 
						class = 'uad_text' 
						align = 'center' 
						style = 'font-size:44px;'>
							No se recibio información del formulario
					</p>
				";
				
				// Button to return to main page (index)
				echo 
				"
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
					</div>
				";
				
				// Empty the session's variables
				session_unset();
				
				// Destroy the session
				session_destroy();
				
				// Exit the script
				exit();
			}
			
			/*******************************************************************************************************************************
				Start the connection to database
			*******************************************************************************************************************************/
			$servername = "localhost"; // Server name: this case localhost, change when mounted
			$username = "root"; // User name for access
			$password = ""; // password for accesing th databases
			$dbname = "uad_personnel"; // Name of database to access
			
			// Connect to database
			$connection = new mysqli($servername, $username, $password, $dbname);
			
			/*******************************************************************************************************************************
				Check if connection was done correctly
			*******************************************************************************************************************************/
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
				
				// Close connection to database
				$connection->close();
				
				// Empty session variables
				session_unset();
				
				// Terminate session
				session_destroy();
				
				// Stop execution of web page
				exit();
			}
			
			/*******************************************************************************************************************************
				Check if character set was set for the connection
			*******************************************************************************************************************************/
			if (!$connection->set_charset("utf8")) 
			{
				// Tell user there was error setting charset
				printf("Error cargando el conjunto de caracteres utf8: %s\n", $connection->error);
				
				// Close connection to database
				$connection->close();
				
				// Empty session variables
				session_unset();
				
				// Terminate session
				session_destroy();
				
				// End script
				exit();
			}
			
			
			/*******************************************************************************************************************************
				Perform the query on PROFESORES
				- User gets the teacher's:
					+ ID number.
					+ Name.
					+ Career.
				- That matches with the code typed on login.
			*******************************************************************************************************************************/
			$teacher_query = 
				"SELECT
					matricula,
					nombre,
					carrera
				FROM
					profesores
				WHERE
					clave = '" . $_SESSION['TeacherCode'] . "'";
				
				// Save query result, if any was found, on var 
				$teacher_result = $connection->query($teacher_query);
				
				/***************************************************************************************************************************
					Check if there was any result found on the table.
				***************************************************************************************************************************/
				// Check if matching result was found to be posted
				if ($teacher_result->num_rows > 0) 
				{
					// Fetch the associated data if any was found
					while($row = $teacher_result->fetch_assoc()) 
					{
						// Save the results 
						$_SESSION['TeacherID'] = $row['matricula'];
						$_SESSION['TeacherName'] = $row['nombre'];
						$_SESSION['TeacherCareer'] = $row['carrera'];
					}
				} 
				
				else 
				{
					// Show user error screen, indicating no teacher was found.
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
								<h1
									class = 'uad_heading_01'
									align = 'center'
									style = 'font-size:72px;'>
										Lo sentimos...
								</h1>
								
								
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
										No se encuentra su registro en la base de datos
								</p>
							</div>
						</div>
						
						<br><br><br><br><br>
						
						<div
							class = 'row'>
							<div
								class = 'col'
								align = 'center'>
								<form 
									action = '/php/teacher_login.php'>
									<input
										class = 'uad_form_button'
										type = 'submit' 
										value = 'Reintentar'>
								</form>
								
								<form 
									action = '/'>
									<input
										class = 'uad_form_button'
										type = 'submit' 
										value = 'Página principal'>
								</form>
							</div>
						</div>
					";
						
					// Close the connection to database
					$connection->close();
					
					// Empty the session's variables
					session_unset();
					
					// Terminate session
					session_destroy();
					
					// Exit the script
					exit();
				}
			
		?>
		
			<br>
				
			<!--
			****************************************************************************************************************************
				Display a simple greeting to the teacher
			****************************************************************************************************************************
			-->
			<div
				class = "row">
				<div
					class = "col"
					align = "left">
				</div>
				
				<div
					class = "col"
					align = "center">
					
					<!--
					***************************************************************
						
					***************************************************************
					-->
					<h1
						class = "uad_heading_01"
						align = "left"
						style = 
						"
							font-size:60px; 
							animation-name: vanish-down-entrance; 
							animation-duration: 1.6s;
							transition: transform 1.6s ease-in-out;
						">
							<?php
								// Get current time
								// Set the time zone to get the time correctly
								date_default_timezone_set('America/Mexico_City');
								
								$_Morning = "05:00:00";
								$_Afternoon = "12:00:00";
								$_Evening = "19:00:00";
								
								// Get time to print different message
								// Before 12:00 pm, print "Buenos dias"
								if(time() >= strtotime($_Morning) && time() < strtotime($_Afternoon))
								{
									echo "Buenos dias";
								}
								
								// Between 12:00 pm and 07:00 pm, print "Buenas tardes"
								else if(time() >= strtotime($_Afternoon) && time() < strtotime($_Evening))
								{
									echo "Buenas tardes";
								}
								
								// After 07:00 pm and before 05:00 am, print "Buenas noches"
								else
								{
									echo "Buenas noches";
								}
							?>
					</h1>
					
					<!--
					***************************************************************
					
					***************************************************************
					-->
					<p
						class = "uad_text"
						align = "left"
						style = 
						"
							font-size:32px;
							animation-name: vanish-down-entrance; 
							animation-duration: 1.6s;
							transition: transform 1.6s ease-in-out;
						">
						<?php
							//
							echo $_SESSION['TeacherName']; 
						?>
					</p>
				</div>
				
				<div
					class = "col"
					align = "right">
					<!--
					***************************************************************
						Display the university's logo
						Check path "../Intranet_UAD/media/image/" for logo.
					***************************************************************
					-->
					<img
						align = "center"
						width = "auto"
						height = "auto"
						style = 
						"
							animation-name: vanish-down-entrance; 
							animation-duration: 1.6s;
							transition: transform 1.6s ease-in-out;
						;"
						src = "/media/image/
						<?php
							//
							echo $_SESSION['TeacherCareer'] 
							?>_logo.png" alt = "Logotipo de <?php 
							
							//
							echo $_SESSION['TeacherCareer']; 
						?>">
				</div>
				
				<div
					class = "col"
					align = "right">
				</div>
			</div>
			
			<br><br><br>
			
			<!--
			***********************************************************************
				Teacher presentation
			***********************************************************************
			-->
			<div
				class = "row">
				<!--
				*******************************************************************
					1st column: UAD logo.
					Show the university's logo.
					This one is more for formalities, other than anything else.
				*******************************************************************
				-->
				<div
					class = "col"
					align = "center">
					
					<!--
					***************************************************************
						Display the university's logo
						Check path "../Intranet_UAD/media/image/" for logo.
					***************************************************************
					-->
					<img
						class = "uad_logo"
						src = "/media/image/uad_logo.png"
						style = "animation-duration : 2.1s;"
						align = "center"
						width = "513px"
						height = "auto">
				</div>
				
				<!--
				*******************************************************************
					Show teacher's name on screen
				*******************************************************************
				-->
				
				<!--
				*******************************************************************
					Teacher selects an action:
					+ Capture the students' assistance for today's class.
					+ Capture grades for this 4-month period
				*******************************************************************
				-->
				<div
					class = "col"
					align = "center"
					style = "animation-name: vanish-down-entrance; 
							animation-duration: 1.6s;
							transition: transform 1.6s ease-in-out;">
						<!--
						***********************************************************
							Subtitle of the section
						***********************************************************
						-->
						<p
							align = "center"
							class = "uad_text"
							style = 
							"
								font-size:36px
								animation-name: vanish-down-entrance; 
								animation-duration: 1.6s;
								transition: transform 1.6s ease-in-out;
							">
								Seleccione una acción
						</p>
						
						<br><br>
						
						<!--
						***********************************************************
							Capture assistances
						***********************************************************
						-->
						<input
							class = "uad_button"
							type = "submit"
							style = "font-size: 36px"
							value = "Asistencias"
							onclick = "OpenClassAssistances()">
							
						<br>
							
						<!--
						***********************************************************
							Capture grades
						***********************************************************
						-->
						<input
							class = "uad_button"
							type = "button"
							style = "font-size: 36px"
							value = "Calificaciones"
							onclick = "OpenClassGrades()">
				</div>
			</div>
			
			<!--
			********************************************************************************************************************************
				Footer of the page
				Shows the information of the school, and the year of development
			********************************************************************************************************************************
			-->
			<div
				class = "uad_footer">
					Universidad de Artes Digitales &copy 2018 - Guadalajara, Jalisco, M&eacutexico
			</div>
		</body>
</html>