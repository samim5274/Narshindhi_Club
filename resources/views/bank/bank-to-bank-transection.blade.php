<!DOCTYPE html>
<html lang="en">
<head>
    <title>BBTS | {{ $company->name ?? 'Undefined' }}</title>

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
                                <li class="breadcrumb-item" aria-current="page">Bank to Bank Transection</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->

            <!-- Modal -->
            <div class="modal fade" id="bankTransferModal" tabindex="-1" aria-labelledby="bankTransferModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title text-white" id="bankTransferModalLabel">Bank to Bank Transfer</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('/bank-to-bank-transection') }}" method="POST" class="row g-3">
                                @csrf

                                <!-- From Bank -->
                                <div class="col-lg-6">
                                    <label for="from_bank" class="form-label">From <span class="text-danger">*</span></label>
                                    <select name="from_bank" id="from_bank" class="form-select form-select" required>
                                        <option value="">-- Select Bank --</option>
                                        @foreach($bankDetails as $bank)
                                            <option value="{{ $bank->id }}">{{ $bank->bank_name }} - {{ $bank->account_number }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- To Bank -->
                                <div class="col-lg-6">
                                    <label for="to_bank" class="form-label">To <span class="text-danger">*</span></label>
                                    <select name="to_bank" id="to_bank" class="form-select form-select" required>
                                        <option value="">-- Select Bank --</option>
                                        @foreach($bankDetails as $bank)
                                            <option value="{{ $bank->id }}">{{ $bank->bank_name }} - {{ $bank->account_number }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Amount -->
                                <div class="col-12">
                                    <label for="amount" class="form-label">Amount <span class="text-danger">*</span></label>
                                    <input type="number" name="amount" id="amount" 
                                        class="form-control form-control" 
                                        min="0" step="0.01" placeholder="Enter amount" required>
                                </div>

                                <!-- Remarks -->
                                <div class="col-12">
                                    <label for="remarks" class="form-label">Remarks (optional)</label>
                                    <textarea name="remarks" id="remarks" 
                                            class="form-control form-control" rows="4" 
                                            placeholder="Additional notes...">N/A</textarea>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success btn d-flex align-items-center justify-content-center gap-2 w-100"
                                            onclick="return confirm('Are you sure you want to save this?')">
                                        <i class="mdi mdi-bank-transfer-out-outline" style="font-size: 1.5rem;"></i>
                                        <span>Transfer Amount</span>
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
                                    <!-- Card Title with Total Deposit -->
                                    <h5 class="card-title fw-bold mb-0">
                                        Bank Deposit Details - 
                                        <span class="text-success">
                                            ৳{{$balance}}/-
                                        </span>
                                    </h5>

                                    <!-- Bank Transfer Button -->
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#bankTransferModal">
                                        <i class="mdi mdi-bank-transfer-out-outline me-1"></i>
                                        Bank to Bank Transfer
                                    </button>
                                </div>

                                <div class="row g-3">
                                    <!-- Deposit Card -->
                                    <div class="col-lg-6">
                                        <div class="card shadow-sm">
                                            <div class="card-header fw-bold bg-success text-white d-flex justify-content-between align-items-center">
                                                Bank Deposit Details
                                                <span>৳{{ number_format($dipositDetails->sum('amount'), 2) ?? '0.00' }}/-</span>
                                            </div>
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
                                                            @forelse($dipositDetails as $key => $deposit)
                                                                <tr>
                                                                    <td>{{ $key + 1 }}</td>
                                                                    <td>{{ $deposit->bankDetail->bank_name ?? 'N/A' }}</td>
                                                                    <td>৳{{ \Carbon\Carbon::parse($deposit->date)->format('d M, Y') }}</td>
                                                                    <td class="text-end text-success">{{ number_format($deposit->amount, 2) }}/-</td>
                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <td colspan="4" class="text-center text-muted">No deposit records found.</td>
                                                                </tr>
                                                            @endforelse
                                                            <tr class="table-secondary fw-bold">
                                                                <td colspan="3">Total Deposit:</td>
                                                                <td class="text-end text-success">৳{{ number_format($dipositDetails->sum('amount'), 2) }}/-</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Withdraw Card -->
                                    <div class="col-lg-6">
                                        <div class="card shadow-sm">
                                            <div class="card-header fw-bold bg-danger text-white d-flex justify-content-between align-items-center">
                                                Bank Withdraw Details
                                                <span>৳{{ number_format($withdrawDetails->sum('amount'), 2) ?? '0.00' }}/-</span>
                                            </div>
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
                                                            @forelse($withdrawDetails as $key => $withdraw)
                                                                <tr>
                                                                    <td>{{ $key + 1 }}</td>
                                                                    <td>{{ $withdraw->bankDetail->bank_name ?? 'N/A' }}</td>
                                                                    <td>{{ \Carbon\Carbon::parse($withdraw->date)->format('d M, Y') }}</td>
                                                                    <td class="text-end text-danger">৳{{ number_format($withdraw->amount, 2) }}/-</td>
                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <td colspan="4" class="text-center text-muted">No withdraw records found.</td>
                                                                </tr>
                                                            @endforelse
                                                            <tr class="table-secondary fw-bold">
                                                                <td colspan="3">Total Withdraw:</td>
                                                                <td class="text-end text-danger">৳{{ number_format($withdrawDetails->sum('amount'), 2) }}/-</td>
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

</body>
</html>
