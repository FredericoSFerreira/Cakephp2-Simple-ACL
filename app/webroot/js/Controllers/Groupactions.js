var Groupactions = {
	index :  function (){
		consolelog("Load Groupactions.index");
	},
	add : function(){
		consolelog("Load Groupactions.add");
		App.formsubmit();
	},
	delete : function(){
		consolelog("Load Groupactions.delete");
		App.deleteItems();
	}
}