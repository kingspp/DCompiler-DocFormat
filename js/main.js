var version = "BETA v2.2.9";
var empty = 1;
var id=1;
var fileID=1;

var defT=0;
var defI=0;
$("#tableBtn").click(function(){
	if(defT==0){
        $("#rcinput").show();
		defT=1;
	}
	else{
		$("#rcinput").hide();
		defT=0;
	}
});

$("#imageBtn").click(function(){
	if(defI==0){
        $("#imginput").show();
		defI=1;
	}
	else{
		$("#imginput").hide();
		defI=0;
	}
});



$("#form-content").submit(function(event) {
      /* stop form from submitting normally */
      event.preventDefault();
      /* get some values from elements on the page: */
      var $form = $( this ),
          url = $form.attr( 'action' );
      /* Send the data using post */
      var posting = $.post( url, { head: $('#head').val(), data: $('#data').val() } );
      /* Alerts the results */
      posting.done(function( data ) {
        //alert('File save successfull');
		showFiles();
		listf()
		document.getElementsByName("head")[0].value="";
		document.getElementsByName('head')[0].placeholder='Heading';
		document.getElementsByName("data")[0].value="";
		document.getElementsByName('data')[0].placeholder='Content';
      });
    });

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

function table(){
	var table = document.getElementById("table");
	table.innerHTML=//'<form id="tableCreate">'+
	'<input type="number" style="width:40%;" class="form-control" id="rows" name="rows" placeholder="Rows" >'
	+'<input type="number" class="form-control" id="columns" name="columns" placeholder="Column" style="width:40%;">'	
	+'<button id="create" onclick="create();" class="btn btn-default btn-lg pull-right">Create</button>';
	}
		
function create() {
	var table = document.getElementById("rcinput");
	var rows = parseInt(document.getElementById('rows').value);
	var cols = parseInt(document.getElementById('columns').value);
    if (rows <= 0 || cols <= 0)
        return false;

    var html = '<form id="contact_form" action="php/table.php" method="POST" enctype="multipart/form-data">'+
	'<input type="text" class="form-control" value='+rows+' name="row"  style="background-color:#000; display:none;"><br>'
	+'<input type="text" class="form-control" value='+cols+' name="col" style="background-color:#000; display:none;"><br>'
	+'<table>';
    for (i=0;i<rows;i++) {
        html += '<tr>';
        for (j=0;j<cols;j++) {
		html += '<td>  <input type="text" class="form-control" name='+id+' size="20" id='+id+' required></td>';
		id = id+1;
        }
        html += '</tr>';		
    }
    html += '</table>'+
	'<input id="submit_button" class="btn btn-default btn-lg pull-right" type="submit" value="Save" />'+
	'</form>';
    table.innerHTML = html;
}


function loadFun() {		
        var footer=document.getElementById("footer");
		footer.innerHTML='<p class="text-center text-muted" style="font-family:Helvetica Neue,Helvetica,Arial,sans-serif; font-size:14px;"><b>'+version+'</b></p>';
		//$('#myDiv').load('php/readDir.php');
		//Not yet working
		//$("#tableCreate").submit(function(e){e.preventDefault();create();});
		showFiles();		
}		
window.onload = loadFun;