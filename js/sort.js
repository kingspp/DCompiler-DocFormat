 $(function() {
    $( ".column" ).sortable({
	  //items: 'div:not(#Abstract)',
	  axis: 'y',
      connectWith: ".column",
      handle: ".portlet-header",
      cancel: ".portlet-toggle",
      placeholder: "portlet-placeholder ui-corner-all",
	  update: function(event, ui) {
		var sorted = $(".column" ).sortable( "toArray" );			
			$.post( "../php/sortupDB.php",{ 'choices[]': sorted});  
        }
    });
	
	setTimeout(function(){
     $( ".portlet-toggle" ).click(function() {
      var icon = $( this );
      icon.toggleClass( "ui-icon-plusthick ui-icon-minusthick" );
      icon.closest( ".portlet" ).find( ".portlet-content" ).toggle();
    });
	
	//$( ".column" ).sortable({	items: 'div:not(#Abstract)'	});
	var sorted = $(".column" ).sortable( "toArray" );			
			$.post( "../php/sortupDB.php",{ 'choices[]': sorted}); 		
	
	},2000);
	$("#finish").click(function(){
	
		var sorted = $(".column" ).sortable( "toArray" );			
			$.post( "../php/db/insertSort.php",{ 'choices[]': sorted}); 
			//alert('ok');
			setTimeout(function(){
				window.location='/php/pword.php';
				},2000);
		
		
		});
   
	$("#ieeeF").click(function(){
		//alert("Ieee");
		$("#customForm").toggle();
	});
	
	$("#customF").click(function(){
		$("#customForm").toggle();
	});
	
	
 });
	
	var insert = document.getElementById("insert");
                /* call the php that has the php array which is json_encoded */
                $.getJSON('db/getName.php', function(data) {
                        /* data will hold the php array as a javascript object */
						for(x=0; x<data.length; x++){
                        $.each(data[x], function(key, val) {
                                //$('ul').append('<li id="' + key + '">' + val+ '</li>');
								$('#insert').append('<div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" id="'+key+'">'+
									'<div class="portlet-header ui-widget-header ui-corner-all" name="'+key+'"><span class="ui-icon ui-icon-plusthick portlet-toggle"></span>'+key+'</div>'+
									'<div class="portlet-content" style="display: none;">'+val+'</div>'+
								'</div>');
								
                        });
						}
                });
				
	 
  

		

 