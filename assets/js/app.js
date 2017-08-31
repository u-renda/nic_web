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
    
}).apply(this, [jQuery]);