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
				src = "../js/UAD-password-login.js?v=1.8">
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
				href = "../css/UAD-main-style.css?v=2.3">
				
			<!--
				Page title on Chrome, Firefox tabs
			-->
			<title>
				Inicio de sesión
			</title>
		</head>
		
		 <!--
			The page performs the function RealTimeClock
			This function is defined on file "UAD-realtime-clock.js"			
		 -->
		<body onload = "RealTimeClock()">
			<!--
				Page main heading 
			-->
			<center>
			
				<!--
					This heading shows the title of the page
					This heading uses the style "uad_heading_01"
				-->
				<h1
					id = "uad_heading_01"
					align = "center"
					style = "font-size:56px">
					Inicio de sesión
				</h1>
			</center>
			
			<center>
			
				<!--
					A subtitle, indicating the user what to do
				-->
				<p
					class = "uad_text"
					align = "center"
					style = "font-size:24px">		
					Introduzca su clave de profesor para iniciar sesión...
				</p>
			</center>
			
			<br>
			
			<!--
				Formulary inputs
			-->
			<form>
				<!--
					This class denotes a row, grouping divs in a horizontal line
				-->
				<div
					class = "row">
					
					<!--
						This class denotes a column
						A group of elements vertically aligned 
					-->
					<div
						class = "col"
						align = "center">
						
						<!--
							Password bar
							Password is captured here by the number buttons
						-->
						<input
							id = "prof_password"				
							class = "uad_password_input"
							type = "password"
							required
							disabled = "disabled"
							placeholder = "Clave..."
							maxlength = "4">
						
						<br><br>
						
						<!--
							Log In button
							After inserting a password, log in with the teacher username
						-->
						<input
							class = "uad_form_button"
							type = "button"
							onclick = "LogIn('../php/uad_asist_class.php')"
							value = "I N I C I A R">
						
						<!--
							Eye button
							Serves to show or hide the password
						-->
						<input
							class = "uad_eyeicon_button"
							onclick = "HideShowPassword()"
							type = "button">
	
					</div>
					
					<br><br>
					
					<!--
						This class denotes a column
						A group of elements vertically aligned 
					-->
					<div
						class = "col"
						align = "center">
						
						<!--
							Number 1 button
						-->
						<input
							class = "uad_num_button"
							type = "button"
							onclick = "InsertPassword('1')"
							value = "1">			
						
						<!--
							Number 2 button
						-->
						<input
							class = "uad_num_button"
							type = "button"
							onclick = "InsertPassword('2')"
							value = "2">
						
						<!--
							Number 3 button
						-->
						<input
							class = "uad_num_button"
							type = "button"
							onclick = "InsertPassword('3')"
							value = "3">
					
						<br>
					
					
						<!--
							Number 4 button
						-->
						<input
							class = "uad_num_button"
							type = "button"
							onclick = "InsertPassword('4')"
							value = "4">			
						
						<!--
							Number 5 button
						-->
						<input
							class = "uad_num_button"
							type = "button"
							onclick = "InsertPassword('5')"
							value = "5">
						
						<!--
							Number 6 button
						-->
						<input
							class = "uad_num_button"
							type = "button"
							onclick = "InsertPassword('6')"
							value = "6">
					
						<br>
					
					
						<!--
							Number 7 button
						-->
						<input
							class = "uad_num_button"
							type = "button"
							onclick = "InsertPassword('7')"
							value = "7">			
						
						<!--
							Number 8 button
						-->
						<input
							class = "uad_num_button"
							type = "button"
							onclick = "InsertPassword('8')"
							value = "8">
						
						<!--
							Number 9 button
						-->
						<input
							class = "uad_num_button"
							type = "button"
							onclick = "InsertPassword('9')"
							value = "9">
							
						<br>
					
					
						<!--
							Backspace button
						-->
						<input
							class = "uad_del_button"
							type = "button"
							onclick = "ErasePassword()"
							value = "<">
						<!-- &#8592; -->
						
						<!--
							Number 0 button
						-->
						<input
							class = "uad_num_button"
							type = "button"
							onclick = "InsertPassword('0')"
							value = "0">
						
						<!--
							Clear password input button
						-->
						<input
							class = "uad_clear_button"
							type = "button"
							onclick = "ClearPassword()"
							value = "C">
					</div>
				</div>
			</form>
			
			<br>
			
			<!--
				Real-time clock
				Shows a real time clock on screen
			-->
			<div
				class = "uad_text"
				id = "realTimeClock"
				align = "center"
				style = "font-size:76px">
			</div>
			
			<br>
			
			<!--
				Real-time Date
				Shows today's date in a format
			-->
			<div
				class = "uad_text"
				id = "todayDate"
				align = "center"
				style = "font-size:32px">
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