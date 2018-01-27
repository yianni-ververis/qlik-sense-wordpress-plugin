(function() {
  tinymce.create('tinymce.plugins.qlik_sense_buttons', {
    init : function(ed, url) {
			ed.addButton('qlik-sense-menu-button', {
				type: 'menubutton',
				title : 'Insert Qlik Sense...',
				text: 'Sense',
				icon: true,
				image : url+'/qlik.png',
				menu: [{
					text: 'Insert Object',
					icon: true,
					image : url+'/qlik-sense-obj.png',
					onclick: function() {
						var selected = tinyMCE.activeEditor.selection.getContent( {format : "text"} );
									
						var id = prompt("Unique Div ID", "page1-obj1");
						var qvid = prompt("Sense Object ID", "");
								 
						ed.execCommand('mceInsertContent', false, '[qlik-sense-object id="'+id+'" qvid="'+qvid+'" height="400"]' + selected);
					}
				}, {
					text: 'Insert Clear Selections',
					icon: true,
					image : url+'/qlik-sense-clear.png',
					onclick: function() {
						var selected = tinyMCE.activeEditor.selection.getContent( {format : "text"} );
													
						ed.execCommand('mceInsertContent', false, '[qlik-sense-object-clear-selections title="Clear Selections"]' + selected);
					}
				}, {
					text: 'Insert Selections Toolbar',
					icon: true,
					image : url+'/qlik-sense-toolbar.png',
					onclick: function() {
						var selected = tinyMCE.activeEditor.selection.getContent( {format : "text"} );
													
						ed.execCommand('mceInsertContent', false, '[qlik-sense-selection-toolbar]' + selected);
					}
				}]
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