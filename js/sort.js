 $(function() {
    $( ".column" ).sortable({
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
      $( ".portlet" )
      .addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
      .find( ".portlet-header" )
        .addClass( "ui-widget-header ui-corner-all" )
        .prepend( "<span class='ui-icon ui-icon-minusthick portlet-toggle'></span>");
 
    $( ".portlet-toggle" ).click(function() {
      var icon = $( this );
      icon.toggleClass( "ui-icon-minusthick ui-icon-plusthick" );
      icon.closest( ".portlet" ).find( ".portlet-content" ).toggle();
    });
}, 50);
	
	var insert = document.getElementById("insert");
                /* call the php that has the php array which is json_encoded */
                $.getJSON('getName.php', function(data) {
                        /* data will hold the php array as a javascript object */
                        $.each(data, function(key, val) {
                                //$('ul').append('<li id="' + key + '">' + val+ '</li>');
								$('#insert').append('<div class="portlet" id="'+key+'">'+
									'<div class="portlet-header" name="'+key+'">'+key+'</div>'+
									'<div class="portlet-content">'+val+'</div>'+
								'</div>');
                        });
                });		
	
  });
  

		

 