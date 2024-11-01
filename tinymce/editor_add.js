(function() {
	tinymce.create('tinymce.plugins.TOUCHCAST_Shortcode_Plugin', {
		init : function(editor, url) {
			editor.addCommand('mcetouchcast', function() {
				editor.windowManager.open(
						{
							file : url + '/touchcast_pop.htm',
							width : 550 + parseInt(editor.getLang(
									'touchcast.delta_width', 0)),
							height : 400 + parseInt(editor.getLang(
									'touchcast.delta_height', 0)),
							inline : 1
						}, {
							plugin_url : url, // Plugin absolute URL
							some_custom_arg : 'custom arguement' // Custom
																	// argument
						});
			});

			editor.addButton('touchcast', {
				title : 'Insert Touchcast shortcode',
				cmd : 'mcetouchcast',
				image : url + '/appicon.png'
			});

			editor.onNodeChange.add(function(editor, cm, n) {
				cm.setActive('touchcast', n.nodeName == 'Feed');
			});
		},
		// on cancel
		createControl : function(n, cm) {
			return null;
		},
		// get info
		getInfo : function() {
			return {
				longname : 'TouchCast Shortcode Plugin',
				author : 'TouchCast',
				authorurl : 'http://www.touchcast.com',
				infourl : 'http://www.touchcast.com/wordpress',
				version : "1.0"
			};
		}
	});
	// Register plugin
	tinymce.PluginManager.add('touchcast', tinymce.plugins.TOUCHCAST_Shortcode_Plugin);
})();