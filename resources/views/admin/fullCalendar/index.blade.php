@extends('admin.master')

@section('content')

<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">fullCalendar</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('permissions.index') }}">fullCalendar</a></li>
            </ol>
            {{-- <a href="{{ route('permissions.create') }}"><button type="button" class="btn btn-success d-none d-lg-block m-l-15"> Add new</button></a> --}}
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <!-- column -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div id='fullCalendar'></div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->

@endsection

@section('scripts')

<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
    
    document.addEventListener('DOMContentLoaded', function() {
      const calendarEl = document.getElementById('fullCalendar');
      
      let calendar = new FullCalendar.Calendar(calendarEl, {
        //plugins: [ dayGridPlugin, timeGridPlugin, listPlugin ],
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        themeSystem: 'bootstrap',
        height:600,
        buttonText: {
            today:    "Aujourd'hui",
            month:    'Mois',
            week:     'Semaine',
            day:      'Jour',
            list:     'Liste'
        },
        navLinks : true,
        eventLimit: true,
        events : '/admin/fullcalendar/events',
        selectable:true,
        selectHelper: true, 
        select:function(selectionInfo,start, end, allDay)
        {
            var title = prompt('Event Title:');

            if(title)
            {
                let start = selectionInfo.start.getFullYear() + '-' + (selectionInfo.start.getMonth() + 1) + '-' + selectionInfo.start.getDate();
                let end = selectionInfo.end.getFullYear() + '-' + (selectionInfo.end.getMonth() + 1) + '-' + selectionInfo.end.getDate();

                $.ajax({
                    url:"/admin/fullcalendar/action",
                    type:"POST",
                    data:{
                        title: title,
                        start: start,
                        end: end,
                        type: 'add'
                    },
                    success:function(data)
                    {
                        calendar.refetchEvents();
                        swal({
                            title: "Good job!",
                            text: "Event created successfully",
                            icon: "success",
                        });
                    }
                })
            }
        },
        editable :true,
        eventResize: function(event, delta)
        {
            var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD');
            var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD');
            var title = event.title;
            var id = event.id;
            $.ajax({
                url:"/admin/fullcalendar/action",
                type:"POST",
                data:{
                    title: title,
                    start: start,
                    end: end,
                    id: id,
                    type: 'update'
                },
                success:function(response)
                {
                    calendar.refetchEvents();
                        swal({
                            title: "Good job!",
                            text: "Event updated successfully",
                            icon: "success",
                        });
                }
            })
        },
        
      });
      calendar.setOption('locale','fr');

      calendar.render();
    });

</script>

@endsection