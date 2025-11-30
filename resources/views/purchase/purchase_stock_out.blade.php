<!DOCTYPE html>
<html lang="en">
<head>
    <title>Purchase Stcok Details | {{ $company->name ?? 'Undefined' }}</title>

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
                                <li class="breadcrumb-item"><a href="{{url('/purchase')}}">Product</a></li>
                                <li class="breadcrumb-item"><a href="{{url('/purchase-stock-in-view')}}">Stcok In</a></li>
                                <li class="breadcrumb-item" aria-current="page">Purchases Stcok Out</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
             
            <!-- [ Main Content ] start -->
            <div class="table-responsive">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5>Purchases Products Stock Out</h5>
                </div>
                <!-- Table Container with Scroll -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="table-responsive" style="max-height: 750px; overflow-y: auto;">
                            <table class="table table-bordered table-hover align-middle shadow-sm mb-0">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="text-center" width="50">SL</th>
                                        <th>Name</th>
                                        <th width="120">Stock</th>
                                        <th width="80" class="text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody id="food_table_body">
                                    @if($products)
                                    @foreach($products as $key => $val)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td><a href="{{ url('/specific-product-stock/'. $val->id) }}">{{$val->name}}</a></td>
                                        <td>{{$val->stock}}</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-outline-primary"
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#product{{ $val->id }}">
                                                <i class="fa-solid fa-screwdriver-wrench"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif   
                                    <tr>
                                        <td colspan="2" class="text-center">Total:</td>
                                        <td>{{ $products->sum('stock') }}</td>
                                        <td colspan="2"></td>
                                    </tr>                         
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="table-responsive" style="max-height: 750px; overflow-y: auto;">
                            <table class="table table-bordered table-hover align-middle shadow-sm mb-0">
                                <thead class="table-dark position-sticky top-0">
                                    <tr>
                                        <th class="text-center" width="50">SL</th>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th width="120" class="text-end">Stock Out</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($stockOutDetails as $val)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ \Carbon\Carbon::parse($val->date)->format('d M, Y') }}</td>
                                            <td>{{ $val->product->name }}</td>
                                            <td class="text-end">{{ $val->stockOut }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-muted py-3">
                                                No stock out records found.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <tr class="table-secondary fw-bold">
                                        <td colspan="3" class="text-center">Total Stock Out:</td>
                                        <td class="text-end">{{ $stockOutDetails->sum('stockOut') }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    @if($products)
    @foreach($products as $val)
    <div class="modal fade" id="product{{$val->id}}" tabindex="-1" aria-labelledby="editFoodLabel{{$val->id}}" aria-hidden="true">
        <div class="modal-dialog modal-lg"> <!-- Larger modal -->
            <div class="modal-content">
                <form action="{{ url('/product-stock-out/'.$val->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title" id="editFoodLabel{{$val->id}}">
                            Edit Product - {{ $val->name }} - {{$val->stock}}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <!-- Stock -->
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Stock</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="txtStock" placeholder="Enter your product stock qty." required min="0">
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to update this item?')">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
    @endif

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
