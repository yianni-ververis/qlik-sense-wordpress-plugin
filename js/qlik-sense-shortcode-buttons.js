(function() {
  tinymce.create('tinymce.plugins.qlik_sense_buttons', {
    init : function(ed, url) {
			ed.addButton('qlik-sense-menu-button', {
				type: 'menubutton',
				title : ed.getLang('qlik_sense_buttons.insertSense'),
				text: 'Sense',
				icon: true,
				image : url+'/qlik.png',
				menu: [{
					text: ed.getLang('qlik_sense_buttons.insertObject'),
					icon: true,
					image : url+'/qlik-sense-obj.png',
					onclick: function() {
						var selected = tinyMCE.activeEditor.selection.getContent( {format : "text"} );
									
						var id = prompt(ed.getLang('qlik_sense_buttons.uniqueDivId'), "page1-obj1");
						var qvid = prompt(ed.getLang('qlik_sense_buttons.senseObjId'), "");
								 
						if (id && qvid) {
							ed.execCommand('mceInsertContent', false, '[qlik-sense-object id="'+id+'" qvid="'+qvid+'" height="400"]' + selected);
						}
					}
				}, {
					text: ed.getLang('qlik_sense_buttons.insertClearSelections'),
					icon: true,
					image : url+'/qlik-sense-clear.png',
					onclick: function() {
						var selected = tinyMCE.activeEditor.selection.getContent( {format : "text"} );
													
						ed.execCommand('mceInsertContent', false, '[qlik-sense-object-clear-selections title="Clear Selections"]' + selected);
					}
				}, {
					text: ed.getLang('qlik_sense_buttons.insertSelectionsToolbar'),
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
