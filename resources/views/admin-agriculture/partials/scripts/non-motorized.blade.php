<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>
<script>
    document.getElementById('editBtn{{ $register->id }}').addEventListener('click', function() {
        var inputs = document.querySelectorAll(
            `#fullscreenModal{{ $register->id }} .card-body input, #fullscreenModal{{ $register->id }} .card-body select`
        );
        inputs.forEach(function(input) {
            input.removeAttribute('disabled');
        });

        // Show Done button and hide Edit button
        document.getElementById('doneBtn{{ $register->id }}').classList.remove('d-none');
        document.getElementById('editBtn{{ $register->id }}').classList.add('d-none');
    });

    document.getElementById('doneBtn{{ $register->id }}').addEventListener('click', function() {
        var inputs = document.querySelectorAll(
            `#fullscreenModal{{ $register->id }} .card-body input, #fullscreenModal{{ $register->id }} .card-body select`
        );
        inputs.forEach(function(input) {
            input.setAttribute('disabled', 'disabled');
        });

        // Show Edit button and hide Done button
        document.getElementById('editBtn{{ $register->id }}').classList.remove('d-none');
        document.getElementById('doneBtn{{ $register->id }}').classList.add('d-none');
    });

    var SweetAlert2Demo = (function() {
        var initDemos = function() {
            $(".done").click(function(e) {
                e.preventDefault(); // Prevent form submission

                let $this = $(this);
                let registerId = $this.data('id');
                swal({
                    title: "Are you sure?",
                    text: "Do you want to update this data?",
                    icon: "info",
                    buttons: {
                        cancel: {
                            visible: true,
                            text: "No, cancel!",
                            className: "btn btn-danger",
                        },
                        confirm: {
                            text: "Yes, update it!",
                            className: "btn btn-success",
                        },
                    },
                }).then((willUpdate) => {
                    if (willUpdate) {
                        let route =
                            "{{ route('agriculture-non-motorized.update', '__id__') }}";
                        route = route.replace('__id__', registerId);

                        $.ajax({
                            url: route,
                            type: "POST", // Should be PUT or PATCH
                            data: {
                                _method: "PUT", // Laravel needs this for PUT method
                                owner: $('#owner' + registerId).val(),
                                address: $('#address' + registerId).val(),
                                registration_no: $('#registration_number' +
                                    registerId).val(),
                                fisherfolk_id: $('#fisherfolk_id' + registerId)
                                .val(),
                                remarks: $('#remarks' + registerId).val(),
                                date_registered: $('#date_registered' + registerId)
                                    .val(),
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content'),
                            },
                            success: function(data) {
                                swal({
                                    title: "Updated!",
                                    text: "Record successfully updated.",
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
                            error: function(xhr) {
                                console.error(xhr.responseText);
                                swal({
                                    title: "Error!",
                                    text: "Something went wrong.",
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
                        swal("Action Cancelled", {
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

            $(".renew").click(function(e) {
                e.preventDefault();
                let $this = $(this);
                let renewId = $this.data('id');
                let owner = $this.data('owner');
                let registrationNo = $this.data('registration');
                swal({
                    title: "Are you sure?",
                    text: "This data will be renewed: \n\n Owner: " + owner +
                        "\nRegistration No: " + registrationNo,
                    icon: "info",
                    buttons: {
                        cancel: {
                            visible: true,
                            text: "Cancel",
                            className: "btn btn-danger",
                        },
                        confirm: {
                            text: "Renew!",
                            className: "btn btn-success",
                        },
                    },
                    content: {
                        element: "p",
                        attributes: {
                            style: "text-align: center;",
                        },
                    },
                }).then((willRenew) => {
                    if (willRenew) {
                        let route = "{{ route('non-motorized-renew', '__id__') }}";
                        route = route.replace('__id__', renewId);
                        $.ajax({
                            url: route,
                            type: "POST",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content'),
                            },
                            success: function(data) {
                                swal({
                                    title: "Updated!",
                                    text: "Congrats! This data is renew successfully",
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
                            title: "Renewal Cancelled",
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
