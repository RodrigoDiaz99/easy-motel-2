@if (Session::has('error'))
    <script>
        swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "{{Session::get('error')}}",
            confirmButtonText: 'Cerrar'
        })
        console.log("{{Session::get('code')}}");
    </script>
@endif
