function goBack() {
    window.history.back();
}

(function($) {
    
    'use strict';
    
    // Member Edit
    if (document.getElementById('member_edit_page') !== null) {
        var e=$("#form-member-edit"),
            r=$(".alert-danger", e),
            i=$(".alert-success", e);
            
        e.validate( {
            errorElement:"span",
            errorClass:"help-block help-block-error",
            focusInvalid:!1,
            ignore:"",
            rules: {
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
                    beforeSend: function()
                    {
                        $('.modal-title').text('Please wait...');
                        $('.modal-body').html('<i class="fa fa-spinner fa-spin" style="font-size: 34px;"></i>');
                        $('.modal-dialog').addClass('modal-sm');
                        $('#myModal').modal('show');
                    },
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
    if (document.getElementById('transfer_confirmation_page') !== null) {
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
    
    // Shop Detail
    if (document.getElementById('shop_detail_page') !== null) {
		$('body').delegate("#add_chart", "click", function() {
			var id_product = $(this).data("id");
			var size = document.getElementById("size").value;
            var action = "shop/add_cart";
            var dataString = 'id_product=' + id_product + '&size=' + size;
			$.ajax(
			{
				type: "POST",
				url: newPathname + action,
				data: dataString,
				cache: false,
                beforeSend: function()
                {
                    $('.modal-title').text('Please wait...');
					$('.modal-body').html('<i class="fa fa-spinner fa-spin" style="font-size: 34px;"></i>');
					$('.modal-dialog').addClass('modal-sm');
					$('#myModal').modal('show');
                },
				success: function(result)
				{
					$('#myModal').modal('hide');
					var response = $.parseJSON(result);
					
					if (response.type == 'success')
					{
						PNotify.prototype.options.styling = "fontawesome";
						new PNotify({
							title: response.title,
							text: response.msg,
							type: response.type
						});
					}
				}
			});
        });
        
        return false;
    }
    
    // Shopping Cart
    if (document.getElementById('shopping_cart_page') !== null) {
		$('body').delegate(".remove", "click", function() {
            var id = $(this).attr("id");
            var action = "shop/delete_cart";
            var dataString = 'id='+ id +'&action='+ 'delete_cart';
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                cache: false,
                success: function(data)
                {
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Confirm Delete');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
			
            return false;
        });
    }
    
}).apply(this, [jQuery]);

$(document).ready(function() {
	if (document.getElementById('shopping_cart_page') !== null) {
		$("#id_provinsi").change(function() {
			var id_provinsi = $(this).find("option:selected").attr("id");
			var dataString = 'id_provinsi='+ id_provinsi
			$.ajax({
				url: '../check_validate/check_kota_lists',
				type: "POST",
				data: dataString,
				beforeSend : function (){
					$('#area').html('<i class="fa fa-spinner fa-spin"></i>');
				},
				success: function(data) {
					$('#area').html(data);
                    document.getElementById('id_kota2').remove();
				},
				error: function(data){
				}
			});
		});
	}
});

$(function () {
	if (document.getElementById('shopping_cart_page') !== null) {
		$("#frmCalculateShipping").validate({
            rules: {
                id_provinsi: "required",
                id_kota: "required",
                shipment_address: "required",
                postal_code: {
                    required: true,
                    digits: true,
                    minlength: 4
                }
            },
            messages: {
                postal_code: {
                    digits:"Hanya isi dengan angka.",
                    minlength: "Minimal 4 angka",
                    required: "Harus diisi."
                },
                shipment_address: {
                    required: "Harus diisi."
                }
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
						setTimeout("location.href = '"+response.location+"'",1000);
                    }
                });
                return false;
            }
        });
	}
});