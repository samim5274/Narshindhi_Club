<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="{{url('/')}}" class="b-brand text-primary">
                <!-- ========   Change your logo from here   ============ -->
                <img src="{{ asset('assets/images/logo-dark.svg') }}" class="img-fluid logo-lg" alt="logo">
            </a>
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item">
                    <a href="{{url('/')}}" class="pc-link">
                        <span class="pc-micon"><i class="fa-solid fa-gauge"></i></span>
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{ route('foods') }}" class="pc-link">
                        <span class="pc-micon"><i class="fa-solid fa-utensils"></i></span>
                        <span class="pc-mtext">Foods</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{ route('cart-view') }}" class="pc-link">
                        <span class="pc-micon"><i class="fa-solid fa-cart-plus"></i></span>
                        <span class="pc-mtext">Sale/Cart</span>
                        @if($cartCount > 0)
                            <span class="badge bg-primary">{{ $cartCount ?? 0 }}</span>
                        @endif
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{ route('order-details-list') }}" class="pc-link">
                        <span class="pc-micon"><i class="fa-solid fa-user-astronaut"></i></span>
                        <span class="pc-mtext">Order Details</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{ route('due-list-view') }}" class="pc-link">
                        <span class="pc-micon"><i class="fa-solid fa-comments-dollar"></i></span>
                        <span class="pc-mtext">Due Details</span>
                    </a>
                </li>
                <!-- <li class="pc-item">
                    <a href="#" class="pc-link">
                        <span class="pc-micon"><i class="fa-solid fa-bookmark"></i></span>
                        <span class="pc-mtext">Reserved</span>
                    </a>
                </li> -->
                <li class="pc-item">
                    <a href="{{ route('kitchen-view') }}" class="pc-link">
                        <span class="pc-micon"><i class="fa-solid fa-kitchen-set"></i></span>
                        <span class="pc-mtext">Kitchen</span>
                    </a>
                </li>

                

                <li class="pc-item pc-caption">
                    <label>Reports</label>
                    <i class="fa-solid fa-gear"></i>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#" class="pc-link"><span class="pc-micon"><i class="fa-solid fa-magnifying-glass"></i></span><span class="pc-mtext">Reports</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{ route('date-wise-total-sale') }}">Total Sale</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('user-wise-total-sale') }}">User wise Sale</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('payment-wise-total-sale') }}">P.M wise Sale</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('total-due-list') }}">Due List</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('total-member-due-list') }}">Member Due List</a></li>
                        <!-- <li class="pc-item pc-hasmenu">
                            <a href="#" class="pc-link">Total Sale<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                            <ul class="pc-submenu">
                                <li class="pc-item"><a class="pc-link" href="#">Total Sale</a></li>
                                <li class="pc-item"><a class="pc-link" href="#">Total Sale</a></li>
                                <li class="pc-item pc-hasmenu">
                                    <a href="#" class="pc-link">Total Sale<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                                    <ul class="pc-submenu">
                                        <li class="pc-item"><a class="pc-link" href="#">Total Sale</a></li>
                                        <li class="pc-item"><a class="pc-link" href="#">Total Sale</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="pc-item pc-hasmenu">
                            <a href="#" class="pc-link">Total Sale<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                            <ul class="pc-submenu">
                                <li class="pc-item"><a class="pc-link" href="#">Total Sale</a></li>
                                <li class="pc-item"><a class="pc-link" href="#">Total Sale</a></li>
                                <li class="pc-item pc-hasmenu">
                                    <a href="#" class="pc-link">Total Sale<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                                    <ul class="pc-submenu">
                                        <li class="pc-item"><a class="pc-link" href="#">Total Sale</a></li>
                                        <li class="pc-item"><a class="pc-link" href="#">Total Sale</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                </li> 

                <li class="pc-item pc-caption">
                    <label>Account</label>
                    <i class="fa-solid fa-gear"></i>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#" class="pc-link"><span class="pc-micon"><i class="fa-solid fa-comments-dollar"></i></span><span class="pc-mtext">Accounts</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{ route('daily-expenses') }}"><i class="fa-solid fa-sack-dollar"></i> Daily Expenses</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('expenses-setting-view') }}"><i class="fa-solid fa-filter-circle-dollar"></i> Setting</a></li>
                        <li class="pc-item pc-hasmenu">
                            <a href="#" class="pc-link"><i class="fa-solid fa-money-check-dollar"></i> Account Report<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                            <ul class="pc-submenu">
                                <li class="pc-item"><a class="pc-link" href="{{ url('/total-expenses-report') }}"><i class="fa-solid fa-money-bill-1-wave"></i> Total Expenses</a></li>
                                <!-- <li class="pc-item"><a class="pc-link" href="#"><i class="fa-solid fa-money-bill-trend-up"></i> Date Expenses</a></li> -->
                                <li class="pc-item"><a class="pc-link" href="{{ url('/category-expenses-report') }}"><i class="fa-solid fa-yen-sign"></i> Category</a></li>
                                <li class="pc-item"><a class="pc-link" href="{{ url('/sub-category-expenses-report') }}"><i class="fa-solid fa-wallet"></i> Sub-Category</a></li>
                            </ul>
                        </li>
                        <hr>

                        <li class="pc-item"><a class="pc-link" href="{{ route('extra-income') }}"><i class="fa-solid fa-money-bill-trend-up"></i> Extra Income</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('income-setting-view') }}"><i class="fa-solid fa-filter-circle-dollar"></i> Setting</a></li>
                        <li class="pc-item pc-hasmenu">
                            <a href="#" class="pc-link"><i class="fa-solid fa-money-check-dollar"></i> Account Report<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                            <ul class="pc-submenu">
                                <li class="pc-item"><a class="pc-link" href="{{ url('/total-income-report') }}"><i class="fa-solid fa-money-bill-1-wave"></i> Total Income</a></li>
                                <li class="pc-item"><a class="pc-link" href="#"><i class="fa-solid fa-money-bill-trend-up"></i> Date Income</a></li>
                                <li class="pc-item"><a class="pc-link" href="#"><i class="fa-solid fa-yen-sign"></i> Category</a></li>
                                <li class="pc-item"><a class="pc-link" href="#"><i class="fa-solid fa-wallet"></i> Sub-Category</a></li>
                            </ul>
                        </li>
                        <hr>
                    </ul>
                </li>                
                <li class="pc-item pc-hasmenu">
                    <a href="#" class="pc-link"><span class="pc-micon"><i class="fa-solid fa-building-columns"></i></span><span class="pc-mtext">Bank Account</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{ route('bank-diposit-view') }}"><i class="fa-solid fa-piggy-bank"></i> Bank Diposit</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('bank-withdraw-view') }}"><i class="fa-solid fa-hand-holding-dollar"></i> Bank Withdraw</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('bank-to-transection-view') }}"><i class="fa-solid fa-hand-holding-dollar"></i> Bank to Bank TS</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('bank-setting-view') }}"><i class="fa-solid fa-filter-circle-dollar"></i> Setting</a></li>
                        <li class="pc-item pc-hasmenu">
                            <a href="#" class="pc-link"><i class="fa-solid fa-money-check-dollar"></i> Bank Report<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                            <ul class="pc-submenu">
                                <li class="pc-item"><a class="pc-link" href="{{ url('/total-diposit') }}"><i class="fa-solid fa-money-bill-1-wave"></i> Total Diposit</a></li>
                                <li class="pc-item"><a class="pc-link" href="{{ url('/total-withdraw') }}"><i class="fa-solid fa-money-bill-trend-up"></i> Total Withdraw</a></li>
                                <li class="pc-item"><a class="pc-link" href="{{ route('total-transection') }}"><i class="fa-solid fa-yen-sign"></i> Total Transection</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#" class="pc-link"><span class="pc-micon"><i class="fa-solid fa-money-bill-transfer"></i></span><span class="pc-mtext">T.T.S</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{ route('total-transection-report') }}"><i class="fa-solid fa-money-check-dollar"></i> Total Transection</a></li>
                        
                    </ul>
                </li>

                <li class="pc-item pc-caption">
                    <label>Purchase</label>
                    <i class="fa-solid fa-bag-shopping"></i>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#" class="pc-link"><span class="pc-micon"><i class="fa-solid fa-bag-shopping"></i></span><span class="pc-mtext">Purchase</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{ route('purchase-view') }}"><i class="fa-solid fa-basket-shopping"></i> Purchases</a></li>                       
                        <li class="pc-item"><a class="pc-link" href="{{ route('purchase-stock-in-view') }}"><i class="fa-solid fa-arrow-trend-up"></i> Stock In</a></li>                       
                        <li class="pc-item"><a class="pc-link" href="{{ route('purchase-stock-out-view') }}"><i class="fa-solid fa-arrow-trend-down"></i> Stock Out</a></li>             
                        <li class="pc-item pc-hasmenu">
                            <a href="#" class="pc-link"><i class="fa-solid fa-money-check-dollar"></i> Report<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                            <ul class="pc-submenu">
                                <li class="pc-item"><a class="pc-link" href="{{ url('/total-stock-report') }}"><i class="fa-brands fa-stack-overflow"></i> Total Stock</a></li>
                                <li class="pc-item"><a class="pc-link" href="{{ url('/total-stock-in-report') }}"><i class="fa-solid fa-money-bill-1-wave"></i> Stock In</a></li>
                                <li class="pc-item"><a class="pc-link" href="{{ url('/total-stock-out-report') }}"><i class="fa-solid fa-arrow-trend-up"></i> Stock Out</a></li>
                            </ul>
                        </li>          
                    </ul>
                </li>
                
                <li class="pc-item pc-caption">
                    <label>Settings</label>
                    <i class="fa-solid fa-gear"></i>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#" class="pc-link"><span class="pc-micon"><i class="fa-solid fa-gear"></i></span><span class="pc-mtext">Settings</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{ route('create-foods') }}"><i class="fa-solid fa-pizza-slice"></i> Foods</a></li>
                        <li class="pc-item"><a class="pc-link" href="#"><i class="fa-solid fa-table"></i> Table</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{ url('/stock') }}"><i class="fa-solid fa-chart-gantt"></i> Stock</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('all-user') }}"><i class="fa-solid fa-circle-user"></i> Empolyee</a></li>                        
                        <li class="pc-item"><a class="pc-link" href="{{ route('make-membership') }}"><i class="fa-solid fa-user-plus"></i> Make Membership</a></li>                        
                    </ul>
                </li>
                <li class="pc-item pc-caption">
                    <label>Authentication</label>
                    <i class="ti ti-news"></i>
                </li>
                <li class="pc-item"><a class="pc-link" href="{{ route('logout') }}"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>