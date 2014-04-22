var Actions = {
	index :  function (){
		consolelog("Load Actions.index");
	},
	add : function(){
		consolelog("Load Actions.add");
		App.formsubmit();
	},
	edit : function(){
		consolelog("Load Actions.edit");
		App.formsubmit();
	},
	delete : function(){
		consolelog("Load Actions.delete");
		App.deleteItems();
	}
}