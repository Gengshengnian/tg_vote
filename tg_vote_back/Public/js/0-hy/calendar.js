$(document).ready(function() {
	
		$(document).ready(function() {
		var currentTimezone = false;

		// load the list of available timezones
		$.getJSON('php/get-timezones.php', function(timezones) {
			$.each(timezones, function(i, timezone) {
				if (timezone != 'UTC') { // UTC is already in the list
					$('#timezone-selector').append(
						$("<option/>").text(timezone).attr('value', timezone)
					);
				}
			});
		});

		// when the timezone selector changes, rerender the calendar
	

		function renderCalendar() {
			$('#calendar').fullCalendar({
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'month,agendaWeek,agendaDay'
				},
				defaultDate: '2016-01-12',
				timezone: currentTimezone,
				editable: true,
				selectable: true,
				eventLimit: true, // allow "more" link when too many events
				events: {
					url: 'php/get-events.php',
					error: function() {
						$('#script-warning').show();
					}
				},
				loading: function(bool) {
					$('#loading').toggle(bool);
				},
				eventRender: function(event, el) {
					// render the timezone offset below the event title
					if (event.start.hasZone()) {
						el.find('.fc-title').after(
							$('<div class="tzo"/>').text(event.start.format('Z'))
						);
					}
				},
				dayClick: function(date) {
					console.log('dayClick', date.format());
				},
				select: function(startDate, endDate) {
					console.log('select', startDate.format(), endDate.format());
				}
			});
		}

		renderCalendar();
	});

	});