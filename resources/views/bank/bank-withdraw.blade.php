<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bank Withdraw | {{ $company->name ?? 'Undefined' }}</title>

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
                        <h2>Bank Withdraw</h2>
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
                                <li class="breadcrumb-item" aria-current="page">Bank Withdraw</li>
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
                                    <form action="{{ url('/bank-withdraw-amount') }}" method="POST">
                                        @csrf

                                        <!-- Bank Name -->
                                        <div class="mb-3">
                                            <label for="bank_name" class="form-label">Bank Name <span class="text-danger">*</span></label>
                                            <select name="bank_name" id="bank_name" class="form-select form-select" required>
                                                <option value="">-- Select Bank --</option>
                                                @foreach($bankDetails as $bank)
                                                    <option value="{{ $bank->id }}">{{ $bank->bank_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Amount -->
                                        <div class="mb-3">
                                            <label for="amount" class="form-label">Amount</label>
                                            <input type="number" name="amount" id="amount" 
                                                class="form-control form-control" 
                                                value="Narshindhi Branch" min="0"
                                                placeholder="Enter branch name (optional)">
                                        </div>

                                        <!-- Remarks -->
                                        <div class="mb-3">
                                            <label for="remarks" class="form-label">Remarks (optional)</label>
                                            <textarea name="remarks" id="remarks" 
                                                    class="form-control form-control" rows="4" 
                                                    placeholder="Additional notes...">N/A</textarea>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary btn d-flex align-items-center justify-content-center gap-2" 
                                                    onclick="return confirm('Are you sure you want to save this?')">
                                                <i class="mdi mdi-plus-circle-outline" style="font-size: 1.5rem;"></i>
                                                <span>Withdraw Amount</span>
                                            </button>
                                        </div>
                                    </form>

                                </div>

                                <!-- Right side (Form) -->
                                <div class="col-md-4">
                                    <div class="card shadow-sm border-0 rounded-3">
                                        <div class="card-header bg-primary text-white fw-bold">
                                            Bank Withdraw Details - ৳{{ number_format($withdrawDetails->sum('amount'), 2) ?? '0.00' }}/-
                                        </div>
                                        <div class="card-body p-0">
                                            <div style="max-height: 350px; overflow-y: auto;">
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
                                                        @forelse($withdrawDetails as $key => $Withdraw)
                                                            <tr>
                                                                <td>{{ $key + 1 }}</td>
                                                                <td>{{ $Withdraw->bankDetail->bank_name ?? 'N/A' }}</td>
                                                                <td>{{ \Carbon\Carbon::parse($Withdraw->date)->format('d M, Y') }}</td>
                                                                <td>৳{{ number_format($Withdraw->amount, 2) ?? '0.00' }}/-</td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="4" class="text-center text-muted">No Withdraw records found.</td>
                                                            </tr>
                                                        @endforelse
                                                        <tr class="table-secondary fw-bold">
                                                            <td colspan="2">Total Withdraw:</td>
                                                            <td colspan="2" class="text-end">৳{{ number_format($withdrawDetails->sum('amount'), 2) ?? '0.00' }}/-</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
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
