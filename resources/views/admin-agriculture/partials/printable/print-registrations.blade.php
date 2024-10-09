<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="{{ asset('../assets/img/logo/system-logo.png') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Municipal Fishing Gear License</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0.5in;
            font-size: 12px;
            line-height: 1.5;
        }

        .center {
            text-align: center;
        }

        h4,
        h5 {
            margin: 2px;
        }

        .field-label {
            font-weight: bold;
            display: inline-block;
            width: 220px;
        }

        .line {
            border-bottom: 1px solid black;
            display: inline-block;
            width: auto;
            vertical-align: bottom;
            margin-left: 5px;
        }

        .double-line {
            border-bottom: 1px solid black;
            display: inline-block;
            width: auto;
            vertical-align: bottom;
            margin-left: 5px;
        }

        .block-line {
            border-bottom: 1px solid black;
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }

        .inline-field {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }

        .inline-field-date {
            display: flex;
            align-items: start;
            margin-bottom: 5px;
        }

        .field-label-date {
            font-weight: bold;
            display: inline-block;
            width: 90px;
        }

        .inline-field-net {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }

        .field-label-net {
            font-weight: bold;
            display: inline-block;
            width: 160px;
        }

        .inline-field-nylon {
            align-items: start;
            margin-bottom: 5px;
        }

        .field-label-nylon {
            font-weight: bold;
            width: 140px;
        }

        .signature {
            text-align: center;
            margin-top: 20px;
        }

        .small-text {
            font-size: 10px;
        }

        .signature-block {
            margin-top: 30px;
            text-align: right;
        }

        .approval-block {
            margin-top: 30px;
        }

        .paid-info {
            margin-top: 20px;
        }

        .inline-paid-info {
            display: flex;
            justify-content: flex-start;
            margin-bottom: 5px;
        }

        .paid-label {
            font-weight: bold;
            margin-right: 10px;
        }

        .left-align {
            text-align: left;
        }

        .right-align {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .signature-row {
            display: flex;
            justify-content: space-between;
        }

        .signature-column {
            flex: 1;
            padding: 0 10px;
        }

        @media print {
            @page {
                margin: 0.5in;
            }
        }
    </style>
</head>

<body onload="window.print(); setTimeout(() => window.location.href = '{{ route('fishing-gear.index') }}', 1000);">
    <div class="print-container">
        <div class="center">
            <h4>Republic of the Philippines</h4>
            <h5>Province of Southern Leyte</h5>
            <h5>Municipality of Malitbog</h5>
            <h5>OFFICE OF THE MUNICIPAL AGRICULTURE SERVICES (OMAS)</h5>
            <p>-oo0oo-</p>
            <h4>MUNICIPAL FISHING GEAR LICENSE</h4>
        </div>

        <div>
            <div class="inline-field">
                <span class="field-label">Name of Owner</span> : <span class="line">{{ $gear->owner }}</span>
            </div>
            <div class="inline-field">
                <span class="field-label">Address</span> : <span class="line">Brgy. {{ $gear->address }}, Malitbog,
                    Southern
                    Leyte</span>
            </div>
            <div class="inline-field">
                <span class="field-label">Community Tax Certificate Number</span> : <span
                    class="line">{{ $gear->tax_cert_no }}</span>
            </div>
            <div class="inline-field-date">
                <span class="field-label-date">Date Issued:</span>
                <span class="line">{{ \Carbon\Carbon::parse($gear->date_issued)->format('F d, Y') }}</span>
                <span class="field-label-date" style="margin-left: 30px;">Place Issued:</span> <span
                    class="line">Brgy. {{ $gear->place_issued }}, Malitbog, Southern
                    Leyte</span>
            </div>
            <div class="inline-field">
                <span class="field-label">Name of Fishing Gear</span> : <span class="line">{{ $gear->fishing_gear }}
                    Hand Line</span>
            </div>
            <div class="inline-field">
                <span class="field-label">Specification of Fishing Gear</span> : <span
                    class="line">{{ $gear->specs }}</span>
            </div>
            <div class="inline-field-net">
                <span class="field-label-net">If Nets, Length (katas-on):</span>
                @if (!is_null($gear) && !is_null($gear->net_length))
                    <span class="line" style="margin-right: 10px;">{{ $gear->net_length }}</span> (panels dupa)
                @else
                    _____
                @endif

                <span class="field-label-net" style="margin-left: 30px;">Height/Depth (sangkad):</span>
                @if (!is_null($gear) && !is_null($gear->net_height))
                    <span class="line" style="margin-right: 10px;">{{ $gear->net_height }}</span> (dupa)
                @else
                    _____
                @endif
            </div>

            <div class="inline-field">
                <span class="field-label">Mesh Size (sukod sa mga mata)</span>:
                @if (!is_null($gear) && !is_null($gear->net_mesh_size))
                    <span class="line">{{ $gear->net_mesh_size }}</span>
                @else
                    _____
                @endif
            </div>

            <div class="inline-field-nylon">
                <span class="field-label-nylon">If Traps, Length:</span>
                @if (!is_null($gear) && !is_null($gear->trap_length))
                    <span class="line" style="margin-right: 10px;">{{ $gear->trap_length }}</span> (feet)
                @else
                    _____
                @endif

                <span class="field-label-nylon" style="margin-left: 20px;">Height:</span>
                @if (!is_null($gear) && !is_null($gear->trap_height))
                    <span class="line" style="margin-right: 10px;">{{ $gear->trap_height }}</span> (feet)
                @else
                    _____
                @endif

                <span class="field-label-nylon" style="margin-left: 20px;">Width:</span>
                @if (!is_null($gear) && !is_null($gear->trap_width))
                    <span class="line" style="margin-right: 10px;">{{ $gear->trap_width }}</span> (feet)
                @else
                    _____
                @endif

                <span class="field-label-nylon" style="margin-left: 20px;">Mesh Size:</span>
                @if (!is_null($gear) && !is_null($gear->trap_mesh_size))
                    <span class="line" style="margin-right: 10px;">{{ $gear->trap_mesh_size }}</span> (inches)
                @else
                    _____
                @endif
            </div>

            <div class="inline-field-nylon">
                <span class="field-label-nylon">If Hook & Line, # Nylon:</span>
                @if (!is_null($gear) && !is_null($gear->nylon))
                    <span class="line">{{ $gear->nylon }}</span>
                @else
                    _____
                @endif

                <span class="field-label-nylon" style="margin-left: 30px;">Size of Hooks:</span>
                @if (!is_null($gear) && !is_null($gear->hook_size))
                    <span class="line">{{ $gear->hook_size }}</span>
                @else
                    _____
                @endif

                <span class="field-label-nylon" style="margin-left: 30px;"># of Hooks:</span>
                @if (!is_null($gear) && !is_null($gear->hook_no))
                    <span class="line">{{ $gear->hook_no }}</span>
                @else
                    _____
                @endif
            </div>

            <div class="inline-field-nylon">
                <span class="field-label-nylon">Date Registered</span> :_______________
            </div>

            <p>
                I hereby certify that the above-mentioned information is true and correct to the best of my knowledge
                and belief.
            </p>

            <div class="signature-block right-align">
                <span class="line">RUEL N. DATWIN</span>
                <p class="small-text">Signature over Printed Name of Applicant</p>
            </div>

            <p>
                I hereby certify that the above-mentioned fishing gear specification is true and correct to the best of
                my knowledge and belief based on my evaluation and inspections.
            </p>

            <div class="signature-block right-align">
                <span class="line">APOLINARIO M. ESCABAL JR.</span>
                <p class="small-text">Signature over Name OMAS Representative</p>
                <div class="signature-row" style="margin-left: 370px">
                    <div class="signature-column">
                        <span class="line">AT-Fisheries</span>
                        <p class="line-above">Designation</p>
                    </div>
                    <div class="signature-column">
                        __________________
                        September 08, 2021
                        <p class="line-above">Date Inspected</p>
                    </div>
                </div>

            </div>

            <div class="approval-block">
                <p>Recommending Approval:</p>
                <div class="signature-block left-align"style="margin-left: 100px">
                    <span class="line">RUTHIE C. PARANTAR</span>
                    <p>OIC - Municipal Agriculturalist</p>
                </div>

                <p style="margin-left: 400px">APPROVED:</p>

                <div class="signature-block right-align">
                    <span class="line">HON. ANTONIO S. LURA, SR.</span>
                    <p style="margin-right: 40px">Municipal Mayor</p>
                </div>
            </div>

            <div class="paid-info">
                <div class="inline-paid-info">
                    <span class="paid-label">Paid Under OR #</span> : __________________
                </div>
                <div class="inline-paid-info">
                    <span class="paid-label">Amount Php</span> : __________________
                </div>
                <div class="inline-paid-info">
                    <span class="paid-label">Date Issued</span> : __________________
                </div>
            </div>
        </div>
</body>

</html>
