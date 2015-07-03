//function to list the files
function listf(){
	$.ajax({
            type:"POST",
            url:"php/db/display.php",			
            data:{action:"showFiles"},
			dataType:"json",
            success:function(data){
				 $('#FMStatus').html("Files List");
				 $('#fileList').empty();
				 $('#delFile').empty();
				for(var i=0 ; i<data.length ; i++){				
					var ni = document.getElementById('fileList');
					var ni1 = document.getElementById('delFile');
					var newdiv = document.createElement('div');
					var newdiv1 = document.createElement('div');
					newdiv.innerHTML = '<a href="/php/db/displayData.php?head='+data[i].replace('<br/>', '')+'" id='+data[i]+' style="font-size:20px;">'+data[i]+'</a>';
					newdiv1.innerHTML= "<a onclick='delFile(\"" + data[i].replace('<br/>', '') + "\");'><i class='fa fa-trash-o' style='padding:7px;'></i></a>";
					//newdiv1.innerHTML = '<a onClick="delFile('+data[i].replace('<br/>', '')+');" id='+data[i]+'><i class="fa fa-trash-o" style="padding:7px;"></i></a>';
					ni.appendChild(newdiv); 
					ni1.appendChild(newdiv1);
				}				
            }
        });
	}

//function to delete respective files
function delFile(head){
     $.post( "../php/db/deleteData.php",{ 'head': head});	 
	 setTimeout(function(){
		listf();
		showFiles();
	 },1000);
	 
}
	


//Function to display existing files
function showFiles(){
	var myDiv = document.getElementById("myDiv");
        $.ajax({
            type:"POST",
            url:"php/db/display.php",			
            data:{action:"showFiles"},
			dataType:"json",
            success:function(data){
				$("#myDiv").empty();
				for(var i=0 ; i<data.length ; i++){				
					var ni = document.getElementById('myDiv');
					var newdiv = document.createElement('div');
					newdiv.innerHTML = '<a href="/php/db/displayData.php?head='+data[i].replace('<br/>', '')+'" id='+data[i]+'>'+data[i]+'</a>';
					ni.appendChild(newdiv); 
				}				
            }
        });
    }
	
//Function to delete all files in Database
function deleteall(){
	 $.ajax({
            type:"POST",
            url:"php/db/deleteall.php",
            data:{action:"deleteall"},
            success:function(data){
               $('#myDiv').empty();
			   $('#FMStatus').html("Files Deleted Successfully");
			   setTimeout(function(){
				$('#FMStatus').empty();
				}, 2000);
            }
        });
	}
	
//Common Ajax Function
function ajaxPHP(type, url){
	var ret;
	$.ajax({
		type:type,
		url:url,
		data:{action: "ajaxPHP"},
		success:function(data){
			alert(data);
			ret=data;
			}
		});
	return ret;
}