(function($) {
    var render = function(name, vars) {
        var matcher = /<%=\s+?(\w+)\s+?%>/g,
            tpl     = $('#'+name).html();

        vars = vars || {};

        return tpl.replace(matcher, function(fullMatch, groupMatch) {
            return vars[groupMatch] ? vars[groupMatch] : '';
        });
    };

    $('#add-file').on('click', function(e) {
        var li  = document.createElement('li'),
            id  = new Date().getTime() + Math.random(),
            tpl = render('file-template', {id: id});

        $(li).html(tpl).appendTo('#files');
    });

    $('#files').on('click', '.remove-file', function(e) {
        $(this).closest('li').remove();
    });
})(jQuery);
