@if(Session::has('success_message'))
<script>
toastr.options = {
    "positionClass": "toast-bottom-right",
    "progressBar": false
}
    toastr.success("{{ session('success_message') }}");
</script>
@endif
