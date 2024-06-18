document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: function(fetchInfo, successCallback, failureCallback) {
            $.ajax({
                url: '/api/reservations', // Replace with your Laravel route to fetch reservations
                dataType: 'json',
                success: function(data) {
                    var events = data.map(function(reservation) {
                        return {
                            id: reservation.id,
                            title: 'Reserved',
                            start: reservation.start_date,
                            end: reservation.end_date,
                            backgroundColor: '#f0f0f0', // Gray out reserved dates
                            borderColor: '#333', // Border color for reserved dates
                            textColor: '#333', // Text color for reserved dates
                            editable: false, // Prevent dragging and resizing
                            selectable: false // Prevent selection
                        };
                    });
                    successCallback(events);
                },
                error: function() {
                    failureCallback();
                }
            });
        }
    });

    calendar.render();
});
