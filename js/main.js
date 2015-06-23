var version = "BETA v2.0.2";
var empty = 1;
function save(){
	if(empty == 1){$('#myDiv').empty(); empty=0;}
	
	var response=document.getElementById("response");	
	var data = 'data='+document.getElementById("data").value;
	var head = 'head='+document.getElementById("head").value;	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange=function(){
	  if (xmlhttp.readyState==4 && xmlhttp.status==200){
		var ni = document.getElementById('myDiv');
		var newdiv = document.createElement('div');
		var divIdName = 'my'+num+'Div';
		var numi = document.getElementById('theValue');
		var num = (document.getElementById('theValue').value -1)+ 2;
		numi.value = num;
		newdiv.setAttribute('id',divIdName);		
	    newdiv.innerHTML='<a href="/'+xmlhttp.responseText+'.txt">'+xmlhttp.responseText+'.txt</a>';
		ni.appendChild(newdiv); 
		document.getElementsByName("head")[0].value="";
		document.getElementsByName('head')[0].placeholder='Heading';
		document.getElementsByName("data")[0].value="";
		document.getElementsByName('data')[0].placeholder='Content';
		
	  }
	}
	xmlhttp.open("POST","php/write.php",true);
        //Must add this request header to XMLHttpRequest request for POST
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send( "head= "+head+
              "&data= "+data); 
}

function codeAddress() {
		
        var footer=document.getElementById("footer");
		footer.innerHTML='<p class="text-center text-muted" style="font-family:Helvetica Neue,Helvetica,Arial,sans-serif; font-size:14px;"><b>'+version+'</b></p>';
		$('#myDiv').load('php/readDir.php')
        }
		
window.onload = codeAddress;