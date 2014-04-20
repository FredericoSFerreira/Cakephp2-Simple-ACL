var Users = {
	login :  function (){
		consolelog("Load Users.login");


       	$("form").on( "submit", function( event ) {
		  	event.preventDefault();

		  	$.post(
	            '/admin/users/login',
	            $(this).serialize() ,
	            handleNameValidation
        	);

		});
 

	},
	add : function(){
		consolelog("Load Users.add");
	},
	edit : function(){
		consolelog("Load Users.edit");
	},
	delete : function(){
		consolelog("Load Users.delete");
		deleteItems();
	}
}