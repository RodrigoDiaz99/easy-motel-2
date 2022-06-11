@if (Session::has('updated'))
    <script>
  swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: "{{Session::get('updated')}}",
            confirmButtonText: 'Aceptar'
        })
    </script>
@endif
