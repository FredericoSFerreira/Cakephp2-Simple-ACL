 function deleteItems(){

 	$( "a.deleteitem" ).bind( "click", function(event) {
 		event.preventDefault();
 		var hreflink = $(this).attr('href');
 		var strtitle= $(this).attr("data-confirm-title");
 		var strmsg= $(this).attr("data-confirm-msg");

	 	bootbox.dialog({
		  message: strmsg,
		  title: strtitle,
		  buttons: {
		  	danger: {
		      label: "Cancelar",
		      className: "btn-danger",
		      callback: function() {
		        
		      }
		    },
		    success: {
		      label: "Aceptar",
		      className: "btn-success",
		      callback: function() {
		        window.location = hreflink;
		      }
		    },
		    
		  }
		});
	});

 }

 $(document).ready(function(){
      

 		deleteItems();

 });