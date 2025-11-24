<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bank Details | {{ $company->name ?? 'Undefined' }}</title>

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
                        <h2>Bank Details</h2>
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
                                <li class="breadcrumb-item" aria-current="page">Bank</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <div class="row">                    
                <div class="col-lg-12">
                    <div class="card shadow-sm">
                        <div class="card-body">                                
                            <div class="row">
                                <!-- Left side (Profile Info) -->
                                <div class="col-lg-8">
                                    <form action="{{ url('/create-bank') }}" method="POST">
                                        @csrf

                                        <!-- Bank Name -->
                                        <div class="mb-3">
                                            <label for="bank_name" class="form-label">Bank Name <span class="text-danger">*</span></label>
                                            <input type="text" name="bank_name" id="bank_name" 
                                                class="form-control form-control" value="Datch Bangla Bank Ltd."
                                                placeholder="Enter bank name" required>
                                        </div>

                                        <!-- Branch Name -->
                                        <div class="mb-3">
                                            <label for="branch_name" class="form-label">Branch Name</label>
                                            <input type="text" name="branch_name" id="branch_name" 
                                                class="form-control form-control" value="Narshindhi Branch"
                                                placeholder="Enter branch name (optional)">
                                        </div>

                                        <div class="row g-3">
                                            <!-- Account Holder Name -->
                                            <div class="col-md-6">
                                                <label for="account_name" class="form-label">Account Holder Name <span class="text-danger">*</span></label>
                                                <input type="text" name="account_name" id="account_name" 
                                                    class="form-control form-control" value="Narshindhi Club"
                                                    placeholder="Enter account holder name" required>
                                            </div>

                                            <!-- Account Number -->
                                            <div class="col-md-6">
                                                <label for="account_number" class="form-label">Account Number <span class="text-danger">*</span></label>
                                                <input type="text" name="account_number" id="account_number" 
                                                    class="form-control form-control" value="DBBL1234567890"
                                                    placeholder="Enter account number" required>
                                            </div>
                                        </div>

                                        <!-- Routing Number -->
                                        <div class="mt-3">
                                            <label for="routing_number" class="form-label">Routing Number (optional)</label>
                                            <input type="text" name="routing_number" id="routing_number" 
                                                class="form-control form-control" value="DBBLIBAN9876543210"
                                                placeholder="Enter routing/IBAN/SWIFT code">
                                        </div>

                                        <!-- Remarks -->
                                        <div class="mt-3 mb-3">
                                            <label for="remarks" class="form-label">Remarks (optional)</label>
                                            <textarea name="remarks" id="remarks" 
                                                    class="form-control form-control" rows="4" 
                                                    placeholder="Additional notes...">N/A</textarea>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-success btn-md d-flex align-items-center justify-content-center gap-2" onclick="return confirm('Are you sure you want create this Bank Details?')">
                                                <i class="mdi mdi-plus-circle-outline" style="font-size: 1.5rem;"></i>
                                                <span>Create new Bank</span>
                                            </button>
                                        </div>

                                    </form>
                                </div>

                                <!-- Right side (Form) -->
                                <div class="col-md-4">
                                    <div class="table-responsive">
                                        <div style="max-height: 600px; overflow-y: auto;">
                                            <table class="table table-borderless mb-0">
                                                <tbody>
                                                @forelse($bankDetails as $key => $detail)
                                                    <div class="card-body shadow-sm mb-3 border rounded">
                                                        <h5 class="card-title fw-bold text-primary mb-2">
                                                            #{{ $key + 1 }} - {{ $detail->bank_name ?? 'N/A' }}
                                                        </h5>

                                                        <!-- Account Details Badges -->
                                                        <div class="d-flex flex-wrap gap-2 mb-3">
                                                            <span class="badge bg-primary text-white">
                                                                Branch: {{ $detail->branch_name ?? '-' }}
                                                            </span>
                                                            <span class="badge bg-secondary text-white">
                                                                Holder: {{ $detail->account_name ?? '-' }}
                                                            </span>
                                                            <span class="badge bg-info text-dark">
                                                                A/C: {{ $detail->account_number ?? '-' }}
                                                            </span>
                                                            @if($detail->routing_number)
                                                                <span class="badge bg-success text-white">
                                                                    R/N: {{ $detail->routing_number }}
                                                                </span>
                                                            @endif
                                                        </div>

                                                        <!-- Optional Remarks -->
                                                        @if($detail->remarks)
                                                            <p class="card-text text-muted small mb-2">
                                                                Remarks: {{ $detail->remarks }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                @empty
                                                    <div class="col-12">
                                                        <div class="alert alert-warning text-center">
                                                            No bank details found.
                                                        </div>
                                                    </div>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- End inner row -->
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

</body>
</html>
