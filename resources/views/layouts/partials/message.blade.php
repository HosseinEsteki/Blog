@if(session('show_message')!=null)
    @php
    $message=session('show_message');
 @endphp
    <script src="/libraries/sweetalert2/dist/sweetalert2.all.js"></script>
    <!--  Notifications Plugin    -->
{{--    <script src="{{ asset('assets') }}/js/plugins/bootstrap-notify.js"></script>--}}

    <script>
        Swal.fire({
            title: '{{$message['title']}}',
            text: '{{$message['message']}}',
            icon: '{{$message['level']}}',
            timer: {{$message['timer']}},
            confirmButtonText: 'حله'
        });


        {{--color = 'primary';--}}
        {{--$.notify({--}}
        {{--    icon: "now-ui-icons ui-1_bell-53",--}}
        {{--    message: "{{$message['message']}}"--}}
        {{--},{--}}
        {{--    type: color,--}}
        {{--    timer: 800,--}}
        {{--    placement: {--}}
        {{--        from: 'top',--}}
        {{--        align: 'center'--}}
        {{--    }--}}
        {{--});--}}
    </script>
@endif
