{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="{{ asset('../assets/img/logo/tupad-logo.png') }}" />
    <title>TUPAD Applicant List</title>
    <style>
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
        }
    </style>
</head>

<body onload="window.print(); setTimeout(() => window.location.href = '{{ route('tupad-applicant.index') }}', 1000);">
    <header style="display: flex; justify-content: center; align-items: center; margin-bottom: 20px;">
        <img src="{{ asset('../assets/img/logo/DOLE.png') }}" alt="DOLE Logo" style="height: 50px; margin-right: 20px;">

        <div style="text-align: center;">
            <strong>Republic of the Philippines</strong><br>
            <strong>Province of Southern Leyte</strong><br>
            <strong>Municipality of Malitbog</strong>
        </div>

        <img src="{{ asset('../assets/img/logo/MALITBOG.png') }}" alt="Malitbog Logo" style="height: 50px; margin-left: 20px;">
    </header>


    <h2 class="text-center">{{ $count }} TUPAD Applicant</h2>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Initial</th>
                <th>Surname</th>
                <th>Suffix</th>
                <th>Barangay</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tupads as $tupad)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tupad->name }}</td>
                    <td>{{ $tupad->initial }}.</td>
                    <td>{{ $tupad->surname }}</td>
                    <td>{{ $tupad->suffix }}</td>
                    <td>{{ $tupad->barangay }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="no-print">
        <button onclick="window.print()">Print</button>
    </div>
</body>

</html> --}}
