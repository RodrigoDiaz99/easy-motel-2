@if (Session::has('success'))
    <script>
  swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: "{{Session::get('success')}}",
            confirmButtonText: 'Aceptar'
        })
    </script>
@endif
