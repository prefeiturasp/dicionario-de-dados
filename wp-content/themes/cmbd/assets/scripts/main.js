var app = (function(document, $) {

	'use strict';
	var docElem = document.documentElement,

		_bd = {

			init : function() {

				var field = $('.field');

				_bd.field.init(field);

				// GLOBAL BINDS
				$('.add-field').on('click',_bd.field.add);


			},

			field : {

				init : function(field) {

					field
						.on('click','.categories .category button',_bd.category.remove)
						.on('click','.categories button.add',_bd.category.add)
						.on('click','.save-field',_bd.field.save)
						.on('click','.delete-field',_bd.field.delete)
						.on('change','.row.type select',function(){
							$(this)
								.parents('.row.type')[0].className = 'row type ' + this.value;
						})
						.on('change','[name=secret]',function(){
							$(this)
								.parents('.secrecy')[0].className = ' secrecy ' + this.value;
						})
						.on('keyup','[name=filename]',_bd.field.title)
						.fadeIn('fast');

				},

				add : function() {

					$('.fields .field .active').removeClass('active');

					var html = $('.field-matrix').html(),
						panelId = $('.fields .field').length+1;

					html = html.replace(/#PANEL_ID#/g,panelId);

					$('.fields').append(html);

					$(document).foundation();

					var field = $('.fields .field:last');

					_bd.field.init(field);


				},

				binds : function() {

				},

				save : function(e) {

					// _bd.saving

					var bt = $(this)
							.text('Salvando...')
							.addClass('disabled')
							.attr('disabled',true),
						form = bt
							.parents('form');

			        $.ajax({
			            type: 'post',
			            url: form.attr('action'),
			            data: form.serialize(),
			            success: function (data) {

							form.find('[name=field_id]').val(data);

							bt
								.text('Salvar')
								.removeClass('disabled')
								.attr('disabled',false);

			            }
			        });

					e.preventDefault();

				},

				title : function() {

					$(this).parents('dd').find('a:first').text($(this).val());

				},

				delete : function() {

					if (!window.confirm('Deseja deletar este campo?')) {return;}

					var form = $(this).parents('form'),
						item = form.parents('.field');

			        $.ajax({
			            type: 'post',
			            url: form.attr('action').replace('/add','/delete'),
			            data: form.serialize(),
			            success: function () {

							item
								.fadeOut('fast',function(){
									item.remove();

									if (!$('.fields .field').length) {
										$('.add-field').click();
									}
								});



			            },
			            error: function() {

							window.alert('Erro. Favor entrar em contato com o administrador deste site.');

			            }
			        });

				}

			},

			category : {

				remove :  function(e) {

					var cat = $(this).parents('.category');

					cat.slideUp('fast',function(){
						cat.remove();
					});

					e.preventDefault();

				},

				add : function(e) {

					var html = $('.category-matrix').html();

					$(this).parents('.panel').find('.categories-list').append(html);

					e.preventDefault();

				}
			}


		},

		_userAgentInit = function() {
			docElem.setAttribute('data-useragent', navigator.userAgent);
		},
		_init = function() {

			// $(document).foundation();
			jQuery(document).foundation();

			_userAgentInit();

			_bd.init();


		};

	return {
		init: _init
	};

})(document, jQuery);

(function() {

	'use strict';
	app.init();

})();