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
	var head = 'head='+document.getElementById("head").value;	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange=function(){
	  if (xmlhttp.readyState==4 && xmlhttp.status==200){
	    response.innerHTML='<a href="/'+xmlhttp.responseText+'.txt">'+xmlhttp.responseText+'.txt</a>';
	  }
	}
	xmlhttp.open("POST","write.php",true);
        //Must add this request header to XMLHttpRequest request for POST
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send( "head= "+head+
              "&data= "+data); 
}

function addElement() {
  var ni = document.getElementById('myDiv');
  var numi = document.getElementById('theValue');
  var num = (document.getElementById('theValue').value -1)+ 2;
  numi.value = num;
  var newdiv = document.createElement('div');
  var divIdName = 'my'+num+'Div';
  newdiv.setAttribute('id',divIdName);
  //newdiv.innerHTML=str;
  
  newdiv.innerHTML = 'Element Number '+num+' has been added! <a href=\'#\' onclick=\'removeElement('+divIdName+')\'>Remove the div "'+divIdName+'"</a>';
  ni.appendChild(newdiv);
 
}