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

					console.log(field);

					field
						.on('click','.categories .category button',_bd.category.remove)
						.on('click','.categories button.add',_bd.category.add)
						.on('click','.save-field',_bd.field.save)
						.on('change','.row.type select',function(){
							$(this)
								.parents('.row.type')[0].className = 'row type ' + this.value;
						})
						.on('change','[name=secret]',function(){
							$(this)
								.parents('.secrecy')[0].className = ' secrecy ' + this.value;
						})
						.on('keyup','[name=filename]',_bd.field.title)
						.on('click','.delete-field',_bd.field.delete)
						.on('click','.save-field',_bd.field.save)
						.fadeIn('fast');

					console.log(field);

				},

				add : function() {

					$('.fields .field .active').removeClass('active');

					var html = $('.field-matrix').html();

					$('.fields').append(html);

					$(document).foundation();

					var field = $('.fields .field:last');

					_bd.field.init(field);


				},

				binds : function() {

				},

				save : function(e) {

					var form = $(this)
						// .text('Salvando...')
						// .addClass('disabled')
						// .attr('disabled',true)
						.parents('form');

			        $.ajax({
			            type: 'post',
			            url: form.attr('action'),
			            data: form.serialize(),
			            success: function (data) {

							console.log('FOI!');
							console.log(data);
			            }
			        });


					e.preventDefault();

				},

				title : function() {

					$(this).parents('dd').find('a:first').text($(this).val());

				},

				delete : function() {

					var form = $(this).parents('form');

			        $.ajax({
			            type: 'post',
			            url: form.attr('action').replace('/add','/delete'),
			            data: form.serialize(),
			            success: function () {

							// console.log('FOI!');
							// console.log(data);
			            }
			        });

					$(this)
						.parents('.field')
						.fadeOut('fast',function(){
							console.log(this);
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

					console.log('uai so');

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