<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>
<script>
    var SweetAlert2Demo = (function() {
        var initDemos = function() {
            $(".delete").click(function(e) {
                e.preventDefault();
                let $this = $(this);
                let deleteID = $this.data('id');

                swal({
                    title: "Are you sure?",
                    text: "This data will be permanently deleted.",
                    icon: "warning",
                    buttons: {
                        cancel: {
                            visible: true,
                            text: "Cancel",
                            className: "btn btn-danger",
                        },
                        confirm: {
                            text: "Delete!",
                            className: "btn btn-success",
                        },
                    },
                }).then((willDelete) => {
                    if (willDelete) {
                        let route = "{{ route('fishing-gear.destroy', '__id__') }}";
                        route = route.replace('__id__', deleteID);

                        $.ajax({
                            url: route,
                            type: "DELETE", // Change to DELETE
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            },
                            success: function(data) {
                                swal({
                                    title: "Deleted!",
                                    text: "Congrats! This data is deleted successfully.",
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                }).then(() => {
                                    location.reload(true); // Reload the page
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
                            title: "Delete Cancelled!",
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
            init: function() {
                initDemos();
            },
        };
    })();

    jQuery(document).ready(function() {
        SweetAlert2Demo.init();
    });
</script>
