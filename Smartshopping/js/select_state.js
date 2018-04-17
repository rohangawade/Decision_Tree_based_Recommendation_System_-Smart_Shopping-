var xmlhttp; //variable is defined in javascript

function show_state(str,str1)
{
	xmlhttp=GetXmlHttpObject();
//	alert(str);
//	alert(str1);
	

	if (xmlhttp==null)
	  {
		// if xmlhttp is with no value then your browser doesnot have XMLHttpRequest object	  
		alert ("Browser does not support HTTP Request");
		return;
	  }

		var url="select.php";

	// in url variable ajaxphp.php is assigned
	url=url+"?q="+str+"&q1="+str1;
	//alert(url);
	
	xmlhttp.onreadystatechange=stateChanged_state; // here stateChanged function is called and data is stored in onreadystatechange propery which is used by xmlhttp

	//after above stage data will be collected from ajaxphp.php ,please have a look in that page
	xmlhttp.open("GET",url,true);
	xmlhttp.send();
}

function show_city(str,str1)
{
	xmlhttp=GetXmlHttpObject();

	if (xmlhttp==null)
	  {
		alert ("Browser does not support HTTP Request");
		return;
	  }

		var url="select.php";

	url=url+"?q="+str+"&q1="+str1;
	//alert(url);
	xmlhttp.onreadystatechange=stateChanged_city;

	xmlhttp.open("GET",url,true);
	xmlhttp.send();
}

function stateChanged_state()
{
	if (xmlhttp.readyState==4)
	{
		loadstate(xmlhttp.responseText)
	}
}

function stateChanged_city()
{
if (xmlhttp.readyState==4)
{
loadcity(xmlhttp.responseText)
}
}

function GetXmlHttpObject()
{
	var xmlHttp1;
	try
	{
		// Firefox, Opera 8.0+, Safari
		xmlHttp1=new XMLHttpRequest();
	}
	catch (e)
	{
	  // Internet Explorer
		try
		{
			xmlHttp1=new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch (e)
		{
			xmlHttp1=new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return xmlHttp1;
}


function loadstate(str22)
{
	sResponse =str22;

	//alert(sResponse);

	var arr1 = new Array();
	var arr2 = new Array();
	
	var oSel = document.getElementById("selstate");
	emptyDropdown1(oSel);
	
	oSel[0]  = new Option("Select State","");	
	var j = 0;

	arr1 = sResponse.split("||");
	
	//alert(arr1);

	for(i in arr1)
	{
		if(arr1[i] != "")
		{
			j++;
			arr2 = arr1[i].split("#");

		//	alert(arr2);
			
			oSel[j]  = new Option(arr2[1], arr2[0]);
		}
	}

	j++;
	oSel[j]  = new Option("Other State","other");
}

function loadcity(str22)
{
	sResponse =str22;

	var arr1 = new Array();
	var arr2 = new Array();
	
	var oSel = document.getElementById("selcity");
	emptyDropdown1(oSel);
	
	oSel[0]  = new Option("Select City","");	
	var j = 0;

	arr1 = sResponse.split("||");
	
	for(i in arr1)
	{
		if(arr1[i] != "")
		{
			j++;
			arr2 = arr1[i].split("#");
			oSel[j]  = new Option(arr2[1], arr2[0]);
		}
	}
	j++;
	oSel[j]  = new Option("Other City","other");
}

function emptyDropdown1(otherDropD)
{
		var sagar = otherDropD.length;
		for(var i = 0;i<sagar;i++)
		{
			otherDropD.remove(otherDropD.i);
		}
}