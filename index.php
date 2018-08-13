<!--
********************************************************************************************************************************************

	index.php
	
	This is the main page to capture students assistance in class.
	Here, a teacher logs in and starts capturing 

********************************************************************************************************************************************
-->
<!DOCTYPE html>
<html>
	<!--
	*******************************************************************************
		Load the page to adapt to the viewport on any devices
	*******************************************************************************
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
				src = "../js/home_login.js?v=1.8">
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
				href = "../css/UAD-main-style.css?v=2.9">
				
			<!--
			***********************************************************************
				Load a stylesheet
				This stylesheet contains:
				>> Background images.
				>> Background image animations.
			***********************************************************************
			-->
			<link
				rel = "stylesheet"
				type = "text/css"
				href = "../css/UAD-mainpage-movinglogos-anim.css?v=1.3">
				
			<!--
			***********************************************************************
				Page title
			***********************************************************************
			-->
			<title>
				Portal UAD - Página principal
			</title>
		</head>
		
		<!--
		 **************************************************************************
			The page performs the function RealTimeClock
			This function is defined on file "UAD-realtime-clock.js"
		***************************************************************************
		-->
		<body>
			<div
				class = "row">
				<div
					class = "col"
					align = "center"
					style = 
					"
						animation-name: vanish-down-entrance; 
						animation-duration: 1.9s;
						transition: transform 3s ease-in-out;
					">	
				<!--
					***********************************************************************
						This heading shows the title of the page
					***********************************************************************
					-->
					<h1
						class = "uad_heading_01"
						align = "center"
						style = "font-size:84px">
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
								else if(time() >= strtotime($_Evening))
								{
									echo "Buenas noches";
								}
						?>
					</h1>
				</div>
			</div>
			
			<br><br>
			
			<div
				class = "row">
				<div
					class = "col"
					align = "center">
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
					align = "center"
					style = 
					"
						animation-name: vanish-down-entrance; 
						animation-duration: 1.6s;
						transition: transform 1.6s ease-in-out;
					">
					
					<br><br>
					
					<!--
					***************************************************************
					
					***************************************************************
					-->
					<input
						class = "uad_button"
						type = "button"
						style = "font-size: 30px; width: 440px; background-color: #f4be41; border: 4px solid #f4be41;"
						value = "Portal Alumnos"
						onclick = "OpenStudentLogin()">
					
					<br><br>
					
					<!--
					***************************************************************
					
					***************************************************************
					-->
					<input
						class = "uad_button"
						type = "button"
						style = "font-size: 30px; width: 440px; background-color: #3eb240; border: 4px solid #3eb240;"
						value = "Portal Profesores"
						onclick = "OpenTeacherLogin()">
						
					<br><br>
					
					<!--
					***************************************************************
					
					***************************************************************
					-->
					<input
						class = "uad_button"
						type = "button"
						style = "font-size: 30px; width: 440px; background-color: #9f40b2; border: 4px solid #9f40b2;"
						value = "Portal Staff"
						onclick = "OpenStaffLogin()">
				</div>
			</div>
			
			<!--
			***********************************************************************
			***********************************************************************
			-->
			<div>
				<img
					class = "uad_background_img"
					src = "/media/image/idv_logo.png"
					width = "auto"
					height = "auto"
					style = "top: 150px; left: 100px; transform:scale(0.9, 0.9);">
			</div>
			
			<!--
			***********************************************************************
			***********************************************************************
			-->
			<div>
				<img
					class = "uad_background_img"
					src = "/media/image/la_logo.png"
					width = "auto"
					height = "auto"
					style = "top: 540px; left: 640px; transform:scale(0.9, 0.9);">
			</div>
			
			<!--
			***********************************************************************
			***********************************************************************
			-->
			<div>
				<img
					class = "uad_background_img"
					src = "/media/image/ldda_logo.png"
					width = "auto"
					height = "auto"
					style = "top: 150px; left: 640px; transform:scale(0.9, 0.9);">
			</div>
			
			<!--
			***********************************************************************
			***********************************************************************
			-->
			<div>
				<img
					class = "uad_background_img"
					src = "/media/image/lpa_logo.png"
					width = "auto"
					height = "auto"
					style = "top: 540px; left: 100px; transform:scale(0.9, 0.9);">
			</div>
			
			<br><br><br><br>
			
			<!--
			***********************************************************************
				Footer of the page
			***********************************************************************
			-->
			<div
				class = "uad_footer">
				Universidad de Artes Digitales &copy 2018 - Guadalajara, Jalisco, M&eacutexico
			</div>
		</body>
</html>