<!DOCTYPE html>
<html lang="en">
<head>
    <title>Member Due Details | {{ $company->name ?? 'Undefined' }}</title>

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
                                <li class="breadcrumb-item"><a href="{{url('/membership')}}">Member</a></li>
                                <li class="breadcrumb-item" aria-current="page">Payment Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                <div class="col-lg-12 col-md-6">
                    <div class="card shadow-sm mb-4">
                        <div class="card-he<div class="card shadow-lg mb-4">
                            <div class="card-header bg-gradient-primary text-black fw-bold text-center fs-5">
                                Total Summary
                            </div>
                            <div class="card-body">
                                <div class="row g-3 text-center">

                                    <!-- Total -->
                                    <div class="col-md-2 col-6">
                                        <div class="p-3 rounded border bg-light h-100 d-flex flex-column justify-content-center align-items-center">
                                            <i class="fa-solid fa-calculator fs-3 text-primary mb-2"></i>
                                            <h6 class="fw-bold mb-1">Total</h6>
                                            <p class="fs-5 mb-0">৳{{ $totalSum }}/-</p>
                                        </div>
                                    </div>

                                    <!-- Discount -->
                                    <div class="col-md-2 col-6">
                                        <div class="p-3 rounded border bg-light h-100 d-flex flex-column justify-content-center align-items-center">
                                            <i class="fa-solid fa-percent fs-3 text-success mb-2"></i>
                                            <h6 class="fw-bold mb-1">Discount</h6>
                                            <p class="fs-5 mb-0">৳{{ $dueDiscount + $discountSum }}/-</p>
                                        </div>
                                    </div>

                                    <!-- Payable -->
                                    <div class="col-md-2 col-6">
                                        <div class="p-3 rounded border bg-light h-100 d-flex flex-column justify-content-center align-items-center">
                                            <i class="fa-solid fa-money-bill-wave fs-3 text-warning mb-2"></i>
                                            <h6 class="fw-bold mb-1">Payable</h6>
                                            <p class="fs-5 mb-0">৳{{ $payableSum }}/-</p>
                                        </div>
                                    </div>

                                    <!-- Paid -->
                                    <div class="col-md-2 col-6">
                                        <div class="p-3 rounded border bg-light h-100 d-flex flex-column justify-content-center align-items-center">
                                            <i class="fa-solid fa-hand-holding-dollar fs-3 text-info mb-2"></i>
                                            <h6 class="fw-bold mb-1">Paid</h6>
                                            <p class="fs-5 mb-0">৳{{ $paidSum }}/-</p>
                                        </div>
                                    </div>

                                    <!-- Due -->
                                    <div class="col-md-2 col-6">
                                        <div class="p-3 rounded border bg-light h-100 d-flex flex-column justify-content-center align-items-center">
                                            <i class="fa-solid fa-clock fs-3 text-danger mb-2"></i>
                                            <h6 class="fw-bold mb-1">Due</h6>
                                            <p class="fs-5 mb-0">৳{{ $dueSum - $duePay - $dueDiscount }}/-</p>
                                        </div>
                                    </div>

                                    <!-- Balance -->
                                    <div class="col-md-2 col-6">
                                        <div class="p-3 rounded h-100 d-flex flex-column justify-content-center align-items-center bg-gradient-warning text-dark shadow-sm">
                                            <i class="fa-solid fa-wallet fs-3 text-success mb-2"></i>
                                            <h6 class="fw-bold mb-1">Balance</h6>
                                            <p class="fs-5 mb-0">৳{{ $balance }}/-</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-6">                    
                    <div class="row g-3">
                        <div class="container mt-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5>{{ $data[0]->customerName ?? 'N/A' }} - Due Details</h5>
                                <h5 class="m-0 text-primary">
                                    <!-- <a href="{{ route('print-total-daily-due-list') }}" target="_blank"><i class="fa-solid fa-print"></i> Print </a> -->
                                </h5>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered table-hover" id="printableTable">
                                    <thead class="table-primary sticky-top">
                                        <tr>
                                            <th class="text-center" style="width: 5%;">#</th>
                                            <th class="text-center" style="width: 10%;">Date</th>
                                            <th style="width: 10%;">Order ID</th>
                                            <th class="text-center" style="width: 8%;">Total</th>
                                            <th class="text-center" style="width: 8%;">Discount</th>
                                            <th class="text-center" style="width: 10%;">Payable</th>
                                            <th class="text-center" style="width: 8%;">Paid</th>
                                            <th class="text-center" style="width: 8%;">Due</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($data as $key => $val)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $val->date }}</td>
                                            <td class="fw-bold">
                                                <a href="{{ url('/order-item/'. $val->reg) }}" 
                                                class="text-primary text-decoration-none">
                                                #ORD-{{ $val->reg }}
                                                </a>
                                            </td>
                                            <td class="text-center">৳{{ $val->total }}/-</td>
                                            <td class="text-center">৳{{ $val->discount }}/-</td>
                                            <td class="text-center">৳{{ $val->payable }}/-</td>
                                            <td class="text-center">৳{{ $val->pay }}/-</td>
                                            <td class="text-center">৳{{ $val->due }}/-</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot class="table-light fw-bold">
                                        <tr>
                                            <td colspan="3" class="text-end">Total:</td>
                                            <td class="text-center">৳{{ $totalSum }}/-</td>
                                            <td class="text-center">৳{{ $discountSum }}/-</td>
                                            <td class="text-center">৳{{ $payableSum }}/-</td>
                                            <td class="text-center">৳{{ $paidSum }}/-</td>
                                            <td class="text-center">৳{{ $dueSum }}/-</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5>{{ $data[0]->customerName ?? 'N/A' }} - Payment Details</h5>
                                    <h5 class="m-0 text-primary">
                                        <!-- <a href="{{ route('print-total-daily-due-list') }}" target="_blank"><i class="fa-solid fa-print"></i> Print </a> -->
                                    </h5>
                                </div>
                                <table class="table table-sm table-bordered table-hover" id="printableTable">
                                    <thead class="table-primary sticky-top">
                                        <tr>
                                            <th class="text-center" style="width: 5%;">#</th>
                                            <th class="text-center" style="width: 15%;">Date</th>
                                            <th class="text-center" style="width: 10%;">Discount</th>
                                            <th class="text-center" style="width: 10%;">Pay</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($dueCollections as $due)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">
                                                {{ $due->created_at->format('Y-m-d') }}
                                            </td>
                                            <td class="text-center">৳{{ $due->discount }}/-</td>
                                            <td class="text-center">৳{{ $due->pay }}/-</td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                    <tfoot class="table-light fw-bold">
                                        <tr>
                                            <td colspan="2" class="text-end">Total:</td>
                                            <td class="text-center">৳{{ $dueDiscount }}/-</td>
                                            <td class="text-center">৳{{ $duePay }}/-</td>
                                        </tr>
                                    </tfoot>
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
    <script src="{{ asset('./js/due.js') }}"></script>
    
</body>
</html>
