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
                                <li class="breadcrumb-item" aria-current="page">Due-list</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                <div class="col-lg-12 col-md-6">                    
                    <div class="row g-3">
                        <div class="container mt-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5>Due Details</h5>
                                <h5 class="m-0 text-primary">
                                    <a href="{{ route('print-total-daily-due-list') }}" target="_blank"><i class="fa-solid fa-print"></i> Print </a>
                                </h5>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered table-hover" id="printableTable">
                                    <thead class="table-primary sticky-top">
                                        <tr>
                                            <th class="text-center" style="width: 5%;">#</th>
                                            <th class="text-center" style="width: 10%;">Date</th>
                                            <th style="width: 40%;">Customer Name</th>
                                            <th style="width: 25%;">Order ID</th>
                                            <th style="width: 25%;">Amount</th>
                                            <th class="text-center" style="width: 10%;">Status</th>
                                            <th class="text-center" style="width: 15%;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $phone => $orderGroup)
                                            <!-- Group Header -->
                                            <tr class="table-info fw-bold">
                                                <td colspan="7">
                                                    Customer Phone: 0{{ $phone }}
                                                    <span class="float-end">Total Orders: {{ $orderGroup->count() }}</span>
                                                </td>
                                            </tr>

                                            <!-- Individual Orders Under Each Phone -->
                                            @foreach($orderGroup as $val)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>

                                                    <td class="text-center">{{ $val->date }}</td>

                                                    <td>
                                                        <a href="{{ url('/order-item/'. $val->reg) }}" 
                                                        class="text-primary text-decoration-none">
                                                            {{ $val->customerName == '0' ? 'N/A' : $val->customerName }}
                                                        </a>
                                                    </td>

                                                    <td class="fw-bold">
                                                        <a href="{{ url('/order-item/'. $val->reg) }}" 
                                                        class="text-primary text-decoration-none">
                                                            ORD-{{ $val->reg }}
                                                        </a>
                                                    </td>

                                                    <td class="fw-bold">
                                                        <a href="{{ url('/order-item/'. $val->reg) }}" 
                                                        class="text-primary text-decoration-none">
                                                            ৳{{ $val->due }}/-
                                                        </a>
                                                    </td>

                                                    <td class="text-center">
                                                        <span class="badge rounded-pill bg-danger fw-normal px-2 py-1"
                                                            data-bs-toggle="modal" data-bs-target="#due{{ $val->id }}"
                                                            style="cursor: pointer;">
                                                            Due
                                                        </span>
                                                    </td>

                                                    <td class="text-center">

                                                        <!-- Print Invoice -->
                                                        <a href="{{ url('/order-invoice-print/'.$val->reg) }}" 
                                                        target="_blank" 
                                                        class="btn btn-sm btn-outline-primary me-2">
                                                            <i class="fa-solid fa-print"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                                <tr>
                                                    <td colspan="4">Total:</td>
                                                    <td class="text-primary text-decoration-none">৳{{ $orderGroup->sum('due') }}/-</td>
                                                    <td colspan="2"></td>
                                                </tr>

                                        @endforeach
                                            <tr class="table-secondary fw-bold">
                                                <td colspan="4">Total Due</td>
                                                <td>৳{{ $orders->flatten()->sum('due') }}/-</td>
                                                <td colspan="2"></td>                                                
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
    <script src="{{ asset('./js/due.js') }}"></script>
    
</body>
</html>
