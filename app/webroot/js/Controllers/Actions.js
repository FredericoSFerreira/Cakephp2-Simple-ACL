var Actions = {
	index :  function (){
		consolelog("Load Actions.index");

		App.actionstabs();

		$('.pagination a,table th a').unbind("click").bind('click',function(e){
			e.preventDefault();

			if(typeof($(this).attr('href')) != "undefined"){

				window.history.pushState(null, null, $(this).attr('href'));
				$.when(
					loadingScreen(),
					url= $(this).attr('href'),
					$.get(url, function(data) {
						$('#content .page').html(data);
						Actions.index();
					})
				).then(function() {
					App.actionstabs(),
					removeLoadScreen()
				});

				$(window).unbind("popstate").bind("popstate", function() {
				    loadingScreen(),
					url= location.pathname,
					$.get(url, function(data) {
						$('#content .page').html(data);
						App.actionstabs();
						Actions.index();
						removeLoadScreen();
					})
				});

			}

		});
	},
	add : function(){
		consolelog("Load Actions.add");
		App.formsubmit();
	},
	edit : function(){
		consolelog("Load Actions.edit");
		App.actionstabs();
		App.formsubmit();
	},
	delete : function(){
		consolelog("Load Actions.delete");
		App.actionstabs();
		App.deleteItems();
	}
}