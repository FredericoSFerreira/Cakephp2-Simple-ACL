var DEBUGJS = true;

function capitalize(s)
{
    return s[0].toUpperCase() + s.slice(1);
}

function loadingScreen() {
        var html = '<div id="load"></div>';
        $('body').append(html); 
}

function removeLoadScreen(){
	$('#load').fadeOut("slow",function() {
    		$(this).remove();
 	 });
}

function showApp(){
	$('.app').fadeIn();
}


function clearAlerts() {
	$(".alert").fadeOut(300, function() { $(this).remove(); });
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

	removeLoadScreen();
	showApp();
	App.clickBlockScreen();
});