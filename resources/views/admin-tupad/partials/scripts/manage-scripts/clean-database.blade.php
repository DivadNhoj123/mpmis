<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>
<script>
    var SweetAlert2Demo = (function() {
        var initDemos = function() {

            // Handle emptyTupad button click
            $(".emptyTupad").click(function(e) {
                swal({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    buttons: {
                        cancel: {
                            visible: true,
                            text: "No, cancel!",
                            className: "btn btn-danger",
                        },
                        confirm: {
                            text: "Yes, delete it!",
                            className: "btn btn-success",
                        },
                    },
                }).then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "{{ route('empty-tupad') }}",
                            type: "GET",
                            success: function(data) {
                                swal({
                                    title: "Deleted!",
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                    content: {
                                        element: "p",
                                        attributes: {
                                            innerHTML: `Action Completed! All records have been deleted!`,
                                        },
                                    },
                                }).then(() => {
                                    location.reload(true);
                                });
                            },
                            error: function(xhr, textStatus, errorThrown) {
                                console.error(xhr.responseText);
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
                            content: {
                                element: "p",
                                attributes: {
                                    innerHTML: `No records were deleted.`,
                                },
                            },
                        });
                    }
                });
            });

            // Handle emptyElected button click
            $(".emptyElected").click(function(e) {
                swal({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    buttons: {
                        cancel: {
                            visible: true,
                            text: "No, cancel!",
                            className: "btn btn-danger",
                        },
                        confirm: {
                            text: "Yes, delete it!",
                            className: "btn btn-success",
                        },
                    },
                }).then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "{{ route('empty-elected') }}",
                            type: "GET",
                            success: function(data) {
                                swal({
                                    title: "Deleted!",
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                    content: {
                                        element: "p",
                                        attributes: {
                                            innerHTML: `Action Completed! All records have been deleted!`,
                                        },
                                    },
                                }).then(() => {
                                    location.reload(true);
                                });
                            },
                            error: function(xhr, textStatus, errorThrown) {
                                console.error(xhr.responseText);
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
                            content: {
                                element: "p",
                                attributes: {
                                    innerHTML: `No records were deleted.`,
                                },
                            },
                        });
                    }
                });
            });

            // Handle emptyAppointed button click
            $(".emptyAppointed").click(function(e) {
                swal({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    buttons: {
                        cancel: {
                            visible: true,
                            text: "No, cancel!",
                            className: "btn btn-danger",
                        },
                        confirm: {
                            text: "Yes, delete it!",
                            className: "btn btn-success",
                        },
                    },
                }).then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "{{ route('empty-appointed') }}",
                            type: "GET",
                            success: function(data) {
                                swal({
                                    title: "Deleted!",
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                    content: {
                                        element: "p",
                                        attributes: {
                                            innerHTML: `Action Completed! All records have been deleted!`,
                                        },
                                    },
                                }).then(() => {
                                    location.reload(true);
                                });
                            },
                            error: function(xhr, textStatus, errorThrown) {
                                console.error(xhr.responseText);
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
                            content: {
                                element: "p",
                                attributes: {
                                    innerHTML: `No records were deleted.`,
                                },
                            },
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
