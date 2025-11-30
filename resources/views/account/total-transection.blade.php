<!DOCTYPE html>
<html lang="en">
<head>
    <title>Total Transection Report | {{ $company->name ?? 'Undefined' }}</title>

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
        
    <!-- Ajax google cdn for live search -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
                                <li class="breadcrumb-item" aria-current="page">Total Transection Report</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
             
            <!-- [ Main Content ] start -->
            <div class="table-responsive">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5>Total Transection Report</h5>
                </div>
                <!-- Table Container with Scroll -->
                <div class="table-responsive" style="max-height: 750px; overflow-y: auto;">
                    <table class="table table-bordered table-hover align-middle shadow-sm mb-0">
                        <thead class="table-dark">
                           <tr class="table-light">
                                <th colspan="6" class="text-center">
                                    <form action="{{ url('/filter-total-transection') }}" method="GET" class="d-flex justify-content-center align-items-center gap-2">
                                        <input type="date" name="from_date" class="form-control form-control-sm" value="{{ request('from_date') }}" max="{{ now()->toDateString() }}">
                                        <input type="date" name="to_date" class="form-control form-control-sm" value="{{ request('to_date') }}" max="{{ now()->toDateString() }}">
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            <i class="fa-solid fa-filter me-1"></i> Filter
                                        </button>
                                        <button type="submit" class="btn btn-sm btn-primary" value="1" name="btnPrint">
                                            <i class="fa-solid fa-print me-1"></i> Print
                                        </button>
                                    </form>
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>


                <div class="card shadow border-0 rounded-3 overflow-hidden">
                    
                    <!-- Header -->
                    <div class="card-header bg-gradient-secondary text-white py-3">
                        <h5 class="mb-0 fw-bold">
                            <i class="fa-solid fa-chart-line me-2"></i>Today’s Financial Overview
                        </h5>
                    </div>

                    @php $balance = ($totalIncome + $totalDueCollection + $totalOrders + $bankWithdraw)  - ($totalExpenses + $bankDeposit); @endphp
                    <div class="col-12 d-flex justify-content-center">
                        <div class="d-flex align-items-center p-3 bg-gradient-success rounded shadow-sm" style="max-width: 500px; width: 100%;">
                            <div class="icon bg-success text-white rounded-circle d-flex justify-content-center align-items-center me-3" style="width:50px; height:50px;">
                                <i class="fa-solid fa-wallet fa-lg"></i>
                            </div>
                            <div class="flex-grow-1 text-center">
                                <div class="small">Net Balance</div>
                                <div class="fw-bold fs-4">
                                    <h1 class="display-6 mb-0">৳{{ number_format($balance) }}/-</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Body -->
                    <div class="card-body p-3">
                        <div class="row g-3">

                            <!-- Total Sale -->
                            <div class="col-12 col-md-6">
                                <div class="d-flex align-items-center p-3 bg-light rounded shadow-sm">
                                    <div class="icon bg-info text-white rounded-circle d-flex justify-content-center align-items-center me-3" style="width:50px; height:50px;">
                                        <i class="fa-solid fa-cart-shopping fa-lg"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="text-muted small">Total Sale</div>
                                        <div class="fw-bold fs-5 text-info">+ ৳{{ number_format($totalOrders) }}</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Expenses -->
                            <div class="col-12 col-md-6">
                                <div class="d-flex align-items-center p-3 bg-light rounded shadow-sm">
                                    <div class="icon bg-danger text-white rounded-circle d-flex justify-content-center align-items-center me-3" style="width:50px; height:50px;">
                                        <i class="fa-solid fa-money-bill-wave fa-lg"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="text-muted small">Expenses</div>
                                        <div class="fw-bold fs-5 text-danger">- ৳{{ number_format($totalExpenses) }}</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Income -->
                            <div class="col-12 col-md-6">
                                <div class="d-flex align-items-center p-3 bg-light rounded shadow-sm">
                                    <div class="icon bg-success text-white rounded-circle d-flex justify-content-center align-items-center me-3" style="width:50px; height:50px;">
                                        <i class="fa-solid fa-circle-dollar-to-slot fa-lg"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="text-muted small">Income</div>
                                        <div class="fw-bold fs-5 text-success">+ ৳{{ number_format($totalIncome) }}</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Bank Withdraw -->
                            <div class="col-12 col-md-6">
                                <div class="d-flex align-items-center p-3 bg-light rounded shadow-sm">
                                    <div class="icon bg-secondary text-white rounded-circle d-flex justify-content-center align-items-center me-3" style="width:50px; height:50px;">
                                        <i class="fa-solid fa-right-left fa-lg"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="text-muted small">Bank Withdraw</div>
                                        <div class="fw-bold fs-5 text-secondary">- ৳{{ number_format($bankWithdraw) }}</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Due Collection -->
                            <div class="col-12 col-md-6">
                                <div class="d-flex align-items-center p-3 bg-light rounded shadow-sm">
                                    <div class="icon bg-primary text-white rounded-circle d-flex justify-content-center align-items-center me-3" style="width:50px; height:50px;">
                                        <i class="fa-solid fa-hand-holding-dollar fa-lg"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="text-muted small">Due Collection</div>
                                        <div class="fw-bold fs-5 text-primary">+ ৳{{ number_format($totalDueCollection) }}</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Bank Deposit -->
                            <div class="col-12 col-md-6">
                                <div class="d-flex align-items-center p-3 bg-light rounded shadow-sm">
                                    <div class="icon bg-warning text-dark rounded-circle d-flex justify-content-center align-items-center me-3" style="width:50px; height:50px;">
                                        <i class="fa-solid fa-building-columns fa-lg"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="text-muted small">Bank Deposit</div>
                                        <div class="fw-bold fs-5 text-warning">+ ৳{{ number_format($bankDeposit) }}</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Footer -->
                    <div class="card-footer bg-white text-center py-2">
                        <small class="text-muted">Report generated on {{ now()->format('d M, Y') }} - {{ Auth::guard('admin')->user()->name }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer')

    <!-- Page Specific JS -->
    <script src="{{ asset('assets/js/plugins/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard-default.js') }}"></script>

    <!-- Required JS -->
    <script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/fonts/custom-font.js') }}"></script>
    <script src="{{ asset('assets/js/pcoded.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>

</body>
</html>
