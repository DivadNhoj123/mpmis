<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>
<script>
    @if (session('official_position') && session('official_address'))
        @php
            $positionName = '';
            switch (session('official_position')) {
                case 1:
                    $positionName = 'Barangay Captain';
                    break;
                case 2:
                    $positionName = 'Barangay Kagawad';
                    break;
                case 3:
                    $positionName = 'SK Chairman';
                    break;
                case 4:
                    $positionName = 'SK Kagawad';
                    break;
                case 5:
                    $positionName = 'Barangay Treasurer';
                    break;
                case 6:
                    $positionName = 'Barangay Secretary';
                    break;
                case 7:
                    $positionName = 'SK Treasurer';
                    break;
                case 8:
                    $positionName = 'SK Secretary';
                    break;
                case 9:
                    $positionName = 'BHW';
                    break;
                case 10:
                    $positionName = 'BNS';
                    break;
                case 11:
                    $positionName = 'Lupon';
                    break;
                case 12:
                    $positionName = 'Tanod';
                    break;
                default:
                    $positionName = 'Unknown Position';
                    break;
            }
        @endphp

        swal({
            title: "Verification Alert!",
            text: "This applicant is already an official.\n\nPosition: {{ $positionName }}\nBarangay: {{ session('official_address') }}",
            icon: "error",
            buttons: {
                confirm: {
                    className: "btn btn-danger",
                },
            },
        });
    @elseif (session('already_applied_year') && session('applied_date'))
        swal({
            title: "Verification Alert!",
            content: {
                element: "div",
                attributes: {
                    innerHTML: `<div style="text-align: center;">
                This applicant has already applied this year on<br>{{ session('applied_date') }}
            </div>`,
                },
            },
            icon: "error",
            buttons: {
                confirm: {
                    className: "btn btn-danger",
                },
            },
        });
    @endif
</script>
