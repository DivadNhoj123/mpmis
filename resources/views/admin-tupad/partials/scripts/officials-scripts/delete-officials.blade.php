<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>
<script>
    //== Class definition
    var SweetAlert2Demo = (function() {
        //== Demos
        var initDemos = function() {

            $(".delete").click(function(e) {
                let $this = $(this);
                let deleteId = $this.data('id');
                let name = $this.data('name');

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
                        let route = "{{ route('barangay-officials.destroy', '__id__') }}";
                        route = route.replace('__id__', deleteId);

                        $.ajax({
                            url: route,
                            type: "DELETE",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            },
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
                                            innerHTML: `Action Completed! <strong>${name}</strong> record has been deleted!`,
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
                                    innerHTML: ` <strong>${name}</strong> data is safe.`,
                                },
                            },
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
