<!DOCTYPE html>
<html lang="en">
<head>
    <title>Purchase Details | {{ $company->name ?? 'Undefined' }}</title>

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
                                <li class="breadcrumb-item" aria-current="page">Purchases</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
             
            <!-- [ Main Content ] start -->
            <div class="table-responsive">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5>Purchases Products Details</h5>
                    <h5 class="m-0 text-primary">
                        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#food"><i class="fa-solid fa-circle-plus"></i> Add </button>
                    </h5>
                </div>
                <!-- Table Container with Scroll -->
                <div class="table-responsive" style="max-height: 750px; overflow-y: auto;">
                    <table class="table table-bordered table-hover align-middle shadow-sm mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center" width="50">SL</th>
                                <th>Name</th>
                                <th width="120">Purchase Price</th>
                                <th width="120">Total Price</th>
                                <th width="120">Stock</th>
                                <th width="200" class="text-center">Remark</th>
                                <th width="80" class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody id="food_table_body">
                            @if($products)
                            @foreach($products as $key => $val)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$val->name}}</td>
                                <td>৳{{$val->purchase_price}}/-</td>
                                <td>৳{{$val->total_price}}/-</td>
                                <td>{{$val->stock}}</td>
                                <td>{{ Str::limit($val->remark, 20, '...') }}</td>
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
                                <td colspan="3" class="text-center">Total:</td>
                                <td>৳{{ $products->sum('total_price') }}/-</td>
                                <td>{{ $products->sum('stock') }}</td>
                                <td colspan="2"></td>
                            </tr>
                        </tbody>
                    </table>
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
                <form action="{{ url('/edit-product/'.$val->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title" id="editFoodLabel{{$val->id}}">
                            Edit Product - {{ $val->name }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <!-- Food Name -->
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="txtName" value="{{ $val->name }}" required>
                            </div>
                        </div>

                        <!-- Price -->
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Purchase Price</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="txtPurchasePrice" value="{{ $val->purchase_price }}" min="0" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Total Price</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="txtTotalPrice" value="{{ $val->total_price }}" min="0" required>
                            </div>
                        </div>

                        <!-- Stock -->
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Stock</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="txtStock" value="{{ $val->stock }}" required min="0">
                            </div>
                        </div>

                        <!-- Description / Remark -->
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Remarks</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="remark" rows="3">{{ $val->remark }}</textarea>
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


    <!-- Create Modal -->
    <div class="modal fade" id="food" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"> <!-- modal-lg = width increased -->
            <div class="modal-content">

                <form action="{{ url('/create-new-product') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <!-- Food Name -->
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="txtName" placeholder="Enter product name" required>
                            </div>
                        </div>

                        <!-- Price -->
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Purchase Price</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="txtPurchasePrice" placeholder="Purchase price" min="0" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Total Price</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="txtTotalPrice" min="0" placeholder="Total price" required>
                            </div>
                        </div>

                        <!-- Stock -->
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Stock</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="txtStock" placeholder="Total Stock" required min="0">
                            </div>
                        </div>

                        <!-- Description / Remark -->
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Remarks</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="remark" rows="3">N/A</textarea>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary w-25"
                            onclick="return confirm('Are you sure you want to create this product?')">
                            Save
                        </button>
                    </div>

                </form>

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
