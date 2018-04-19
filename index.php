<!--------------------------------------------------------------------------------------------------

	index.php
	
	This is the main page to capture students assistance in class.
	Here, a teacher logs in and starts capturing 

--------------------------------------------------------------------------------------------------->
<!DOCTYPE html>
<html>
	<!--
		Load the page to adapt to the viewport on any devices
	-->
	<meta 
		name = "viewport" 
		content = "width = device-width, initial-scale = 1.0">
		
		<head>
			<!--
				Load script file
				Loads the functions for this page
			-->
			<script 
				type = "text/javascript" 
				src = "../js/home_login.js?v=1.7">
			</script>
			
			<!--
				Load the stylesheet
				This stylesheet contains:
				>> Buttons styling
				>> Paragraphs and text styling
				>> Custom formularies
			-->
			<link
				rel = "stylesheet"
				type = "text/css"
				href = "../css/UAD-main-style.css?v=2.4">
				
			<!--
				Page title on Chrome, Firefox tabs
			-->
			<title>
				Intranet UAD
			</title>
		</head>
		
		 <!--
			The page performs the function RealTimeClock
			This function is defined on file "UAD-realtime-clock.js"			
		 -->
		<body>
		<br>
			<!--
				Page main heading 
			-->
			<center>
			
				<!--
					This heading shows the title of the page
				-->
				<h1
					id = "uad_heading_01"
					align = "center"
					style = "font-size:56px">
					Universidad de Artes Digitales
				</h1>
			</center>
			
			<center>
			
				<!--
					Instructions for the user to know what to do
					They tell the user which profile he will enter: As a student, a teacher or a member of the staff
				-->
				<p
					class = "uad_text"
					align = "center"
					style = "font-size:24px">		
					Selecciona tu tipo de perfil para ingresar...
				</p>
			</center>
			
			<br><br><br>
			
			<div
				class = "row">
				<div
					class = "col"
					align = "center">
					<input
						class = "uad_button"
						type = "button"
						style = "font-size: 48px"
						value = "PROFESOR"
						onclick = "OpenTeachersHub()"
					>
				</div>
				<div
					class = "col"
					align = "center">
					<input
						class = "uad_button"
						type = "button"
						style = "font-size: 48px"
						value = "STAFF"
						onclick = "OpenStaffHub()"
					>
				</div>
			</div>
			
			<br><br><br><br>
			
			<div
				class = "row">
				<div
					class = "col"
					align = "center">
					<input
						class = "uad_button"
						type = "button"
						style = "font-size: 48px"
						value = "ALUMNO"
						onclick = "OpenStudentsLogin()"
					>
				</div>
			</div>
			
			<!--
				Footer of the page
				Shows the information of the school, and the year of development
			-->
			<div
				class = "uad_footer">
				Universidad de Artes Digitales &copy 2018 - Guadalajara, Jalisco, M&eacutexico
			</div>
		</body>
</html>