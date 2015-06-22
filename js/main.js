function addTextBox(){
var element = document.createElement("input");

element.setAttribute("type", "text");
element.setAttribute("value", "");
element.setAttribute("name", "Test Name");
element.setAttribute("style", "width:200px");
var foo = document.getElementById("filterContent");
foo.appendChild(element);
}

function save(){
	var response=document.getElementById("response");
	var data = 'data='+document.getElementById("data").value;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange=function(){
	  if (xmlhttp.readyState==4 && xmlhttp.status==200){
	    response.innerHTML='<a href="files/'+xmlhttp.responseText+'.txt">'+xmlhttp.responseText+'.txt</a>';
	  }
	}
	xmlhttp.open("POST","write.php",true);
        //Must add this request header to XMLHttpRequest request for POST
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send(data);
}