@if (Session::has('deleted'))
    <script>
        swal.fire({
            icon: 'success',
            title: 'Eliminado',
            text: "{{Session::get('deleted')}}",
            confirmButtonText: 'Cerrar'
        })
    </script>
@endif
