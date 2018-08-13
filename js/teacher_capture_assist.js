/*******************************************************************************************************************************************

	UAD-capture-assistance.js
	
	This script was created for Universidad de Artes Digitales Intranet System
	January 11 2018 - MANUEL SANTOS RAMÓN [ManuSanRam]
	Calculate and show real time
	
*******************************************************************************************************************************************/
/*******************************************************************************************************************************************

	Real time clock on screen

*******************************************************************************************************************************************/
function RTTime()
{
	/* Save current date */
    var today = new Date();
	
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
		document.getElementById('ClockDisplay').innerHTML = h + ":" + m + ":" + s + " pm";
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
		document.getElementById('ClockDisplay').innerHTML = h + ":" + m + ":" + s + " am";
	}
	
	// Recursive call, to update clock
	var t = setTimeout(RTTime, 500);
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

	Returns the date of today

*******************************************************************************************************************************************/
function RTDate()
{
	/* Save current date */
    var today = new Date();
	
	/* Split date into format */
	var M = today.getMonth() + 1;	// Show month of the year
	var D = today.getDate();		// Show day of the month
	var Y = today.getFullYear();	// Show year
	var monthOyear;
	
	/* Display month formatted */
	switch(M)
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
	document.getElementById('DateDisplay').innerHTML = D + " de " + monthOyear + " del " + Y;
	
	// Recursive call, to update clock
	var t = setTimeout(RTDate, 500);
}

/*******************************************************************************************************************************************

	Performs function to display the real time button

*******************************************************************************************************************************************/
function AssistMain()
{
	RTTime();
	RTDate();
}
