<!DOCTYPE html>
<html lang="en">
<head>
    <title>Income Report | {{ $company->name ?? 'Undefined' }}</title>

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
                                <li class="breadcrumb-item"><a href="{{url('/extra-income')}}">Income</a></li>
                                <li class="breadcrumb-item" aria-current="page">Income Report</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
             
            <!-- [ Main Content ] start -->
            <div class="table-responsive">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5>Income Report</h5>
                </div>
                <!-- Table Container with Scroll -->
                <div class="table-responsive" style="max-height: 750px; overflow-y: auto;">
                    <table class="table table-bordered table-hover align-middle shadow-sm mb-0">
                        <thead class="table-dark">
                           <tr class="table-light">
                                <th colspan="6" class="text-center">
                                    <form action="{{ url('/filter-income-date') }}" method="GET" class="d-flex justify-content-center align-items-center gap-2">
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
                            <tr>
                                <th class="text-center" width="60">SL</th>
                                <th>Title</th>
                                <th width="220">Category</th>
                                <th width="220">Subcategory</th>
                                <th class="text-center" width="120">Date</th>
                                <th class="text-center" width="120">Amount (৳)</th>
                            </tr>
                        </thead>
                        <tbody id="food_table_body">
                            @foreach ($incomes as $key => $val)
                                <tr>
                                    <td class="text-center fw-semibold">{{ $key + 1 }}</td>

                                    <td class="fw-semibold text-primary">
                                        {{ $val->title ?? 'N/A' }} 
                                    </td>

                                    <td>{{ $val->category->name ?? 'N/A' }}</td>

                                    <td class="text-muted">
                                        {{ $val->subcategory->name ?? 'N/A' }}
                                    </td>

                                    <td class="text-center">
                                        {{ \Carbon\Carbon::parse($val->expense_date)->format('d M, Y') }}
                                    </td>

                                    <td class="text-center fw-bold text-danger">
                                        ৳{{ number_format($val->amount, 2) }}/-
                                        <a href="{{ url('/print-expenses-invoice/'.$val->id) }}" target="_blank">
                                            <i class="fa-solid fa-print" style="cursor:pointer;"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            <tr class="table-secondary fw-bold">
                                <td colspan="5" class="text-end">Total Expense:</td>
                                <td class="text-center text-danger">
                                    ৳{{ number_format($incomes->sum('amount'), 2) }}/-
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
