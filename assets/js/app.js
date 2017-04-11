var winOrigin = window.location.origin;
var winPath = window.location.pathname.split('/');
var winHref = window.location.href;
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
    
    // Navigation highlight
    var group_item = $('li.list-item');
    
    group_item.each(function() {
        var href = $(this).find('a').attr('href');
		var split = href.split('/');
		
        // Untuk halaman home (tanpa /index)
        if (winPath[2] === "" && split[4] === "index") {
            $(this).addClass('active');
        }
        
        // Untuk link yang tidak ada dropdown-nya
		if (split[4] === winPath[2]) {
            $(this).addClass('active');
        }
        
        // Untuk halaman pages
        if (winPath[2] === "pages" && split[0] === "#pages") {
            $(this).addClass('active');
        }
        
        // Untuk halaman member
        if (winPath[2] === "member" && split[0] === "#member") {
            $(this).addClass('active');
        }
        
        // Untuk halaman shop
        if (winPath[2] === "shop" && split[0] === "#shop") {
            $(this).addClass('active');
        }
    });
    
    // Posts - History
    var group_grand_parent = $('li.nav-grand-parent');
    var group_parent = $('li.nav-parent');
    var a_detail = $(group_parent).find('li a');
    
    group_grand_parent.each(function() {
        var a_grand_parent = $(this).find('a.grand-parent');
        var group_grand_children = $(this).find('ul.nav-grand-children');
        
        group_grand_children.addClass('hide');
        
        $(a_grand_parent).click(function() {
            if (group_grand_children.hasClass('hide') == true) {
                group_grand_children.removeClass('hide');
            } else {
                group_grand_children.addClass('hide');
            }
        });
    });
        
    group_parent.each(function() {
        var a_parent = $(this).find('a.parent');
        var group_children = $(this).find('ul.nav-children');
        
        group_children.addClass('hide');
        
        $(a_parent).click(function() {
            console.log("masuk");
            if (group_children.hasClass('hide') == true) {
                group_children.removeClass('hide');
            } else {
                group_children.addClass('hide');
            }
        });
    });
    
    a_detail.each(function() {
        var href = $(this).attr('href');
        
        if (href === winHref) {
            var li_grand_parent = $(this).closest("li.nav-grand-parent");
            var li_parent = $(this).closest("li.nav-parent");
            
            $(this).parent('li').addClass('active');
            li_grand_parent.addClass('active');
            li_parent.addClass('active');
        }
    });
    
    // Member Edit
    if (document.getElementById('member_edit_page') != null) {
        var e=$("#form-member-edit"),
            r=$(".alert-danger", e),
            i=$(".alert-success", e);
            
        e.validate( {
            errorElement:"span",
            errorClass:"help-block help-block-error",
            focusInvalid:!1,
            ignore:"",
            rules: {
                marital_status: 'required',
                occupation: 'required',
                idcard_address: 'required',
                email: {
                    required: true,
                    remote: {
                        url: newPathname + "check_member_email",
                        type: "post",
                        data: {
                            selfemail: function() {
                                return $("#selfemail").val();
                            },
                            email: function() {
                                return $("#email").val();
                            }
                        }
                    }
                },
                phone_number: {
                    required: true,
                    remote: {
                        url: newPathname + "check_member_phone_number",
                        type: "post",
                        data: {
                            selfphone_number: function() {
                                return $("#selfphone_number").val();
                            },
                            phone_number: function() {
                                return $("#phone_number").val();
                            }
                        }
                    }
                },
                password: {
                    minlength: 5
                },
                confirm_password: {
                    minlength: 5,
                    equalTo: "#password"
                }
            },
            messages: {
                email: {
                    required:"Please insert email.",
                    remote: "Email already exist"
                },
                phone_number: {
                    required:"Please insert phone number.",
                    remote: "Phone number already exist"
                },
                password: {
                    minlength: "Please enter at least 5 characters"
                },
                confirm_password: {
                    minlength: "Please enter at least 5 characters",
                    equalTo: "Please enter the same value as the new password"
                }
            },
            invalidHandler:function(e, t) {
                i.hide(), r.show(), App.scrollTo(r, -200)
            },
            errorPlacement:function(e, r) {
                r.is(":checkbox")?e.insertAfter(r.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline")): r.is(":radio")?e.insertAfter(r.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline")): e.insertAfter(r)
            },
            highlight:function(e) {
                $(e).closest(".form-group").addClass("has-error")
            },
            unhighlight:function(e) {
                $(e).closest(".form-group").removeClass("has-error")
            },
            success:function(e) {
                e.closest(".form-group").removeClass("has-error")
            },
            submitHandler:function(e) {
                $.ajax(
                {
                    type: "POST",
                    url: e.action,
                    data: $(e).serialize(), 
                    cache: false,
                    success: function(data)
                    {
                        var response = $.parseJSON(data);
                        
                        if (response.type == 'success')
                        {
                            i.show(), r.hide();
                            setTimeout("location.href = '"+response.location+"'",2000);
                        }
                        else
                        {
                            r.show(), i.hide();
                        }
                    }
                });
            }
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
        
        return false;
    }
    
    // Konfirmasi Transfer
    if (document.getElementById('transfer_confirmation_page') != null) {
        $("#the_form").validate({
            rules: {
                date: "required",
                account_name: "required",
                total: {
                    required: true,
                    digits: true,
                    remote: {
                        url: newPathname + "check_member_transfer_total",
                        type: "post",
                        data: {
                            total: function() {
                                return $("#total").val();
                            },
                            selftotal: function() {
                                return $("#selftotal").val();
                            }
                        }
                    }
                }
            },
            messages: {
                total: {
                    required:"Total transfer harus diisi.",
                    digits:"Harus diisi dengan angka.",
                    remote:"Total transfer tidak sesuai dengan di email."
                },
                date: {
                    required: "Harus diisi."
                },
                account_name: {
                    required: "Nama pemilik rekening harus diisi."
                },
            },
            errorElement: "div",
            errorPlacement: function(error, element) {
				var id = element.attr('id');
                error.appendTo($('#errorbox_'+id));
            },
            submitHandler: function(form) {
                $('.modal-title').text('Please wait...');
                $('.modal-body').html('<i class="fa fa-spinner fa-spin" style="font-size: 34px;"></i>');
                $('.modal-dialog').addClass('modal-sm');
                $('#myModal').modal('show');
                $.ajax(
                {
                    type: "POST",
                    url: form.action,
                    data: $(form).serialize(), 
                    cache: false,
                    success: function(data)
                    {
                        $('#myModal').modal('hide');
                        var response = $.parseJSON(data);
                        
                        if (response.type == 'success')
                        {
                            setTimeout("location.href = '"+response.location+"'",2000);
                        }
                    }
                });
                return false;
            }
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
        
        return false;
    }
    
}).apply(this, [jQuery]);