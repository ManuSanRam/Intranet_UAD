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
				src = "../js/home_login.js?v=1.8">
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
			<br><br>
			
			<!--
				This heading shows the title of the page
			-->
			<h1
				id = "uad_heading_01"
				align = "center"
				style = "font-size:68px">
				Bienvenido/a
			</h1>
			
			<br><br><br>
			
			<div
				class = "row">
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
							width = "613px"
							height = "auto">
				</div>
				
				<div
					class = "col"
					align = "center">
					
					<!--
						Instructions for the user to know what to do
						They tell the user which profile he will enter: As a student, a teacher or a member of the staff
					-->
					<p
						class = "uad_text"
						align = "center"
						style = "font-size:24px">		
						Ingresa con tu tipo de perfil
					</p>
					
					<input
						class = "uad_button"
						type = "button"
						style = "font-size: 48px"
						value = "Portal Alumnos"
						onclick = "OpenStudentLogin()">
					
					<br><br>
					
					<input
						class = "uad_button"
						type = "button"
						style = "font-size: 48px"
						value = "Portal Profesores"
						onclick = "OpenTeacherLogin()">
						
					<br><br>
						
					<input
						class = "uad_button"
						type = "button"
						style = "font-size: 48px"
						value = "Portal Staff"
						onclick = "OpenStaffLogin()">
				</div>
			</div>
			
			<div
				class = "row">
				
			</div>
			
			<br><br><br><br>
			
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