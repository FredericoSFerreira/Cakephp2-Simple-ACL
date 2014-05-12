var Groups = {
	index :  function (){
		consolelog("Load Groups.index");
		App.actionslist('Groups','index');
	},
	add : function(){
		consolelog("Load Groups.add");
		App.formsubmit();
	},
	edit : function(){
		consolelog("Load Groups.edit");
		App.actionslist('Groups','edit');
		App.formsubmit();
	},
	delete : function(){
		consolelog("Load Groups.delete");
		App.actionslist('Groups','delete');
		App.deleteItems();
	}
}