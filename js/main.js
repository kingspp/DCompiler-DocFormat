str =  '   <div class="container">  '  + 
 '   			<div class="col-md-5">  '  + 
 '   				<div class="form-area">    '  + 
 '   					<form role="form">  '  + 
 '   						<br style="clear:both">  '  + 
 '   						<h3 style="margin-bottom: 25px; text-align: center;">Block 1</h3>  '  + 
 '   						<div class="form-group">  '  + 
 '   							<input type="text" class="form-control" id="name" name="name" placeholder="Heading" required>  '  + 
 '   						</div>						  '  + 
 '   						<div class="form-group">  '  + 
 '   							<textarea class="form-control" type="textarea" id="message" placeholder="Content" rows="15"></textarea>    '  + 
 '   						</div>             '  + 
 '   						<button type="button" id="submit" name="submit" class="btn btn-primary pull-right">Save</button>  '  + 
 '   					</form>  '  + 
 '   				</div>  '  + 
 '   			</div>  '  + 
 '  		</div>  ' ;
 
function addTextBox(){
var element = document.createElement("input");
element.setAttribute("type", "text");
element.setAttribute("value", "");
element.setAttribute("name", "Test Name");
element.setAttribute("style", "width:200px");
var foo = document.getElementById("filterContent");
foo.appendChild(element);
}

function addElement() {
  var ni = document.getElementById('myDiv');
  var numi = document.getElementById('theValue');
  var num = (document.getElementById('theValue').value -1)+ 2;
  numi.value = num;
  var newdiv = document.createElement('div');
  var divIdName = 'my'+num+'Div';
  newdiv.setAttribute('id',divIdName);  
  newdiv.innerHTML = 'Element Number '+num+' has been added! <a href=\'#\' onclick=\'removeElement('+divIdName+')\'>Remove the div "'+divIdName+'"</a>';
  ni.appendChild(newdiv); 
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