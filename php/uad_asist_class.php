<!--------------------------------------------------------------------------------------------------

	uad_asist_class.html
	
	This is the main page to capture students assistance in class.
	Here, a teacher logs in and starts capturing 

--------------------------------------------------------------------------------------------------->
<!DOCTYPE html>
<html>

	<!--
		Load the character set
	-->
	<meta
		charset = "UTF-8">
		
		<!--
			Page head
		-->
		<head>
		
			<!--
				Load the JavaScript script
				- Functions to show 
			-->
			<script
				type = "text/javascript"
				src = "../js/UAD-capture-assistance.js?v=1.4">
			</script>
		
			<!--
				Load this page's stylesheet
			-->
			<link
				rel = "stylesheet"
				type = "text/css"
				href = "../css/UAD-assisthub-style.css?v=3.1">
		
			<!--
				Load the main stylesheet
			-->
			<link
				rel = "stylesheet"
				type = "text/css"
				href = "../css/UAD-main-style.css?v=2.4">
		
			<!--
				Page title
				Title for the tabs
			-->
			<title>
				Toma de asistencias
			</title>
		</head>
		
		<!--
			Body of the page 
		-->
		<body onload = "CurrentTimeDate()">
			
			<div>
			
				<!--
					1st row: 
				-->
				<div
					class = "row">
					
					<!--
						1st column:
					-->
					<div
						class = "col"
						align = "center">
						
						<!--
							Display the university's logo
							Check path "../Intranet_UAD/media/image/" for logo
						-->
						<img
							src = "../media/image/uad_logo.png"
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
							¡Buen dia!
						</h1>
						
						<!--
							Display the user's name
							Value changes depending on logged user
						-->
						<p
							class = "uad_text"
							align = "center"
							style = "font-size:44px;">
							Hector Manuel Gómez Gutiérrez
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
							src = "../media/image/idv_logo.png"
							align = "center"
							width = "auto"
							height = "auto">
					</div>
				</div>
				
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
						<div
							id = "ClockDisplay"
							class = "uad_text"
							align = "center"
							style = "font-size: 48px;">
						</div>
					</div>
					
					<!--
						2nd column: CAPTURE ASSISTANCES
						- Save the assistance data on the table.
					-->
					<div
						class = "col"
						align = "center">
						<div
							class = "uad_text"
							align = "center"
							style = "font-size: 48px;">
							Fundamentos de Fisica I
						</div>	
					</div>	
				</div>
				
				<br><br>
				
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
							class = "uad_long_button"
							type = "button"
							align = "center"
							value = "Capturar">
					</div>
				</div>
				
			</div>
			
			
			
			<!--
				Footer of the page
				Shows the information of the school, and the year of development
			-->
			<div
				class = "uad_footer">
				Universidad de Artes Digitales &copy 2018 - Guadalajara, Jalisco, México
			</div>
		</body>
</html>