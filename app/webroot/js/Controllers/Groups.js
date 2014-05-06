var Groups = {
	index :  function (){
		consolelog("Load Groups.index");
	},
	add : function(){
		consolelog("Load Groups.add");
		App.formsubmit();
	},
	edit : function(){
		consolelog("Load Groups.edit");
		App.formsubmit();
	},
	delete : function(){
		consolelog("Load Groups.delete");
		App.deleteItems();
	}
}