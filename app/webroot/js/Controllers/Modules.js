var Modules = {
	index :  function (){
		consolelog("Load Modules.index");
	},
	add : function(){
		consolelog("Load Modules.add");
		App.formsubmit();
	},
	edit : function(){
		consolelog("Load Modules.edit");
		App.formsubmit();
	},
	delete : function(){
		consolelog("Load Modules.delete");
		App.deleteItems();
	}
}