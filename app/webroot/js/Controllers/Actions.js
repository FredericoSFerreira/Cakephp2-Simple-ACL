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

		$('#selectmulti').change(function(){
			obj = this;
			consolelog(obj);
			action = $(obj).val();
			if(action != 0){
				countcheck = 0;

				consolelog(action);
				var hreflink = checkalltext[''+action]['url'];
		 		var strtitle= checkalltext[''+action]['title'];
		 		var strmsg= checkalltext[''+action]['pretext']+'<br/>';

				$('.actionsdelete-check').each(function() { //loop through each checkbox
			            if(this.checked == true){
			            	countcheck ++;
			            	strmsg += $(this).attr('multitext')+"</br>";
			            }               
			    });
			  	
			  	consolelog(countcheck);
			  	if(countcheck > 0){
			  		
				 	bootbox.dialog({
					  message: strmsg,
					  title: strtitle,
					  buttons: {
					  	danger: {
					      label: "Cancelar",
					      className: "btn-danger",
					      callback: function() {
					        $(obj).val(0);
					      }
					    },
					    success: {
					      label: "Aceptar",
					      className: "btn-success",
					      callback: function() {
					      	loadingScreen();
					        //window.location = hreflink;
					         $(obj).closest('form').trigger('submit')
					      }
					    },
					    
					  }
					});

			  	}else{
					$(obj).val(0);
			 		strtitle= checkalltext['empty']['title'];
			 		strmsg= checkalltext['empty']['text'];


			 		bootbox.dialog({
					  message: strmsg,
					  title: strtitle,
					  buttons: {
					    success: {
					      label: "Aceptar",
					      className: "btn-success",
					      callback: function() {
					      }
					    },
					    
					  }
					});

			  	}
			}
			

		});
	}
}