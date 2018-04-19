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
				src = "../js/teacher_hub.js?v=1.2">
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
				Profesores UAD - Inicio
			</title>
		</head>
		
		 <!--
			The page performs the function RealTimeClock
			This function is defined on file "UAD-realtime-clock.js"			
		 -->
		<body>
			
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
						
						<br><br><br>
						
						<!--
							Display a simple greeting to the user
						-->
						<h1
							id = "uad_heading_01"
							align = "center"
							style = "font-size:72px;">
							Buen día
						</h1>
					</div>
					
					<!--
						
					-->
					<div
						class = "col"
						align = "center">
					</div>
					
				</div>
			</div>
			
			<!--
				
			-->
			<p
				align = "center"
				class = "uad_text"
				style = "font-size:48px">
				¿Que desea hacer en este momento?
			</p>
			
			<!--
				
			-->
			<div
				class = "row">
				
				<!--
					
				-->
				<div
					class = "col"
					align = "center">
						<input
							class = "uad_button"
							type = "submit"
							style = "font-size: 48px"
							value = "Tomar asistencias"
							onclick = "OpenClassAssistances()">
				</div>
				
				<!--
					
				-->
				<div
					class = "col"
					align = "center">
					
					<!--
						
					-->
					<input
						class = "uad_button"
						type = "button"
						style = "font-size: 48px"
						value = "Capturar calificaciones"
						onclick = "OpenClassGrades()">
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