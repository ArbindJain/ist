(function($, win) {
	// exit if jquery not available
	if (typeof $ != 'function') {
		console.log("Error: jQuery Required");
		return false;
	}

	if (typeof win.NotificationUpdater != 'object')
		win.NotificationUpdater = {};

	// default settings 
	var def_settings = {
		'url': 						'',
		'target_class_name': 		'notification-panel-8675896',
		'csrf_token': 				false,
		'slug_class': 				'notif-slug',
		'icon_class': 				'notif-icon',
		'user_class': 				'notif-user',
		'story_class': 				'notif-story',
		'timestamp_class': 			'notif-timestamp',
		'refresh_interval': 		10, // in seconds
		'idle_stepper_interval': 	20,
		'sleep_time': 				120,
		'paused': 					false,
		'enable_logging': 			false,
	};

	// load settings
	if (typeof win.NotificationUpdater.settings != 'object')
		win.NotificationUpdater.settings = def_settings;
	else {
		for (key in def_settings) 
			if (def_settings.hasOwnProperty(key)) {
			if (typeof win.NotificationUpdater.settings[key] == 'undefined')
				win.NotificationUpdater.settings[key] = def_settings[key];
		}
	}

	// timer data object
	win.NotificationUpdater.timer = {};
	/* win.NotificationUpdater.timer.countdown_timer = 
		win.NotificationUpdater.settings.refresh_interval; */
	win.NotificationUpdater.timer.countdown_timer = 1;
	win.NotificationUpdater.timer.idle_time = 0;
	win.NotificationUpdater.timer.sleeping = false;

	// response data object
	win.NotificationUpdater.response = {};
	win.NotificationUpdater.response.raw = null;
	win.NotificationUpdater.response.last_id = false;
	win.NotificationUpdater.response.read_all = false;

	function show_error(txt) {
		console.log("%c" + "Error: " + txt, "color: #F30;");
	}

	win.NotificationUpdater.run_update = function() {
		var cdt = win.NotificationUpdater.timer.countdown_timer;
		if (win.NotificationUpdater.settings.enable_logging) {
			console.log('[NotificationUpdater] countdown: ' + cdt);
		}
		if (cdt < 1) {
			// update
			if (!win.NotificationUpdater.settings.paused &&
				!win.NotificationUpdater.timer.sleeping) {
				// send data
				var send_data = null;
				if (win.NotificationUpdater.response.last_id) {
					send_data = { last_id: win.NotificationUpdater.response.last_id };
					if (win.NotificationUpdater.response.read_all) {
						win.NotificationUpdater.response.read_all = false;
						send_data.read_all = true;
					}
				}
				if (win.NotificationUpdater.settings.csrf_token) {
					if ((typeof send_data == 'object') && (send_data != null)) {
						send_data['_token'] = win.NotificationUpdater.settings.csrf_token;
					} else {
						send_data = { '_token': win.NotificationUpdater.settings.csrf_token };
					}
				}
				//send_data = $.param(send_data);
				// ajax
				if (win.NotificationUpdater.settings.url.length) {
					$.ajax({
						url: win.NotificationUpdater.settings.url,
						type: 'GET',
						cache: false,
						data: send_data,
						dataType: 'json',
						beforeSend: function(){
							//
						},
						success: function(response) { 
							// stash response
							win.NotificationUpdater.response.raw = response;

							// handle response
							if (typeof response != 'undefined') {

								if (typeof response.okay == 'undefined') {
									show_error("missing attribute 'okay' in response, halting.");
								}
								else if (typeof response.notifications == 'undefined') {
									show_error("missing attribute 'notifications' in response, halting.");
								}
								else {
									var l = win.NotificationUpdater.settings;
									// process response
									var last_id = 0;
									var count = 0;
									if (response.notifications.length) 
										// prepend in reverse
										for (var i = (response.notifications.length - 1); i >= 0; i--) {
											var slug = response.notifications[i];
											var markup = '';

											markup = '<a class="newnotiftempclass ' + 
												l.slug_class + ' ' + 
												(slug.read? 'read' : 'unread') + ' ' + 
												slug.type.toLowerCase() + '" data-id="' + 
												slug.id + '" data-type="' + 
												slug.type + '" data-read="' + 
												slug.read + '" href="' + 
												slug.link + '">' + 
												markup + '</a>';

											$('.' + l.target_class_name).prepend(markup);

											var markup = '';
											markup += '<div class="notif-block">';
											markup += '<div class="' + 
												l.icon_class + '"><img src="' + 
												slug.icon + '"></div>';
											markup += '<div class="' + 
												l.user_class + '"><a href="' + 
												slug.profile + '">' + 
												slug.user + '</a></div>';
											markup += '<div class="' + 
												l.story_class + '"><p>' + 
												slug.story + '</p></div>';
											markup += '<div class="' + 
												l.timestamp_class + '"><i>' + 
												slug.timestamp + '</i></div>';
											markup += '</div>';
											markup += '<div class="clearfix"></div>';

											$('.' + l.target_class_name).children(".newnotiftempclass").first().append(markup);
											$('.' + l.target_class_name).children(".newnotiftempclass").removeClass('newnotiftempclass');
											// last id
											if (last_id < slug.id) last_id = slug.id;
											count++;
										}
										// save last id
										if (last_id)
											win.NotificationUpdater.response.last_id = last_id;

										if (win.NotificationUpdater.settings.enable_logging)
											console.log(count + ' notifications added');

										// clear if more than 10
										var notif_count = 0;
										$('.' + l.target_class_name).children().each(function () {
											var elem = $(this);
											notif_count++;
											if (notif_count > 10) elem.data("remove", true);
										});
										$('.' + l.target_class_name).children().each(function () {
											var elem = $(this);
											if (elem.data("remove")) elem.remove();
										});
								} 
							} else {
								show_error("response undefined");
							}
						},
						error: function(xhr, text_status, thrown_error) {
							if (win.NotificationUpdater.settings.enable_logging)
								console.log(xhr);
							show_error(text_status);
						}
					});
				} else {
					if (win.NotificationUpdater.settings.enable_logging)
						console.log('[NotificationUpdater] url not set');
				}

				// log
				if (win.NotificationUpdater.settings.enable_logging)
					console.log('[NotificationUpdater] update run');
			}
			if (win.NotificationUpdater.settings.enable_logging &&
				win.NotificationUpdater.timer.sleeping)
					console.log('[NotificationUpdater] timer sleeping...');
			// reset countdown
			win.NotificationUpdater.timer.countdown_timer = 
				win.NotificationUpdater.settings.refresh_interval * (parseInt(
					win.NotificationUpdater.timer.idle_time/
						win.NotificationUpdater.settings.idle_stepper_interval) + 1);
		} else {
			// count down
			win.NotificationUpdater.timer.countdown_timer--;
			// step up idle time
			win.NotificationUpdater.timer.idle_time++;
			// put to sleep if idle for too long
			if (win.NotificationUpdater.timer.idle_time >
				win.NotificationUpdater.settings.sleep_time) {
				win.NotificationUpdater.timer.sleeping = true;
			}
		}
		setTimeout(win.NotificationUpdater.run_update, 1000);
	};

	win.NotificationUpdater.clear_idle_time = function() {
		// update if idle for too long
		if (win.NotificationUpdater.timer.sleeping) {
			win.NotificationUpdater.timer.sleeping = false;
			win.NotificationUpdater.timer.countdown_timer = 2;
			if (win.NotificationUpdater.settings.enable_logging)
				console.log('[NotificationUpdater] timer woke up!');
		}
		else if (win.NotificationUpdater.timer.countdown_timer > 
			win.NotificationUpdater.settings.refresh_interval) {
			win.NotificationUpdater.timer.countdown_timer = 2;
			if (win.NotificationUpdater.settings.enable_logging)
				console.log('[NotificationUpdater] activity interrupt');
		}
		// reset idle time
		win.NotificationUpdater.timer.idle_time = 0;
	};

	// user functions
	win.NotificationUpdater.fn = {};
	win.NotificationUpdater.fn.mark_all_as_read = function() {
		win.NotificationUpdater.response.read_all = true;
		// reset
		win.NotificationUpdater.timer.sleeping = false;
		win.NotificationUpdater.timer.countdown_timer = 2;
		if (win.NotificationUpdater.settings.enable_logging)
			console.log('[NotificationUpdater] marking all as read');
		win.NotificationUpdater.timer.idle_time = 0;
	};

	// on activity
    $("body").mousemove(function (e) { win.NotificationUpdater.clear_idle_time(); });
    $("body").keypress(function (e) { win.NotificationUpdater.clear_idle_time(); });

    // start updater
	win.NotificationUpdater.run_update();


})(jQuery, window);