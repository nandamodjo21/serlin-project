<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PENJADWALAN</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/themes/v3/pages/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/themes/v3/pages/plugins/fullcalendar/main.min.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/themes/v3/pages/plugins/fullcalendar-daygrid/main.min.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/themes/v3/pages/plugins/fullcalendar-timegrid/main.min.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/themes/v3/pages/plugins/fullcalendar-bootstrap/main.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/themes/v3/pages/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12 text-bold">
                <h1>~CALENDAR~</h1>
            </div>
            <div class="col-sm-6" style="margin-left: 10%;">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">RUANGAN</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- Main content -->
<div id="external-events">
    <div class="col-12 md-2">
        <div class="card card-primary">
            <div class="card-body">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
            </div>
        </div>
    </div>
</div>
<!-- Control Sidebar -->
<div class="card-footer">
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- jQuery -->
<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="<?= base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url(); ?>assets/dist/js/demo.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="/themes/v3/pages/plugins/moment/moment.min.js"></script>
<script src="<?= base_url('assets'); ?>/themes/v3/pages/plugins/fullcalendar/main.min.js"></script>
<script src="<?= base_url('assets'); ?>/themes/v3/pages/plugins/fullcalendar-daygrid/main.min.js"></script>
<script src="<?= base_url('assets'); ?>/themes/v3/pages/plugins/fullcalendar-timegrid/main.min.js"></script>
<script src="<?= base_url('assets'); ?>/themes/v3/pages/plugins/fullcalendar-interaction/main.min.js"></script>
<script src="<?= base_url('assets'); ?>/themes/v3/pages/plugins/fullcalendar-bootstrap/main.min.js"></script>
<!-- Page specific script -->


<script>
    $(function() {

        /* initialize the external events
         -----------------------------------------------------------------*/
        function ini_events(ele) {
            ele.each(function() {

                // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                // it doesn't need to have a start or end
                var eventObject = {
                    title: $.trim($(this).text()) // use the element's text as the event title
                }

                // store the Event Object in the DOM element so we can get to it later
                $(this).data('eventObject', eventObject)

                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 1070,
                    revert: true, // will cause the event to go back to its
                    revertDuration: 0 //  original position after the drag
                })

            })
        }

        ini_events($('#external-events div.external-event'))

        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date()
        var d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear()

        var Calendar = FullCalendar.Calendar;
        var Draggable = FullCalendarInteraction.Draggable;

        var containerEl = document.getElementById('external-events');
        var checkbox = document.getElementById('drop-remove');
        var calendarEl = document.getElementById('calendar');

        // initialize the external events
        // -----------------------------------------------------------------

        new Draggable(containerEl, {
            itemSelector: '.external-event',
            eventData: function(eventEl) {
                console.log(eventEl);
                return {
                    title: eventEl.innerText,
                    backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                    borderColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                    textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
                };
            }
        });
        var calendar = new Calendar(calendarEl, {
            plugins: ['bootstrap', 'interaction', 'dayGrid', 'timeGrid'],
            header: {
                left: 'prev, today',
                center: 'title',
                right: 'next'
            },
            'themeSystem': 'bootstrap',
            //Random default events
            events: [{
                    title: 'Input Shift',
                    start: new Date(y, m, d),
                    end: new Date(y, m, d),
                    url: '<?= base_url('admin/v_shift/' . $kdr . '/'); ?>' + y + '-' + (m + 2) + '-01',
                    backgroundColor: 'purple', //Primary (light-blue)
                    borderColor: 'purple' //Primary (light-blue)

                },

            ],
            eventClick: function(info) {
                console.log(info)

            },
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar !!!
            drop: function(info) {
                // is the "remove after drop" checkbox checked?
                if (checkbox.checked) {
                    // if so, remove the element from the "Draggable Events" list
                    info.draggedEl.parentNode.removeChild(info.draggedEl);
                }
            }
        });

        calendar.render();
        // $('#calendar').fullCalendar()

        /* ADDING EVENTS */
        var currColor = '#3c8dbc' //Red by default
        //Color chooser button
        var colorChooser = $('#color-chooser-btn')
        $('#color-chooser > li > a').click(function(e) {
            e.preventDefault()
            //Save color
            currColor = $(this).css('color')
            //Add color effect to button
            $('#add-new-event').css({
                'background-color': currColor,
                'border-color': currColor
            })
        })
        $('#add-new-event').click(function(e) {
            e.preventDefault()
            //Get value and make sure it is not null
            var val = $('#new-event').val()
            if (val.length == 0) {
                return
            }

            //Create events
            var event = $('<div />')
            event.css({
                'background-color': currColor,
                'border-color': currColor,
                'color': '#fff'
            }).addClass('external-event')
            event.html(val)
            $('#external-events').prepend(event)

            //Add draggable funtionality
            ini_events(event)

            //Remove event from text input
            $('#new-event').val('')
        })
    })
</script>
</body>
<!-- script modal kalender -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#form').hide();
        $('#tampil').click(function() {
            $('#form').show('slow');
            $('#send').click(function() {
                $('#form').hide('slow');
            });
        });
    });
</script>

</html>