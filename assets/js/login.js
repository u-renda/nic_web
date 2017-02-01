window.theme = {};
var winOrigin = window.location.origin;
var winPath = window.location.pathname.split('/');
var newPathname = winOrigin + "/" + winPath[1] + "/";

// Datepicker
(function(theme, $) {

	theme = theme || {};

	var instanceName = '__datepicker';

	var PluginDatePicker = function($el, opts) {
		return this.initialize($el, opts);
	};

	PluginDatePicker.defaults = {
		format: 'dd M yyyy'
	};

	PluginDatePicker.prototype = {
		initialize: function($el, opts) {
			if ( $el.data( instanceName ) ) {
				return this;
			}

			this.$el = $el;

			this
				.setVars()
				.setData()
				.setOptions(opts)
				.build();

			return this;
		},

		setVars: function() {
			this.skin = this.$el.data( 'plugin-skin' );

			return this;
		},

		setData: function() {
			this.$el.data(instanceName, this);

			return this;
		},

		setOptions: function(opts) {
			this.options = $.extend( true, {}, PluginDatePicker.defaults, opts );

			return this;
		},

		build: function() {
			this.$el.datepicker( this.options );

			if ( !!this.skin ) {
				this.$el.data('datepicker').picker.addClass( 'datepicker-' + this.skin );
			}

			return this;
		}
	};

	// expose to scope
	$.extend(theme, {
		PluginDatePicker: PluginDatePicker
	});

	// jquery plugin
	$.fn.themePluginDatePicker = function(opts) {
		return this.each(function() {
			var $this = $(this);

			if ($this.data(instanceName)) {
				return $this.data(instanceName);
			} else {
				return new PluginDatePicker($this, opts);
			}

		});
	}

}).apply(this, [window.theme, jQuery]);


(function($) {

	'use strict';
	
	// Datepicker
	if ( $.isFunction($.fn[ 'datepicker' ]) ) {
		$(function() {
			$('[data-plugin-datepicker]').each(function() {
				var $this = $( this ),
					opts = {};

				var pluginOptions = $this.data('plugin-options');
				if (pluginOptions)
					opts = pluginOptions;

				$this.themePluginDatePicker(opts);
			});
		});
	}
	
	// Tooltips
	if ($.isFunction($.fn['tooltip'])) {
		$('[data-tooltip]:not(.manual), [data-plugin-tooltip]:not(.manual)').tooltip();
	}

}).apply(this, [jQuery]);

// TextArea AutoSize
(function(theme, $) {

	theme = theme || {};

	var initialized = false;
	var instanceName = '__textareaAutosize';

	var PluginTextAreaAutoSize = function($el, opts) {
		return this.initialize($el, opts);
	};

	PluginTextAreaAutoSize.defaults = {
	};

	PluginTextAreaAutoSize.prototype = {
		initialize: function($el, opts) {
			if (initialized) {
				return this;
			}

			this.$el = $el;

			this
				.setData()
				.setOptions(opts)
				.build();

			return this;
		},

		setData: function() {
			this.$el.data(instanceName, this);

			return this;
		},

		setOptions: function(opts) {
			this.options = $.extend( true, {}, PluginTextAreaAutoSize.defaults, opts );

			return this;
		},

		build: function() {

			autosize($(this.$el));

			return this;
		}
	};

	// expose to scope
	$.extend(theme, {
		PluginTextAreaAutoSize: PluginTextAreaAutoSize
	});

	// jquery plugin
	$.fn.themePluginTextAreaAutoSize = function(opts) {
		return this.each(function() {
			var $this = $(this);

			if ($this.data(instanceName)) {
				return $this.data(instanceName);
			} else {
				return new PluginTextAreaAutoSize($this, opts);
			}

		});
	}

}).apply(this, [window.theme, jQuery]);

// TextArea AutoSize
(function($) {

	'use strict';

	if ( typeof autosize === 'function' ) {

		$(function() {
			$('[data-plugin-textarea-autosize]').each(function() {
				var $this = $( this ),
					opts = {};

				var pluginOptions = $this.data('plugin-options');
				if (pluginOptions)
					opts = pluginOptions;

				$this.themePluginTextAreaAutoSize(opts);
			});
		});

	}

}).apply(this, [jQuery]);

