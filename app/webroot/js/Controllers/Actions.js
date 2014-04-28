var Actions = {
	index :  function (){
		consolelog("Load Actions.index");
		App.actionslist('Actions','index');		
	},
	add : function(){
		consolelog("Load Actions.add");
		App.formsubmit();
	},
	edit : function(){
		consolelog("Load Actions.edit");
		App.actionslist('Actions','edit');
		App.formsubmit();
	},
	delete : function(){
		consolelog("Load Actions.delete");
		App.actionslist('Actions','delete');
		App.actionselectall('actionsdelete-check');
		App.deleteItems();
	}
}