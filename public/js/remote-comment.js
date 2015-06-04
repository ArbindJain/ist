// remote comment

(function set_remote_comment ($, win) {
	// exit if jquery not available
	if (typeof $ != 'function') {
		console.log("Error: jQuery Required");
		return false;
	}

	if (typeof win.RemoteComment != 'object')
		win.RemoteComment = {};

	// default settings 
	var def_settings = {
		'data_image_id': 		'image-id',
		'comment_target': 		'comment-target',
		'comment_url': 			'',
		'comment_box_prefix': 	'img-comment comment-box-',
		'new_comment_selector': 'text-shift',
	};

	// load settings
	if (typeof win.RemoteComment.settings != 'object')
		win.RemoteComment.settings = def_settings;
	else {
		for (key in def_settings) 
			if (def_settings.hasOwnProperty(key)) {
			if (typeof win.RemoteComment.settings[key] == 'undefined')
				win.RemoteComment.settings[key] = def_settings[key];
		}
	}

	// functions
	win.RemoteComment.fn = {
		reload: function() {
			return load_rc();
		},
	};

	function load_rc() {
		// settings to local
		
		var l = win.RemoteComment.settings;
		var comment_proto = 
			'<div class=\"' + l.comment_box_prefix + '{COMMENT_ID}\">\
				<div class="lightcom-info pull-left">\
					<a href="#"><b>{USER_ID}</b>&nbsp;&nbsp;&nbsp;</a>\
				</div>\
				<div class="lightcom-comment">\
				<p class="comment-container">{COMMENT}</p>\
				<p class="text-muted">{CREATED_AT}</p>\
				</div>\
			</div>\
			';
		$("body").unbind("keydown",".commentform");
		$("body").on("keydown",".commentform", function(e){
      		if (e.keyCode == 13)
        		if (!e.shiftKey) $(this).submit();     
    	});
		$("body").unbind('submit', 'form[data-remote]');
		$("body").on('submit', 'form[data-remote]', function(e){
			e.preventDefault();
			var form = $(this);
			if (!l.comment_url.length) {
				console.log('Error: comment_url must bet set in settings');
				return false;
			}

			$.ajax({
				url: l.comment_url,
				type: 'POST',
				cache: false,
				data: form.serialize(),
				dataType: 'json',
				beforeSend: function(){
					//
				},
				success: function(commentdata) { 
					if (typeof commentdata.comment_id == 'undefined') return false;
					var final_comment = comment_proto
						.replace(/\{COMMENT_ID\}/, commentdata.comment_id)
						.replace(/\{USER_ID\}/, commentdata.user_id)
						.replace(/\{COMMENT\}/, commentdata.comment)
						.replace(/\{CREATED_AT\}/, commentdata.created_at);

					var target_elem_selector = "[data-" + 
						l.data_image_id + "='" + commentdata.view_id + "']";

					var target_elem = null;
					if ($(".real-lightbox").data(l.data_image_id) == commentdata.view_id) {
						target_elem = $(".real-lightbox").find('.' + l.comment_target);
					}
					if (!target_elem || !target_elem.length) {
						console.log('Error: target element not found');
						return false;
					}

					target_elem.append(final_comment);
					var inserted = target_elem.parents(".inserted");
					inserted.scrollTop(inserted[0].scrollHeight);
					$('.' + l.new_comment_selector).val('');
				},
				error: function(xhr, text_status, thrown_error) {
					console.log(xhr);
					console.log('Error: ' + text_status);
				}
			});

		});

	} // end of rc load
	$(document).ready(load_rc); // end of window ready

})((typeof jQuery != 'undefined'? jQuery : null), window);



