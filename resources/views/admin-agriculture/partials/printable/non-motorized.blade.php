<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('../assets/img/logo/register-logo.png') }}" />
    <title>register Applicant List</title>
    <style>
        /* Basic styles for the document */
        body {
            font-family: Arial, sans-serif;
            color: #000;
            font-size: 14px; /* Set the default font size to 12px */
        }

        h4.text-center {
            font-size: 14px;
        }

        table,
        th,
        td {
            font-size: 14px; /* Set table font size to 12px */
        }

        /* Basic print styles */
        @media print {
            body {
                font-family: Arial, sans-serif;
                color: #000;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            table,
            th,
            td {
                border: 1px solid black;
            }

            th,
            td {
                padding: 8px;
                text-align: left;
            }

            .no-print,
            .header,
            .footer {
                display: none;
            }

            .text-center {
                text-align: center;
            }

            .strong{
                font-size: 18px;
            }
        }
    </style>
</head>

<body
    onload="window.print(); setTimeout(() => window.location.href = '{{ route('agriculture-non-motorized.index') }}', 1000);">
    <header style="display: flex; justify-content: center; align-items: center; margin-bottom: 20px;">
        @if ($headings)
        <img src="{{ asset('storage/uploads/images/' . $headings->left_img) }}" alt="DOLE Logo"
            style="height: 80px; margin-right: 20px;">
        <div style="text-align: center;">
            <strong class="strong">Republic of the Philippines</strong><br>
            <strong class="strong">Province of Southern Leyte</strong><br>
            <strong class="strong">Municipality of Malitbog</strong>
        </div>
        <img src="{{ asset('storage/uploads/images/' . $headings->right_img) }}" alt="Malitbog Logo"
            style="height: 100px; margin-left: 20px;">
    @else
    <img src="{{ asset('../assets/img/default-logo/no-logo.png') }}" alt="DOLE Logo" style="height: 80px; margin-right: 20px;">
    <div style="text-align: center;">
        <strong class="strong">Republic of the Philippines</strong><br>
        <strong class="strong">Province of Southern Leyte</strong><br>
        <strong class="strong">Municipality of Malitbog</strong>
    </div>
    <img src="{{ asset('../assets/img/default-logo/no-logo.png') }}" alt="Malitbog Logo" style="height: 100px; margin-left: 20px;">
    @endif
    </header>

    <h4 class="text-center">OFFICE OF THE MUNICIPAL AGRICULTURE</h4>
    <h4 class="text-center">{{ date('Y') }} MASTERLIST OF NON-MOTORIZED FISHING BOAT LICENSES & REGISTRATION</h4>

    <table>
        <thead>
            <tr>
                <th>NAME OF OWNER/OPERATOR</th>
                <th>REGISTRATION #</th>
                <th>FISHERFOLKS ID #</th>
                <th>REMARKS</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($register as $register)
                <tr>
                    <td>{{ $loop->iteration }}. {{ $register->owner }}</td>
                    <td>{{ $register->registration_no }}.</td>
                    <td>{{ $register->fisherfolk_id }}</td>
                    <td>
                        @php
                            $dateRegistered = \Carbon\Carbon::parse($register->date_registered);
                        @endphp

                        @if ($dateRegistered->year == now()->year)
                            <span style="color: green">REGISTERED</span>
                        @else
                            <span style="color: red">EXPIRED</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="no-print">
        <button onclick="window.print()">Print</button>
    </div>
</body>

</html>
