var Users = {
	login :  function (){
		consolelog("Load Users.login");


       	$("form").on( "submit", function( event ) {
		  	event.preventDefault();
		  	var options = { 
		        beforeSubmit:  App.showRequest,  // pre-submit callback 
		        success:       App.showResponse,  // post-submit callback 
		 		url:       '/admin/users/login/',
		    }; 

		  	$(this).ajaxSubmit(options); 

		});
 

	},
	add : function(){
		consolelog("Load Users.add");

		$("form").on("submit", function( event ) {
		  	event.preventDefault();
		  	var options = { 
		        beforeSubmit:  App.showRequest,  // pre-submit callback 
		        success:       App.showResponse,  // post-submit callback 
		 		url:       '/admin/users/add/'  
		    }; 
		  	$(this).ajaxSubmit(options); 
		});

	},
	edit : function(){
		consolelog("Load Users.edit");
	},
	delete : function(){
		consolelog("Load Users.delete");
		App.deleteItems();
	}
}