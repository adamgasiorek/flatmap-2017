$(document).ready(function(){


	$("#filer_input").filer({
		limit: null,
		maxSize: null,
		extensions: null,
		changeInput: '<div id="DragDropDiv" class="jFiler-input-dragDrop"><div class="jFiler-input-inner"><div class="jFiler-input-icon"><i class="icon-jfi-cloud-up-o"></i></div><div class="jFiler-input-text"><h3>Przeciagnij tu</h3> <span style="display:inline-block; margin: 15px 0">lub</span></div><a class="jFiler-input-choose-btn blue">Wybierz plik</a></div></div>',
		showThumbs: true,
		theme: "dragdropbox",
		templates: {
			box: '<ul id="wrzucaneObrazki" class="jFiler-items-list jFiler-items-grid"></ul>',
			item: '<li class="jFiler-item">\
						<div class="jFiler-item-container">\
							<div class="jFiler-item-inner">\
								<div class="jFiler-item-thumb">\
									<div class="jFiler-item-status"></div>\
									<div class="jFiler-item-thumb-overlay">\
										<div class="jFiler-item-info">\
											<div style="display:table-cell;vertical-align: middle;">\
												<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
												<span class="jFiler-item-others">{{fi-size2}}</span>\
											</div>\
										</div>\
									</div>\
									{{fi-image}}\
								</div>\
								<div class="jFiler-item-assets jFiler-row">\
									<ul class="list-inline pull-left">\
										<li>{{fi-progressBar}}</li>\
									</ul>\
									<ul class="list-inline pull-right">\
										<li><a class="glownezdjecie"></a><input type="text" name="photos" class="kolejnosc" style="display: none;" /></li>\
										<li><a class="WLEWO"><i class="chevron left icon"></i></a></li>\
										<li class="WPRAWO"><a><i class="chevron right icon"></i></a></li>\
										<li><a class="icon-jfi-trash jFiler-item-trash-action akcja1"></a></li>\
									</ul>\
								</div>\
							</div>\
						</div>\
					</li>',
			itemAppend: '<li class="jFiler-item">\
							<div class="jFiler-item-container">\
								<div class="jFiler-item-inner">\
									<div class="jFiler-item-thumb">\
										<div class="jFiler-item-status"></div>\
										<div class="jFiler-item-thumb-overlay">\
											<div class="jFiler-item-info">\
												<div style="display:table-cell;vertical-align: middle;">\
													<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
													<span class="jFiler-item-others">{{fi-size2}}</span>\
												</div>\
											</div>\
										</div>\
										{{fi-image}}\
									</div>\
									<div class="jFiler-item-assets jFiler-row">\
										<ul class="list-inline pull-left">\
											<li><span class="jFiler-item-others">{{fi-icon}}</span></li>\
										</ul>\
										<ul class="list-inline pull-right">\
											<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
										</ul>\
									</div>\
								</div>\
							</div>\
						</li>',
			progressBar: '<div class="bar" ></div>',
			itemAppendToEnd: true,
			canvasImage: true,
			removeConfirmation: false,
			_selectors: {
				list: '.jFiler-items-list',
				item: '.jFiler-item',
				progressBar: '.bar',
				remove: '.jFiler-item-trash-action'
			}
		},
		dragDrop: {
			dragEnter: null,
			dragLeave: null,
			drop: null,
			dragContainer: null,
		},
		uploadFile: {
			url: SERWER+"person/offer/photo/upload",
			data: null,
			type: 'POST',
			enctype: 'multipart/form-data',
			synchron: true,
			success: function(data, itemEl, listEl, boxEl, newInputEl, inputEl, id){
				//console.log("numer " + data);
                nowezdjecia = true;


                //itemEl.find('.kolejnosc').val(data);
                itemEl.find('.kolejnosc').attr("value", data);

                var index = tablicaLadujacychSie.indexOf(itemEl.find('.kolejnosc').attr("value", data));
                tablicaLadujacychSie.splice(index, 1);

                //console.log( tablicaLadujacychSie )
				if(tablicaLadujacychSie.length == 0)
				{
                    $('.idzDo_formularz_podsumowanie').show();
                    $('.poczekaj_zdjecia').hide();
				}
                // ladowanychS++;
                // if(ladowanych == ladowanychS)
				// {
                 //    $('.idzDo_formularz_podsumowanie').show();
                 //    $('.poczekaj_zdjecia').hide();
				// }
				// var parent = itemEl.find(".jFiler-jProgressBar").parent(),
				// 	new_file_name = JSON.parse(data),
				// 	filerKit = inputEl.prop("jFiler");

                // console.log( inputEl.prop("jFiler") )
                //
                // var reader = new FileReader();
                //
                // reader.onload = function (e) {
                //     // get loaded data and render thumbnail.
                //     document.getElementById("podgladGLOWNE").src = inputEl.prop("jFiler");
                // };
                //
                // // read the image file as a data URL.
                // reader.readAsDataURL(this.files);

                // filerKit.files_list[id].name = new_file_name;
                //
                // itemEl.find(".jFiler-jProgressBar").fadeOut("slow", function(){
					// $("<div class=\"jFiler-item-others text-success\"><i class=\"icon-jfi-check-circle\"></i> Success</div>").hide().appendTo(parent).fadeIn("slow");
                // });
			},
			error: function(el){
				// var parent = el.find(".jFiler-jProgressBar").parent();
				// el.find(".jFiler-jProgressBar").fadeOut("slow", function(){
				// 	$("<div class=\"jFiler-item-others text-error\"><i class=\"icon-jfi-minus-circle\"></i> Error</div>").hide().appendTo(parent).fadeIn("slow");
				// });
			},
			statusCode: null,
			onProgress: null,
			onComplete: null
		},
		files: null,
		addMore: true,
		allowDuplicates: true,
		clipBoardPaste: true,
		excludeName: null,
		beforeRender: null,
		afterRender: null,
		beforeShow: null,
		beforeSelect: null,
		onSelect: function(){
            $('#formularz_zdjecia').modal('refresh');
            $('.idzDo_formularz_podsumowanie').hide();
            $('.poczekaj_zdjecia').show();

            $('.glownezdjecie').text("");
			$('.glownezdjecie').first().text("Głowne");


            for (var i = 1; i < $('.glownezdjecie').length; ++i) {
                $('.glownezdjecie').eq(i).text(i+1);
            }
            tablicaLadujacychSie.push(i++);
            // for(var i = 0; i < $('.glownezdjecie').length; ++i) {
            //     $('.kolejnosc').eq(i).val(i+1);
            // }


			$('#modal_dodajOgloszenie').modal('refresh');

		},
		afterShow: null,
		onRemove: function(itemEl, file, id, listEl, boxEl, newInputEl, inputEl){
            //console.log( itemEl.index('.jFiler-item') + " " + $('.glownezdjecie').length )

			var filerKit = inputEl.prop("jFiler"),
		        file_name = filerKit.files_list[id].name;

		},
		onEmpty: null,
		options: null,
		dialogs: {
			alert: function(text) {
				return alert(text);
			},
			confirm: function (text, callback) {
				confirm(text) ? callback() : null;
			}
		},
		captions: {
			button: "Choose Files",
			feedback: "Choose files To Upload",
			feedback2: "files were chosen",
			drop: "Drop file here to Upload",
			removeConfirmation: "Are you sure you want to remove this file?",
			errors: {
				filesLimit: "Only {{fi-limit}} files are allowed to be uploaded.",
				filesType: "Only Images are allowed to be uploaded.",
				filesSize: "{{fi-name}} is too large! Please upload file up to {{fi-maxSize}} MB.",
				filesSizeAll: "Files you've choosed are too large! Please upload files up to {{fi-maxSize}} MB."
			}
		}
	});

	$("#filer_input_edit").filer({
		limit: null,
		maxSize: null,
		extensions: null,
		changeInput: '<div id="DragDropDiv" class="jFiler-input-dragDrop" ><div class="jFiler-input-inner" ><div class="jFiler-input-icon"><i class="icon-jfi-cloud-up-o"></i></div><div class="jFiler-input-text"><h3>Dodaj dodatkowe zdjęcia<br><br>Przeciagnij tu</h3><br></div><a class="jFiler-input-choose-btn blue">Wybierz plik</a></div></div>',
		showThumbs: true,
		theme: "dragdropbox",
		templates: {
			box: '<ul id="wrzucaneObrazki" class="jFiler-items-list jFiler-items-grid"></ul>',
			item: '<li class="jFiler-item">\
						<div class="jFiler-item-container">\
							<div class="jFiler-item-inner">\
								<div class="jFiler-item-thumb">\
									<div class="jFiler-item-status"></div>\
									<div class="jFiler-item-thumb-overlay">\
										<div class="jFiler-item-info">\
											<div style="display:table-cell;vertical-align: middle;">\
												<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
												<span class="jFiler-item-others">{{fi-size2}}</span>\
											</div>\
										</div>\
									</div>\
									{{fi-image}}\
								</div>\
								<div class="jFiler-item-assets jFiler-row">\
									<ul class="list-inline pull-left">\
										<li>{{fi-progressBar}}</li>\
									</ul>\
									<ul class="list-inline pull-right">\
										<li><a class="glownezdjecie"></a><input type="text" name="photos" class="kolejnosc" style="display: none;" /></li>\
										<li><a class="WLEWO2"><i class="chevron left icon"></i></a></li>\
										<li class="WPRAWO2"><a><i class="chevron right icon"></i></a></li>\
										<li><a class="icon-jfi-trash jFiler-item-trash-action akcja2"></a></li>\
									</ul>\
								</div>\
							</div>\
						</div>\
					</li>',
			itemAppend: '<li class="jFiler-item">\
							<div class="jFiler-item-container">\
								<div class="jFiler-item-inner">\
									<div class="jFiler-item-thumb">\
										<div class="jFiler-item-status"></div>\
										<div class="jFiler-item-thumb-overlay">\
											<div class="jFiler-item-info">\
												<div style="display:table-cell;vertical-align: middle;">\
													<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
													<span class="jFiler-item-others">{{fi-size2}}</span>\
												</div>\
											</div>\
										</div>\
										{{fi-image}}\
									</div>\
									<div class="jFiler-item-assets jFiler-row">\
										<ul class="list-inline pull-left">\
											<li><span class="jFiler-item-others">{{fi-icon}}</span></li>\
										</ul>\
										<ul class="list-inline pull-right">\
											<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
										</ul>\
									</div>\
								</div>\
							</div>\
						</li>',
			progressBar: '<div class="bar" ></div>',
			itemAppendToEnd: true,
			canvasImage: true,
			removeConfirmation: false,
			_selectors: {
				list: '.jFiler-items-list',
				item: '.jFiler-item',
				progressBar: '.bar',
				remove: '.jFiler-item-trash-action'
			}
		},
		dragDrop: {
			dragEnter: null,
			dragLeave: null,
			drop: null,
			dragContainer: null,
		},
		uploadFile: {
			url: SERWER+"person/offer/photo/upload",
			data: null,
			type: 'POST',
			enctype: 'multipart/form-data',
			synchron: true,
			success: function(data, itemEl, listEl, boxEl, newInputEl, inputEl, id){
				//console.log("numer " + data);
                nowezdjecia = true;


                //itemEl.find('.kolejnosc').val(data);
                itemEl.find('.kolejnosc').attr("value", data);

                var index = tablicaLadujacychSie.indexOf(itemEl.find('.kolejnosc').attr("value", data));
                tablicaLadujacychSie.splice(index, 1);

                //console.log( tablicaLadujacychSie )
				if(tablicaLadujacychSie.length == 0)
				{
                    $('.idzDo_formularz_podsumowanie2').show();
                    $('.poczekaj_zdjecia').hide();
				}
                // ladowanychS++;
                // if(ladowanych == ladowanychS)
				// {
                 //    $('.idzDo_formularz_podsumowanie').show();
                 //    $('.poczekaj_zdjecia').hide();
				// }
				// var parent = itemEl.find(".jFiler-jProgressBar").parent(),
				// 	new_file_name = JSON.parse(data),
				// 	filerKit = inputEl.prop("jFiler");

                // console.log( inputEl.prop("jFiler") )
                //
                // var reader = new FileReader();
                //
                // reader.onload = function (e) {
                //     // get loaded data and render thumbnail.
                //     document.getElementById("podgladGLOWNE").src = inputEl.prop("jFiler");
                // };
                //
                // // read the image file as a data URL.
                // reader.readAsDataURL(this.files);

                // filerKit.files_list[id].name = new_file_name;
                //
                // itemEl.find(".jFiler-jProgressBar").fadeOut("slow", function(){
					// $("<div class=\"jFiler-item-others text-success\"><i class=\"icon-jfi-check-circle\"></i> Success</div>").hide().appendTo(parent).fadeIn("slow");
                // });
			},
			error: function(el){
				// var parent = el.find(".jFiler-jProgressBar").parent();
				// el.find(".jFiler-jProgressBar").fadeOut("slow", function(){
				// 	$("<div class=\"jFiler-item-others text-error\"><i class=\"icon-jfi-minus-circle\"></i> Error</div>").hide().appendTo(parent).fadeIn("slow");
				// });
			},
			statusCode: null,
			onProgress: null,
			onComplete: null
		},
		files: null,
		addMore: true,
		allowDuplicates: true,
		clipBoardPaste: true,
		excludeName: null,
		beforeRender: null,
		afterRender: null,
		beforeShow: null,
		beforeSelect: null,
		onSelect: function(){
            $('#formularz_zdjecia2').modal('refresh');
            $('.idzDo_formularz_podsumowanie2').hide();
            $('.poczekaj_zdjecia').show();

            $('.glownezdjecie').text("");
			$('.glownezdjecie').first().text("Głowne");


            for (var i = 1; i < $('.glownezdjecie').length; ++i) {
                $('.glownezdjecie').eq(i).text(i+1);
            }
            tablicaLadujacychSie.push(i++);
            // for(var i = 0; i < $('.glownezdjecie').length; ++i) {
            //     $('.kolejnosc').eq(i).val(i+1);
            // }


			$('#modal_dodajOgloszenie_edit').modal('refresh');

		},
		afterShow: null,
		onRemove: function(itemEl, file, id, listEl, boxEl, newInputEl, inputEl){
            //console.log( itemEl.index('.jFiler-item') + " " + $('.glownezdjecie').length )

			var filerKit = inputEl.prop("jFiler"),
		        file_name = filerKit.files_list[id].name;

		},
		onEmpty: null,
		options: null,
		dialogs: {
			alert: function(text) {
				return alert(text);
			},
			confirm: function (text, callback) {
				confirm(text) ? callback() : null;
			}
		},
		captions: {
			button: "Choose Files",
			feedback: "Choose files To Upload",
			feedback2: "files were chosen",
			drop: "Drop file here to Upload",
			removeConfirmation: "Are you sure you want to remove this file?",
			errors: {
				filesLimit: "Only {{fi-limit}} files are allowed to be uploaded.",
				filesType: "Only Images are allowed to be uploaded.",
				filesSize: "{{fi-name}} is too large! Please upload file up to {{fi-maxSize}} MB.",
				filesSizeAll: "Files you've choosed are too large! Please upload files up to {{fi-maxSize}} MB."
			}
		}
	});
})
