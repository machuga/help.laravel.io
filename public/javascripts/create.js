(function($) {
    var render,
        getTextareaSelector,
        attachAce;

    /**
     * Render template
     * 
     * @param  {string} name Template name
     * @param  {object} vars Variables
     * @return {string}      Prepared HTML
     */
    render = function(name, vars) {
        var matcher = /<%=\s+?(\w+)\s+?%>/g,
            tpl     = $('#'+name).html();

        vars = vars || {};

        return tpl.replace(matcher, function(fullMatch, groupMatch) {
            return vars[groupMatch] ? vars[groupMatch] : '';
        });
    };

    /**
     * Get jQuery selector for code textarea by ID
     * 
     * @param  {string} id ID
     * @return {string}    Selector
     */
    getTextareaSelector = function(id) {
        return '[name="paste[file][' + id + '][code]';
    };

    /**
     * Attach an ACE editor to a textarea by ID
     * 
     * @param  {string} id ID
     */
    attachAce = function(id) {
        var editor_id = 'ace-editor-' + id,
            $textarea = $(getTextareaSelector(id)),
            $editor,
            editor;

        $textarea.hide();

        $editor = $('<div id="' + editor_id + '" />').insertAfter($textarea);

        editor = ace.edit(editor_id)
        editor.setTheme("ace/theme/monokai");
        editor.getSession().setUseWorker(false);
        editor.getSession().setMode("ace/mode/javascript");
        editor.getSession().on("change", function () {
            $textarea.val(editor.getSession().getValue());
        });
    };

    // Attach "add new file" click listener
    $('#add-file').on('click', function(e) {
        var el  = document.createElement('article'),
            id  = new Date().getTime() + Math.random(),
            tpl = render('file-template', {id: id});

        $(el).addClass('file').html(tpl).appendTo('#files');

        attachAce(id);
    });

    // Attach "remove file" click listener
    $('#files').on('click', '.remove-file', function(e) {
        $(this).closest('article').remove();
    });

    // Initialize pre-loaded ACE editor
    attachAce(0);
})(jQuery);