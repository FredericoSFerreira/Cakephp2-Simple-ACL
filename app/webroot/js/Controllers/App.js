var App = {
	actionslist : function (Objectlist,methodlist){
		consolelog("Load App.actionsList");
		App.actionstabs();
		App.actionspaginator(Objectlist,methodlist);
	},
	clickselectall : function(e){
		consolelog("Load App.clickselectall");

		consolelog(e.data.classcheck);
		classcheck=e.data.classcheck;

			if(this.checked) { // check select status
		    	$('.'+classcheck).each(function() { //loop through each checkbox
		            this.checked = true;  //select all checkboxes with class "checkbox1"               
		        });
		    }else{
		        $('.'+classcheck).each(function() { //loop through each checkbox
		            this.checked = false; //deselect all checkboxes with class "checkbox1"                       
		    	});         
		 	}
	},
	actionselectall : function(classchecks){
		consolelog("Load App.actionselectall");
		$('.checkallclick').unbind("click").bind('click',{ classcheck: classchecks },App.clickselectall);

	},
	actionspaginatorget: function(e){
		consolelog("Load App.actionspaginatorget");
		e.preventDefault();
		//consolelog(e.data.object);
		//consolelog(e.data.method);

		e.preventDefault();
			if(typeof($(this).attr('href')) != "undefined"){

				window.history.pushState(null, null, $(this).attr('href'));
				$.when(
					loadingScreen(),
					url= $(this).attr('href'),
					$.get(url, function(data) {
						$('#content .page').html(data);
						 e.data.object[e.data.method]();
					})
				).then(function() {
					removeLoadScreen()
				});

				$(window).unbind("popstate").bind("popstate", function() {
				    loadingScreen(),
					url= location.pathname,
					$.get(url, function(data) {
						$('#content .page').html(data);
						e.data.object[e.data.method]();
						removeLoadScreen();
					})
				});

			}

	},
	changerowspage: function(){
		consolelog("Load App.changerowspage");
		loadingScreen();
		consolelog($(this).val());
		consolelog(window.location.href);

		urlbase=window.location.href.replace(window.location.search,'');
		window.location.href = urlbase + '?rowspage='+$(this).val();

	},
	actionspaginator: function(Objectpaginator,methodpaginator){
		consolelog("Load App.actionspaginator");
		Obj = window[Objectpaginator];

		$('.pagination a,table th a').unbind("click").bind('click',{ object: Obj, method:methodpaginator },App.actionspaginatorget);
		$('#recordsforpage').unbind("change").bind('change',App.changerowspage);
	},
	formsubmit: function (){
		consolelog("Load App.formsubmit");
		$("form").on( "submit", function( event ) {

			consolelog($(this).attr("method"));

			if($(this).attr("method") == 'post'){
				event.preventDefault();
			  	urlaction = $(this).attr("action");
			  	var options = { 
			        beforeSubmit:  App.showRequest,  // pre-submit callback 
			        success:       App.showResponse,  // post-submit callback 
			 		url:       urlaction,
			    }; 

			  	$(this).ajaxSubmit(options); 
			}

		  	

		});
	},
	actionstabs : function(){
		consolelog("Load App.actionTabs");
		$('.filter-tab').unbind("click").bind( "click",function (e) {
				  consolelog("Click filter-tab");
				  e.preventDefault()
				  $($(this).attr("href")).toggle();
		});
	},
	showRequest : function(formData, jqForm, options){
		consolelog("Load showRequest");
		$('input[type=submit]', jqForm).attr('disabled', 'disabled');
		loadingScreen();
		clearAlerts();
	},
	showResponse : function(responseText, statusText, xhr, form){
		consolelog("Load showResponse");
		$('input[type=submit]', form).removeAttr('disabled');
		App.validateForm(responseText,form);
	},
	validateForm : function(data,form){

		consolelog(data);
		$.each($.parseJSON(data), function(idx, obj) {
			
			if(obj.redirect != ""){
				consolelog(obj.redirect);
				window.location.href = obj.redirect;
			}else{
				consolelog(obj.message_error);
				if(obj.message_error != ""){
					$('#content .page-form-ele.page').prepend('<div id="messages"><div id="multiFlash.0Message" class="alert alert-warning">'+obj.message_error+'</div></div>');
					removeLoadScreen();
				}

				if(obj.message_success != ""){
					$('#content .page-form-ele.page').prepend('<div id="messages"><div id="multiFlash.0Message" class="alert alert-success">'+obj.message_success+'</div></div>');
					removeLoadScreen();
					form[0].reset();
				}
			}

			consolelog(obj.errors);

			if (obj.errors != '') {
				$.each(obj.errors, function(idmodel, objerrors) {


					consolelog(idmodel);
					consolelog(objerrors);

					model = idmodel;
					modelerrors = objerrors;

					$.each(modelerrors, function(idname, objerror) {


							//consolelog(objerror[0]);

							//cantobj = Object.keys(objerror).length;
							//consolelog(cantobj);
							//consolelog(objerror[0]);

							if (objerror[0]) {
						      consolelog(model);
							  consolelog(idname);
							  consolelog("no es objeto");

							  errorinput = objerror[0];
							  $("input[name*='data\["+model+"\]\["+idname+"\]']").after('<div class="error alert alert-danger">' + errorinput + "</div>");
							  $("select[name*='data\["+model+"\]\["+idname+"\]']").after('<div class="error alert alert-danger">' + errorinput + "</div>");
							}else{
								consolelog("es array");
								$.each(objerror, function(locale, errormsg) {

									$("input[name*='data\["+model+"\]\["+idname+"\]\["+locale+"\]']").after('<div class="error alert alert-danger">' + errormsg + "</div>");
							  		$("select[name*='data\["+model+"\]\["+idname+"\]\["+locale+"\]']").after('<div class="error alert alert-danger">' + errormsg + "</div>");

								})

							}

							

							//$('#'+model+inputfield).after('<div class="error alert alert-danger">' + errorinput + "</div>");
							

					});


				});
				removeLoadScreen();
			}
		});
	},
	clickBlockScreen : function(){
		consolelog("Load App.clickBlockScreen");
		$("a").bind( "click", function(event) {
			consolelog($(this));
			if(($(this).hasClass('deleteitem') === false)
				&&($(this).hasClass('dropdown-toggle') === false)
				&&($(this).hasClass('filter-tab') === false)
			  ){
				loadingScreen();
			}
		});
	},
	deleteItems : function(){
	 	$( "a.deleteitem" ).bind( "click", function(event) {
	 		event.preventDefault();
	 		
	 		removeLoadScreen();
	 		var hreflink = $(this).attr('href');
	 		var strtitle= $(this).attr("data-confirm-title");
	 		var strmsg= $(this).attr("data-confirm-msg");

		 	bootbox.dialog({
			  message: strmsg,
			  title: strtitle,
			  buttons: {
			  	danger: {
			      label: "Cancelar",
			      className: "btn-danger",
			      callback: function() {
			        consolelog('boton cancelar');
			      }
			    },
			    success: {
			      label: "Aceptar",
			      className: "btn-success",
			      callback: function() {
			      	loadingScreen();
			        window.location = hreflink;
			      }
			    },
			    
			  }
			});
		});
	}
};