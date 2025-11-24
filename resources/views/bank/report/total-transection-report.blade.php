<!DOCTYPE html>
<html lang="en">
<head>
    <title>Total Transection | {{ $company->name ?? 'Undefined' }}</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="#">
    <meta name="author" content="#">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
          id="main-font-link">

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link">
    <link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
    <!-- Pre-loader -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    @include('layouts.menu')

    <!-- Header -->
    @include('home')

    <!-- Main Content -->
    <div class="pc-container">
        <div class="pc-content">
           @include('layouts.message')
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <h2>BBTS Details</h2>
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{url('/bank-to-transection-view')}}">Bank to Bank Transection</a></li>
                                <li class="breadcrumb-item" aria-current="page">Total Transection Report</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ url('/filter-transection-date') }}" method="GET" class="row g-3">
                                @csrf

                                <!-- From Date -->
                                <div class="col-lg-6">
                                    <label for="from_date" class="form-label">From <span class="text-danger">*</span></label>
                                    <input type="date" name="from_date" id="from_date"
                                        class="form-control"
                                        required>
                                </div>

                                <!-- To Date -->
                                <div class="col-lg-6">
                                    <label for="to_date" class="form-label">To <span class="text-danger">*</span></label>
                                    <input type="date" name="to_date" id="to_date"
                                        class="form-control"
                                        required>
                                </div>

                                <!-- Submit -->
                                <div class="col-12">
                                    <button type="submit" 
                                            class="btn btn-primary btn d-flex align-items-center justify-content-center gap-2 w-100"
                                            onclick="return confirm('Are you sure you want to filter?')">
                                        <i class="mdi mdi-bank-transfer-out-outline" style="font-size: 1.5rem;"></i>
                                        <span>Filter Transaction</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card shadow-sm border-0 rounded-3">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="card-title fw-bold mb-0">
                                        Total Transection Details -
                                        <span class="">
                                            ৳{{$balance}}/-
                                        </span>
                                    </h5>
                                </div>

                                <div class="row g-3">
                                    <div class="col-lg-12">
                                        <div class="card shadow-sm">
                                            <div class="card-body p-0">
                                                <div style="max-height: 500px; overflow-y: auto;">
                                                    <table class="table table-hover table-striped mb-0">
                                                        <thead class="table-light sticky-top">
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Bank</th>
                                                                <th>Date</th>
                                                                <th>Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse($transectionDetails as $key => $deposit)
                                                                <tr>
                                                                    <td>{{ $key + 1 }}</td>
                                                                    <td>{{ $deposit->bankDetail->bank_name ?? 'N/A' }}</td>
                                                                    <td>৳{{ \Carbon\Carbon::parse($deposit->date)->format('d M, Y') }}</td>
                                                                    @if($deposit->status == 'Deposit')
                                                                    <td class="text-end text-success">+ ৳{{ number_format($deposit->amount, 2) }}/-</td>
                                                                    @else
                                                                    <td class="text-end text-danger">- ৳{{ number_format($deposit->amount, 2) }}/-</td>
                                                                    @endif
                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <td colspan="4" class="text-center text-muted">No deposit records found.</td>
                                                                </tr>
                                                            @endforelse
                                                            <tr class="table-secondary fw-bold">
                                                                <td colspan="3">Balance:</td>
                                                                <td class="text-end"> ৳{{$balance}}/-</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    @include('layouts.footer')

    <!-- Required JS -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/fonts/custom-font.js') }}"></script>
    <script src="{{ asset('assets/js/pcoded.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let today = new Date().toISOString().split("T")[0];

            // Set default date = today
            document.getElementById("from_date").value = today;
            document.getElementById("to_date").value = today;

            // Disable future date
            document.getElementById("from_date").setAttribute("max", today);
            document.getElementById("to_date").setAttribute("max", today);

            // To Date should not be earlier than From Date
            document.getElementById("from_date").addEventListener("change", function () {
                document.getElementById("to_date").setAttribute("min", this.value);
            });
        });
    </script>

</body>
</html>
