<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>
<script>
    //== Class definition
    var SweetAlert2Demo = (function() {
        //== Demos
        var initDemos = function() {
            $(".removed").click(function(e) {
                e.preventDefault(); // Prevent the default form submission

                swal({
                    title: "Are you sure?",
                    text: "Removing this data will lose all the current record!",
                    icon: "warning",
                    buttons: {
                        cancel: {
                            visible: true,
                            text: "No, cancel!",
                            className: "btn btn-danger",
                        },
                        confirm: {
                            text: "Yes, removed it!",
                            className: "btn btn-success",
                        },
                    },
                }).then((willRemoved) => {
                    if (willRemoved) {
                        let route = "{{ route('tupad-applicant.remove') }}";

                        $.ajax({
                            url: route,
                            type: "POST",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            },
                            success: function(data) {
                                swal({
                                    title: "Updated!",
                                    text: "All records succesfully removed",
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                }).then(() => {
                                    location.reload(true);
                                });
                            },
                            error: function(xhr, textStatus, errorThrown) {
                                console.error(xhr.responseText);
                                swal({
                                    title: "Error!",
                                    text: "Something went wrong. Please try again.",
                                    icon: "error",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-danger",
                                        },
                                    },
                                });
                            }
                        });
                    } else {
                        swal({
                            title: "Action Cancelled",
                            icon: "info",
                            buttons: {
                                confirm: {
                                    className: "btn btn-success",
                                },
                            },
                            text: "No changes were made.",
                        });
                    }
                });
            });
        };

        return {
            //== Init
            init: function() {
                initDemos();
            },
        };
    })();

    //== Class Initialization
    jQuery(document).ready(function() {
        SweetAlert2Demo.init();
    });
</script>
