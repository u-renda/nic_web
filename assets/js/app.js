var winOrigin = window.location.origin;
var winPath = window.location.pathname.split('/');
var winHref = window.location.href;
var newPathname = winOrigin + "/" + winPath[1] + "/";

(function($) {
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
    
}).apply(this, [jQuery]);