/*******************************************************************************************************************************************

	UAD-password-login.js
	
	This script was created for Universidad de Artes Digitales Intranet System
	January 11 2018 - MANUEL SANTOS RAMÓN [ManuSanRam]
	Calculate and show real time
	
*******************************************************************************************************************************************/
/*******************************************************************************************************************************************

	Real time clock on screen

*******************************************************************************************************************************************/
function RealTimeClock()
{
	/* Save current date */
    var today = new Date();
	
	/* Split date into format */
	var M = today.getMonth() + 1;	// Show month of the year
	var D = today.getDate();		// Show day of the month
	var Y = today.getFullYear();	// Show year
	
    var h = today.getHours();		// Show hour
    var m = today.getMinutes();		// Show minutes
    var s = today.getSeconds();		// Show seconds
	
	/* Format time to show in two digits */
	h = CheckTime(h); // Put a zero before one-digit hours
    m = CheckTime(m); // Put a zero before one digit minutes
    s = CheckTime(s); // Put a zero before one digit seconds

	/* PM time */ 
	if(h > 12)
	{
		// Show time as 01:00 pm
		h -= 12;
		document.getElementById('realTimeClock').innerHTML = h + ":" + m + ":" + s + " pm";
    }
	
	/* AM time */
	else
	{
		if (h == 0)
		{
			// Show time as 12:00 am
			h = 12;
		}
		// Print regular AM time
		document.getElementById('realTimeClock').innerHTML = h + ":" + m + ":" + s + " am";
	}
	
	/* Display date in a string */
	var dayOweek;		// Display day of the week on text string
	var monthOyear;		// Display month of the year on text string
	
	/* Display day of the week formatted */
	switch(new Date().getDay())
	{
		// Sunday
		case 0:
			// Display Sunday on a string
			dayOweek = "Domingo";
		break;

		// Monday
		case 1:
			// Display Monday on a string
			dayOweek = "Lunes";
		break;
		
		// Tuesday
		case 2:
			// Display Tuesday on a string
			dayOweek = "Martes";
		break;
		
		// Wednesday
		case 3:
			// Display Wednesday on a string
			dayOweek = "Miércoles";
		break;
		
		// Thursday
		case 4:
			// Display Thursday on a string
			dayOweek = "Jueves";
		break;
		
		// Friday
		case 5:
			// Display Friday on a string
			dayOweek = "Viernes";
		break;
		
		// Saturday
		case 6:
			// Display Saturday on a string
			dayOweek = "Sábado";
		break;
	}
	
	/* Display month formatted */
	switch(new Date().getMonth())
	{
		// January
		case 0:
			// Display month on a string
			monthOyear = "Enero";
		break;

		// Febreaury
		case 1:
			// Display month on a string
			monthOyear = "Febrero";
		break;
		
		// March
		case 2:
			// Display month on a string
			monthOyear = "Marzo";
		break;
		
		// April
		case 3:
			// Display month on a string
			monthOyear = "Abril";
		break;
		
		// May
		case 4:
			// Display month on a string
			monthOyear = "Mayo";
		break;
		
		// June
		case 5:
			// Display month on a string
			monthOyear = "Junio";
		break;
		
		// July
		case 6:
			// Display month on a string
			monthOyear = "Julio";
		break;
		
		// August
		case 7:
			// Display month on a string
			monthOyear = "Agosto";
		break;
		
		// September (Do you remember?)
		case 8:
			// Display month on a string
			monthOyear = "Septiembre";
		break;
		
		// October
		case 9:
			// Display month on a string
			monthOyear = "Octubre";
		break;
		
		// November
		case 10:
			// Display month on a string
			monthOyear = "Noviembre";
		break;
		
		// December
		case 11:
			// Display month on a string
			monthOyear = "Diciembre";
		break;
	}
	
	// Write string to HTML page
	document.getElementById('todayDate').innerHTML = dayOweek + ", " + D + " de " + monthOyear + " del " + Y;
	
	// Recursive call, to update clock
	var t = setTimeout(RealTimeClock, 500);
}

/*******************************************************************************************************************************************

	Check if time is one digit or two digits

*******************************************************************************************************************************************/
function CheckTime(i)
{
	/* Check if time is less than 10 */
    if (i < 10) 
	{
		/* Format time to two digits */
		i = "0" + i;
	}
	
	/* Return formatted time */
    return i;
}

/*******************************************************************************************************************************************

	Login function.
	Access to a given URL after a condition is met

*******************************************************************************************************************************************/
function LogIn(URL)
{
	/*  */
	var PasswordElement = document.getElementById('prof_password');
	/*  */
	var a = document.createElement('a');
	
	/*  */
	if(PasswordElement.value.length < 4)
	{
		/*  */
		alert("¡Contraseña incompleta!");
	}
	
	/*  */
	else
	{
		/*  */
		location.href = URL;
	}
}

/*******************************************************************************************************************************************

	Show or hide the login password

*******************************************************************************************************************************************/
function HideShowPassword()
{
	/*  */
	var PasswordElement = document.getElementById('prof_password');
	
	/*  */
	if(PasswordElement.type == "password")
	{
		/*  */
		PasswordElement.type = "text";
	}
	
	/*  */
	else
	{
		/*  */
		PasswordElement.type = "password";
	}
	
}

/*******************************************************************************************************************************************

	Add a new character to the string 

*******************************************************************************************************************************************/
function InsertPassword(val)
{
	/*  */
	var Input = document.getElementById('prof_password'), length = Input.value.length;
	
	/*  */
	if(length < 4)
	{
		/*  */
		Input.value = Input.value + val;
	}
}

/*******************************************************************************************************************************************

	Backspace on password string

*******************************************************************************************************************************************/
function ErasePassword()
{
	/* Get the value from the password input */
	var Input = document.getElementById('prof_password'), Length = Input.value.length;
	
	/*  */
	var NewString = Input.value.slice(0, Length - 1);
	
	/*  */
	Input.value = NewString;
}

/*******************************************************************************************************************************************

	Clear the password string from the input bar

*******************************************************************************************************************************************/
function ClearPassword()
{
	/*  */
	var Input = document.getElementById('prof_password');
	
	/*  */
	Input.value = "";
}

/*



*/
