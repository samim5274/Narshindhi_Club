<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Total Transaction Report - {{ $company->name }}</title>

    <style>
        @page {
            size: A4;
            margin: 25mm 20mm;
        }

        body {
            font-family: 'Consolas', 'Courier New', monospace;
            font-size: 13px;
            color: #222;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 2px solid #000;
        }

        .header h1 {
            margin: 0;
            font-size: 22px;
            text-transform: uppercase;
            font-weight: bold;
        }

        .header p {
            margin: 2px 0;
            font-size: 12px;
        }

        .statement-title {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin: 12px 0;
            text-decoration: underline;
        }

        .info-box {
            margin-bottom: 15px;
            line-height: 1.4;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 12px;
            font-size: 13px;
        }

        table th {
            background: #eaeaea;
            border-bottom: 1px solid #000;
            padding: 8px;
            text-align: left;
            font-weight: bold;
        }

        table td {
            padding: 8px;
            border-bottom: 1px solid #dcdcdc;
        }

        .amount {
            text-align: right;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 11px;
            color: #666;
            border-top: 1px solid #bbb;
            padding-top: 10px;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>{{ $company->name }}</h1>
        <p>{{ $company->address }}</p>
        <p>{{ $company->email }} | {{ $company->phone }}</p>
    </div>

    <div class="statement-title">TOTAL TRANSACTION REPORT</div>

    <div class="info-box">
        <div class="info-row">
            <span><strong>Report Period:</strong> {{ $fromDate }} to {{ $toDate }}</span>
            <span><strong>Generated:</strong> {{ date('d-m-Y') }}</span>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Transaction Type</th>
                <th class="amount">Total Amount (BD taka)</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>Total Sale</td>
                <td class="amount">{{ number_format($totalOrders, 2) }}/-</td>
            </tr>
            <tr>
                <td>Total Due Collection</td>
                <td class="amount">{{ number_format($totalDueCollection, 2) }}/-</td>
            </tr>
            <tr>
                <td>Total Income</td>
                <td class="amount">{{ number_format($totalIncome, 2) }}/-</td>
            </tr>
            <tr>
                <td>Bank Withdraw</td>
                <td class="amount">{{ number_format($bankWithdraw, 2) }}/-</td>
            </tr>
            <tr>
                <td>Total Expense</td>
                <td class="amount">{{ number_format($totalExpenses, 2) }}/-</td>
            </tr>
            <tr>
                <td>Bank Deposit</td>
                <td class="amount">{{ number_format($bankDeposit, 2) }}/-</td>
            </tr>   
            <tr>
                <td><strong>Balance</strong></td>
                @php $balance = ($totalIncome + $totalDueCollection + $totalOrders + $bankWithdraw)  - ($totalExpenses + $bankDeposit); @endphp
                <td class="amount"><strong>{{ number_format($balance, 2) }}/-</strong></td>
            </tr>           
        </tbody>
    </table>

    <div class="footer">
        This is a system-generated report and does not require a signature.<br>
        Developed by <b>SAMIM-HosseN</b> | +8801762164746
    </div>

</body>
</html>