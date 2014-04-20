var DEBUGJS = false;

function capitalize(s)
{
    return s[0].toUpperCase() + s.slice(1);
}


function validateForm(data){

	consolelog(data);
	$.each($.parseJSON(data), function(idx, obj) {
		
		if(obj.redirect != ""){
			consolelog(obj.redirect);
			window.location.href = obj.redirect;
		}else{

			consolelog(obj.message_error);

			if(obj.message_error != ""){

				$('#container').before('<div id="messages"><div id="multiFlash.0Message" class="alert alert-warning">'+obj.message_error+'</div></div>');

			}


		}

		consolelog(obj.errors);

		$.each(obj.errors, function(idmodel, objerrors) {


			consolelog(idmodel);
			consolelog(objerrors);

			model = idmodel;
			modelerrors = objerrors;

			$.each(modelerrors, function(idname, objerror) {

					consolelog(idname);
					consolelog(objerror[0]);

					inputfield= capitalize(idname);
					errorinput = objerror[0];

					$('#'+model+inputfield).after('<div class="error alert alert-danger">' + errorinput + "</div>");


			});


		});

	});


}


function handleNameValidation(data) {

	$(".error.alert.alert-danger,.alert.alert-warning").fadeOut(300, function() { $(this).remove(); });
	setTimeout(function() {
		validateForm(data);
	}, 1000);
}

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

function consolelog(msg){

 	if(DEBUGJS){
 		console.log(msg);
 	}
 	
}

function invokeMethod(object, method) {
  object[method]()
}

$(document).ready(function(){
	
	Controllers.forEach(function(entry) {
			dataarray = entry.split(".")
			Obj = window[dataarray[0]];
			invokeMethod(Obj,dataarray[1]);
	});

});