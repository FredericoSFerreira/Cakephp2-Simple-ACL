var Users = {
	login :  function (){
		consolelog("Load Users.login");
       	App.formsubmit();
	},
	add : function(){
		consolelog("Load Users.add");
		App.formsubmit();
	},
	edit : function(){
		consolelog("Load Users.edit");
		App.formsubmit();
	},
	delete : function(){
		consolelog("Load Users.delete");
		App.deleteItems();
	}
}