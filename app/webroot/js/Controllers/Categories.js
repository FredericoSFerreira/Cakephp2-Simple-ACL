var Categories = {
	index :  function (){
		consolelog("Load Categories.index");
	},
	add : function(){
		consolelog("Load Categories.add");
		App.formsubmit();
	},
	edit : function(){
		consolelog("Load Categories.edit");
		App.formsubmit();
	},
	delete : function(){
		consolelog("Load Categories.delete");
		App.deleteItems();
	}
}