//Forms / Wizard - Examples
(function($) {

	'use strict';

	var $w1finish = $('#w1').find('ul.pager li.finish'),
	
	$w1validator = $("#w1 form").validate({
		rules: {
            postal_code: "digits",
			name: {
				remote: {
					url: "check_validate/check_member_name",
					type: "post",
					data: {
						name: function() {
							return $("#name").val();
						},
						selfname: function() {
							return $("#selfname").val();
						}
					}
				}
			},
			phone_number: {
				digits: true,
				remote: {
					url: "check_validate/check_member_phone_number",
					type: "post",
					data: {
						phone_number: function() {
							return $("#phone-number").val();
						},
						selfphone_number: function() {
							return $("#selfphone_number").val();
						}
					}
				}
			},
			idcard_number: {
				digits: true,
				remote: {
					url: "check_validate/check_member_idcard_number",
					type: "post",
					data: {
						idcard_number: function() {
							return $("#idcard-number").val();
						},
						selfidcard_number: function() {
							return $("#selfidcard_number").val();
						}
					}
				}
			},
			email: {
				email: true,
				remote: {
					url: "check_validate/check_member_email",
					type: "post",
					data: {
						email: function() {
							return $("#email").val();
						},
						selfemail: function() {
							return $("#selfemail").val();
						}
					}
				}
			}
        },
        messages: {
            postal_code: {
				digits: "Mohon masukkan hanya angka."
			},
            phone_number: {
				digits: "Mohon masukkan hanya angka.",
				remote: "No. telp sudah terdaftar."
			},
			name: {
				remote: "Nama sudah terdaftar."
			},
			idcard_number: {
				digits: "Mohon masukkan hanya angka.",
				remote: "No. ID sudah terdaftar."
			},
			email: {
				email: "Mohon masukkan email yang benar.",
				remote: "Email sudah terdaftar."
			}
        },
		highlight: function(element) {
			$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		},
		success: function(element) {
			$(element).closest('.form-group').removeClass('has-error');
			$(element).remove();
		},
		errorPlacement: function( error, element ) {
			element.parent().append( error );
		}
	});

	$w1finish.on('click', function( ev ) {
		ev.preventDefault();
		var validated = $('#w1 form').valid();		
		if ( validated ) {
			var dataString = '&submit=submit'
			$('.modal-title').text('Please wait...');
			$('.modal-body').html('<i class="fa fa-spinner fa-spin" style="font-size: 34px;"></i>');
			$('.modal-dialog').addClass('modal-sm');
			$('#myModal').modal('show');
			
			$.ajax(
            {
                type: "POST",
                url: $("#form-register").action,
                data: $("#form-register").serialize()+dataString,
                cache: false,
                success: function(data)
                {
					$('#myModal').modal('hide');
                    var response = $.parseJSON(data);
					
					if (response.type == 'success')
					{
						$('#error_msg').empty();
						$('#error_msg').addClass('hidden');
						setTimeout("location.href = '"+response.location+"'",2000);
					}
					else
					{
						$('#error_msg').removeClass('hidden');
						$('#error_msg').append(response.msg);
					}
                }
            });
            return false;
		}
	});

	$('#w1').bootstrapWizard({
		tabClass: 'wizard-steps',
		nextSelector: 'ul.pager li.next',
		previousSelector: 'ul.pager li.previous',
		firstSelector: null,
		lastSelector: null,
		onNext: function( tab, navigation, index, newindex ) {
			var validated = $('#w1 form').valid();
			if( !validated ) {
				$w1validator.focusInvalid();
				return false;
			}
		},
		onTabClick: function( tab, navigation, index, newindex ) {
			if ( newindex == index + 1 ) {
				return this.onNext( tab, navigation, index, newindex);
			} else if ( newindex > index + 1 ) {
				return false;
			} else {
				return true;
			}
		},
		onTabChange: function( tab, navigation, index, newindex ) {
			var totalTabs = navigation.find('li').size() - 1;
			$w1finish[ newindex != totalTabs ? 'addClass' : 'removeClass' ]( 'hidden' );
			$('#w1').find(this.nextSelector)[ newindex == totalTabs ? 'addClass' : 'removeClass' ]( 'hidden' );
		}
	});

}).apply(this, [jQuery]);

$(document).ready(function() {
	if (document.getElementById('register-page') != null) {
		$("#id_provinsi").change(function() {
			var id_provinsi = $(this).find("option:selected").attr("id");
			var dataString = 'id_provinsi='+ id_provinsi
			$.ajax({
				url: 'check_validate/check_kota_lists',
				type: "POST",
				data: dataString,
				beforeSend : function (){
					$('#area').html('<i class="fa fa-spinner fa-spin"></i>');
				},
				success: function(data) {
					$('#area').html(data);
				},
				error: function(data){
				}
			});
		});

        $('.date-picker').datepicker({
            orientation: "auto left",
            format: "dd M yyyy",
            autoclose: true
        });
	}
});

(function($) {
	if (document.getElementById('register-page') != null) {
		$("#idcard_photo").fileinput({
			'showUpload': false,
			'showRemove': false,
			'uploadUrl': newPathname + 'upload_image',
			'previewZoomSettings': {
				image: { width: "auto", height: "auto" }
			},
			'previewZoomButtonIcons': {
				prev: '',
				next: '',
			},
			'uploadExtraData': {
				watermark: 'false',
				type: 'member'
			},
			'allowedFileTypes': ['image'],
			'dropZoneEnabled': false,
			'uploadAsync': true,
			'maxFileCount': 1,
		}).on('fileuploaded', function(event, data, previewId, index) {
			var form = data.form, files = data.files, extra = data.extra,
				response = data.response, reader = data.reader;
			var div = $('#div_idcard');
			div.append('<input type="hidden" name="idcard_photo" id="input_idcard" value="'+response.image+'">');
		}).on('fileclear', function(event) {
			$("#input_idcard").remove();
		});
		
		$("#photo").fileinput({
			'showUpload':false,
			'showRemove': false,
			'uploadUrl': newPathname + 'upload_image',
			'previewZoomSettings': {
				image: { width: "auto", height: "auto" }
			},
			'previewZoomButtonIcons': {
				prev: '',
				next: '',
			},
			'uploadExtraData': {
				watermark: 'false',
				type: 'member'
			},
			'allowedFileTypes': ['image'],
			'dropZoneEnabled': false,
			'uploadAsync': true,
			'maxFileCount': 1,
		}).on('fileuploaded', function(event, data, previewId, index) {
			var form = data.form, files = data.files, extra = data.extra,
				response = data.response, reader = data.reader;
			var div = $('#div_photo');
			div.append('<input type="hidden" name="photo" id="input_photo" value="'+response.image+'">');
		}).on('fileclear', function(event) {
			$("#input_photo").remove();
		});
	}
}).apply(this, [jQuery]);