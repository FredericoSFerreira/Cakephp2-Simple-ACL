var Actions = {
	index :  function (){
		consolelog("Load Actions.index");

		$('.pagination a,table th a').unbind("click").bind('click',function(e){
			e.preventDefault();
			window.history.pushState(null, null, $(this).attr('href'));
			$.when(
				loadingScreen(),
				url= $(this).attr('href'),
				$.get(url, function(data) {
					$('#content .page').html(data);
					Actions.index();
				})
			).then(function() {
				removeLoadScreen();
			});

		});

		
		$(window).unbind("popstate").bind("popstate", function() {
			    loadingScreen(),
				url= location.pathname,
				$.get(url, function(data) {
					$('#content .page').html(data);
					Actions.index();
					removeLoadScreen();
				})
		});

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