<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>
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

