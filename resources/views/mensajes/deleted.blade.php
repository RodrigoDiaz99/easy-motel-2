@if (Session::has('deleted'))
    <script>
        swal.fire({
            icon: 'error',
            title: 'Eliminado...',
            text: "{{Session::get('deleted')}}",
            confirmButtonText: 'Cerrar'
        })
    </script>
@endif
