(function() {
  tinymce.create('tinymce.plugins.qlik_sense_buttons', {
    init : function(ed, url) {
			ed.addButton('qlik-sense-menu-button', {
				type: 'menubutton',
				title : qlikSenseTinyMceLang.insertSense,
				text: 'Sense',
				icon: true,
				image : url+'/qlik.png',
				menu: [{
					text: qlikSenseTinyMceLang.insertObject,
					icon: true,
					image : url+'/qlik-sense-obj.png',
					onclick: function() {
						var selected = tinyMCE.activeEditor.selection.getContent( {format : "text"} );
									
						var id = prompt(qlikSenseTinyMceLang.uniqueDivId, "page1-obj1");
						var qvid = prompt(qlikSenseTinyMceLang.senseObjId, "");
								 
						if (id && qvid) {
							ed.execCommand('mceInsertContent', false, '[qlik-sense-object id="'+id+'" qvid="'+qvid+'" height="400"]' + selected);
						}
					}
				}, {
					text: qlikSenseTinyMceLang.insertClearSelections,
					icon: true,
					image : url+'/qlik-sense-clear.png',
					onclick: function() {
						var selected = tinyMCE.activeEditor.selection.getContent( {format : "text"} );
													
						ed.execCommand('mceInsertContent', false, '[qlik-sense-object-clear-selections title="Clear Selections"]' + selected);
					}
				}, {
					text: qlikSenseTinyMceLang.insertSelectionsToolbar,
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
        version : "1.3.0	"
      };
    }
  });
  tinymce.PluginManager.add('qlik_sense_buttons', tinymce.plugins.qlik_sense_buttons);
})();
