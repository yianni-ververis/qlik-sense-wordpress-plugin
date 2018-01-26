(function() {
  tinymce.create('tinymce.plugins.qlik_sense_buttons', {
    init : function(ed, url) {
      ed.addButton('qlik_sense_obj_button', {
        title : 'Qlik Sense Object',
        image : url+'/qlik-sense-obj.png',
        onclick : function() {
					var selected = tinyMCE.activeEditor.selection.getContent( {format : "text"} );
							  
					var id = prompt("Unique Div ID", "page1-obj1");
					var qvid = prompt("Sense Object ID", "");
               
					ed.execCommand('mceInsertContent', false, '[qlik-sense-object id="'+id+'" qvid="'+qvid+'" height="400"]' + selected);
         }
      });
			ed.addButton('qlik_sense_clear_button', {
				title : 'Qlik Sense Clear Selections',
				image : url+'/qlik-sense-clear.png',
				onclick : function() {
					var selected = tinyMCE.activeEditor.selection.getContent( {format : "text"} );
												
					ed.execCommand('mceInsertContent', false, '[qlik-sense-object-clear-selections title="Clear Selections"]' + selected);
				 }
			});
			ed.addButton('qlik_sense_toolbar_button', {
				title : 'Qlik Sense Selections Toolbar',
				image : url+'/qlik-sense-toolbar.png',
				onclick : function() {
					var selected = tinyMCE.activeEditor.selection.getContent( {format : "text"} );
												
					ed.execCommand('mceInsertContent', false, '[qlik-sense-selection-toolbar]' + selected);
				 }
			});
    },
    createControl : function(n, cm) {
      return null;
    },
    getInfo : function() {
      return {
        longname : "Qlik Sense",
        author : 'Yianni Ververis',
        authorurl : 'yianni.ververis@qlik.com',
        infourl : 'https://github.com/yianni-ververis/qlik-sense-wordpress-plugin',
        version : "1.2.3"
      };
    }
  });
  tinymce.PluginManager.add('qlik_sense_buttons', tinymce.plugins.qlik_sense_buttons);
})();