<!DOCTYPE html>
<html lang="en">
<head>
    <title>Due Details | {{ $company->name ?? 'Undefined' }}</title>

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
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{url('/total-due-list')}}">Member Due</a></li>
                                <li class="breadcrumb-item" aria-current="page">Member Report</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
             <div class="row ">
                <div class="col-lg-12 col-md-6">

                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('phone-number-wise-due-data') }}" target="_blank" method="GET" class="row g-3 align-items-end">

                                <!-- Start Date -->
                                <div class="col-md-6">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" name="start_date" id="start_date" class="form-control" required>
                                </div>

                                <!-- End Date -->
                                <div class="col-md-6">
                                    <label for="end_date">End Date</label>
                                    <input type="date" name="end_date" id="end_date" class="form-control" required>
                                </div>

                                <!-- Payment mathod -->
                                <div class="col-md-12">
                                    <select name="customer_id" id="customer_id" class="form-select" required>
                                        <option disabled selected>-- Select Customer --</option>
                                        @foreach($customers as $customer)
                                            <option value="{{ $customer->customerPhone }}">
                                                {{ $customer->customerName }} - ({{ $customer->customerPhone }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>



                                <!-- Filter Button -->
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary w-100">
                                        <i class="fa-solid fa-filter"></i> Filter
                                    </button>
                                </div>

                                <!-- Print Button -->
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-outline-secondary w-100" value="1" name="print">
                                        <i class="fa-solid fa-print"></i> Print
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <!-- [ Main Content ] start -->
            <div class="row">
                <div class="col-lg-12 col-md-6">                    
                    <div class="row g-3">
                        <div class="container mt-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5>Due Details</h5>
                                <!-- <h5 class="m-0 text-primary">
                                    <a href="{{ route('print-total-daily-due-list') }}" target="_blank"><i class="fa-solid fa-print"></i> Print </a>
                                </h5> -->
                            </div>
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered table-hover" id="printableTable">
                                    <thead class="table-primary sticky-top">
                                        <tr>
                                            <th class="text-center" style="width: 5%;">#</th>
                                            <th class="text-center" style="width: 10%;">Date</th>
                                            <th style="width: 20%;">Customer Name</th>
                                            <th style="width: 20%;" class="text-center">Customer Phone</th>
                                            <th style="width: 20%;" class="text-center">Order ID</th>
                                            <th style="width: 25%;" class="text-center">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $val)
                                        <tr class="align-middle">
                                            <td class="fw-bold text-secondary text-center">{{ $loop->iteration }}</td>
                                            <td class="text-muted text-center">{{ $val->date }}</td>
                                            <td class="fw-semibold text-dark">{{ $val->customerName }}</td>
                                            <td class="fw-semibold text-dark text-center">0{{ $val->customerPhone }}</td>
                                            <td class="text-muted text-center">ORD-{{ $val->reg }}</td>
                                            <td class="text-center"><span class="text-danger">-৳{{ $val->due }}/-</span></td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="5">Tota:</td>
                                            <td class="text-center">৳{{$orders->sum('due')}}/-</td>
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
            let today = new Date().toISOString().split('T')[0];

            // Set default value to today
            document.getElementById("start_date").value = today;
            document.getElementById("end_date").value = today;

            // Disable future dates
            document.getElementById("start_date").setAttribute("max", today);
            document.getElementById("end_date").setAttribute("max", today);
        });
    </script>
    
</body>
</html>
