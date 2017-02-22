@if(Session::get('alert-type') === 'success')
    <script>
        toastr.options = {
            "positionClass": "{{ Session::get('positionClass') }}",
            "closeButton": "{{ Session::get('closeButton') }}"
        };
        toastr.success("{{ Session::get('message') }}", "{{ Session::get('title') }}");
    </script>
@elseif(Session::get('alert-type') === 'info')
    <script>toastr.info("{{ session('info') }}")</script>
@elseif(Session::get('alert-type') === 'warning')
    <script>
        toastr.options = {
            "positionClass": "{{ Session::get('positionClass') }}",
            "closeButton": "{{ Session::get('closeButton') }}"
        };
        toastr.warning("{{ Session::get('message') }}", "{{ Session::get('title') }}");
    </script>
@elseif(Session::get('alert-type') === 'error')
    <script>toastr.error("{{ session('error') }}")</script>
@endif