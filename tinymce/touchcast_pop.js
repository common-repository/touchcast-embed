var touchcastPop = {
	init : function() {
	},

	insert : function() {
		var TOUCHCAST_ShortCode_Arr = [];
		// Insert the contents from the input into the document
		TOUCHCAST_ShortCode_Arr.push('[touchcast url="');
		TOUCHCAST_ShortCode_Arr.push(document.forms[0].touchcast_url.value);
	
		TOUCHCAST_ShortCode_Arr.push('" autoplay="');
		TOUCHCAST_ShortCode_Arr.push(document.forms[0].touchcast_autoplay.value);

		TOUCHCAST_ShortCode_Arr.push('" autoforward="');
		TOUCHCAST_ShortCode_Arr.push(document.forms[0].touchcast_autoforward.value);

		TOUCHCAST_ShortCode_Arr.push('" dimension="');
		TOUCHCAST_ShortCode_Arr.push(document.forms[0].touchcast_dimension.value);

		TOUCHCAST_ShortCode_Arr.push('"]');
		TOUCHCAST_ShortCode = TOUCHCAST_ShortCode_Arr.join("");
		tinyMCEPopup.editor.execCommand('mceInsertRawHTML', false, TOUCHCAST_ShortCode);
		tinyMCEPopup.close();
	}
};

tinyMCEPopup.onInit.add(touchcastPop.init, touchcastPop);
