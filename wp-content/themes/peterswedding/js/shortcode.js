jQuery(document).ready(function($) {

    tinymce.create('tinymce.plugins.wpse72394_plugin', {
        init : function(ed, url) {
                // Register command for when button is clicked
                ed.addCommand('wpse72394_insert_shortcode', function() {
                    selected = tinyMCE.activeEditor.selection.getContent();

                  
                        content =  '[separator]';
                  

                    tinymce.execCommand('mceInsertContent', false, content);
                });

            // Register buttons - trigger above command when clicked
            ed.addButton('wpse72394_button', {title : 'Insert separator', cmd : 'wpse72394_insert_shortcode', image: url + '/../images/icon.png' });
        },   
    });

    // Register our TinyMCE plugin
    // first parameter is the button ID1
    // second parameter must match the first parameter of the tinymce.create() function above
    tinymce.PluginManager.add('wpse72394_button', tinymce.plugins.wpse72394_plugin);
});