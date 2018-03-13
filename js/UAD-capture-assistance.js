/*******************************************************************************************************************************************

	UAD-capture-assistance.js
	
	This script was created for Universidad de Artes Digitales Intranet System
	January 11 2018 - MANUEL SANTOS RAMÓN [ManuSanRam]
	Calculate and show real time
	
*******************************************************************************************************************************************/
/*******************************************************************************************************************************************

	Real time clock on screen

*******************************************************************************************************************************************/
function CurrentTimeDate()
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
	var t = setTimeout(CurrentTimeDate, 500);
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