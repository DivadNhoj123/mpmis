<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>
@if ($errors->any())
    <script>
        swal({
            title: "Validation Error!",
            text: "@foreach ($errors->all() as $error) {{ $error }}\n @endforeach",
            icon: "error",
            buttons: {
                confirm: {
                    className: "btn btn-danger",
                },
            },
        });
    </script>
@endif

@if(session('success'))
    <script>
        swal({
            title: "Success!",
            text: "{{ session('success') }}",
            icon: "success",
            buttons: {
                confirm: {
                    className: "btn btn-success",
                },
            },
        });
    </script>
@endif

