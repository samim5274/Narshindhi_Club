<!DOCTYPE html>
<html lang="en">
<head>
    <title>Membership Details | {{ $company->name ?? 'Undefined' }}</title>

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
                        <h2>Membership Details</h2>
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
                                <li class="breadcrumb-item" aria-current="page">Membership</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <div class="container">
                <div class="row">                    
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3 align-items-stretch">
                                    <div class="col-md-10">
                                        <form class="d-flex h-100 search-form" method="GET" action="#">
                                            <input type="search" class="form-control mt-2" id="search" name="search" placeholder="Search">
                                            <button type="submit" class="btn btn-success btn-sm w-100 mt-2 text-light" style="max-width: 100px;">                                                
                                                <i class="fa-solid fa-magnifying-glass" style="font-size: 1.5rem;"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-primary btn-sm w-100 mt-2 p-2" data-bs-toggle="modal" data-bs-target="#createMemberModal"><i class="fa-solid fa-user-plus"  style="font-size: 1.5rem;"></i></button>
                                    </div>
                                </div><hr class="m-0">
                                <table class="table table-bordered table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Type</th>
                                            <th>Point</th>
                                            <th>Start</th>
                                            <th>Expired</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="allData">
                                        @forelse($memberships as $user)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td><a href="{{ url('/member-due-details/'.$user->phone) }}">{{ $user->name }}</a></td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone ?? '-' }}</td>
                                                <td>{{ $user->membership_type }}</td>
                                                <td>{{ $user->start_date ?? '-' }}</td>
                                                <td>{{ $user->expiry_date ?? '-' }}</td> 
                                                <td class="text-center">
                                                    @if($user->is_active == 1)
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-danger">Inactive</span>
                                                    @endif
                                                </td>  
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="10" class="text-center">No users found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                    <tbody id="content" class="searchData"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Create Member Modal -->
            <div class="modal fade" id="createMemberModal" tabindex="-1" aria-labelledby="createMemberModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">

                    <form action="{{ url('/store-membership') }}" method="POST" id="createMemberForm">
                        @csrf

                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title" id="createMemberModalLabel">Add New Member</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">

                                <div class="row g-3">

                                    <div class="col-md-6">
                                        <label class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Phone</label>
                                        <input type="text" name="phone" class="form-control" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Membership Type</label>
                                        <select name="membership_type" class="form-control" required>
                                            <option value="">Select Type</option>
                                            <option value="Silver">Silver</option>
                                            <option value="Gold">Gold</option>
                                            <option value="Platinum">Platinum</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Point</label>
                                        <input type="number" name="point" class="form-control" value="0" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Start Date</label>
                                        <input type="date" name="start_date" class="form-control" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Expiry Date</label>
                                        <input type="date" name="expiry_date" class="form-control" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Status</label>
                                        <select name="is_active" class="form-control" required>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Remarks</label>
                                        <textarea name="remarks" class="form-control" rows="3"></textarea>
                                    </div>

                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save Member</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </form>

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

    <script type="text/javascript">
        $(document).ready(function () {
            $('#search').on('keyup', function () {
                let value = $(this).val();

                if (value.trim() !== "") {
                    $('.allData').hide();
                    $('.searchData').show();
                } else {
                    $('.allData').show();
                    $('.searchData').hide();
                }

                $.ajax({
                    type: 'GET',
                    url: '{{ URL::to("live-search-member") }}',
                    data: { 'search': value },
                    success: function (data) {
                        console.log(data);
                        $('#content').html(data);
                    },
                    error: function (xhr, status, error) {
                        console.error('Search AJAX error:', error);
                    }
                });
            });

            $('.search-form').on('submit', function(e) {
                e.preventDefault();
            });
        });
    </script>
    
</body>
</html>
