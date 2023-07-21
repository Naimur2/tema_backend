@extends('layouts.master')
@section('styles')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js'></script>
    {{-- <script src='https://cdn.jsdelivr.net/npm/fullcalendar/daygrid@6.1.7/index.global.min.js'></script> --}}
@endsection
@section('content')
    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-body">
                <div id="calendar">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>

        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            renderCalender([]);
            getEvents();
        });

        const getEvents = () => {
            const currentDate = new Date();
            const currentMonth = currentDate.getMonth()

            currentDate.setDate(1);
            const startDate = currentDate.toISOString().slice(0, 10);

            currentDate.setMonth(currentMonth + 1, 1);
            currentDate.setDate(currentDate.getDate() - 1);

            currentDate.setDate(currentDate.getDate());
            const endDate = currentDate.toISOString().slice(0, 10);

                $.ajax({
                url: '{{route('all.events')}}',
                method: 'POST',
                data: {date_from:startDate, date_to: endDate},
                success: function (response) {
                    renderCalender(response.data)
                }
            });
        }

        const renderCalender = (events) => {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                initialView: 'dayGridMonth',
                events: setEvents(events),
            });
            calendar.render();
        }

        const setEvents = (allEvents) => {

            return allEvents.map(event => {
                return {
                    id: event.id,
                    title: event.name + ' (' + event?.team.name + ')',
                    start: event.starting_date,
                    end: event.ending_date,
                    allDay: false,
                    backgroundColor: event?.team?.color,
                    borderColor: event?.team?.color,
                    display: 'block',
                    textColor: getTextColor(event?.team?.color)
                }
            });
        }

        function getRGB(c) {
            return parseInt(c, 16) || c
        }

        function getsRGB(c) {
            return getRGB(c) / 255 <= 0.03928
                ? getRGB(c) / 255 / 12.92
                : Math.pow((getRGB(c) / 255 + 0.055) / 1.055, 2.4)
        }

        function getLuminance(hexColor) {
            return (
                0.2126 * getsRGB(hexColor.substr(1, 2)) +
                0.7152 * getsRGB(hexColor.substr(3, 2)) +
                0.0722 * getsRGB(hexColor.substr(-2))
            )
        }

        function getContrast(f, b) {
            const L1 = getLuminance(f)
            const L2 = getLuminance(b)
            return (Math.max(L1, L2) + 0.05) / (Math.min(L1, L2) + 0.05)
        }

        function getTextColor(bgColor) {
        const whiteContrast = getContrast(bgColor, '#ffffff')
        const blackContrast = getContrast(bgColor, '#000000')

        return whiteContrast > blackContrast ? '#ffffff' : '#000000'
        }
    </script>
@endsection