@extends('layouts.mainLayout')
@section("title","Auth Project|Admin Dashboard")

@section('content')

<div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Customers
                            </a>
                        </li>
                        <!-- Add more menu items as needed -->

                    </ul>
                </div>
            </nav>

            <!-- Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

                <div class="content">
                    <!-- Your dashboard content goes here -->
                    <h1 style='text-align: center;'> Welcome To Admin Dashboard</h1>
                    <hr> 
                    <p>Welcome to the dashboard. You can start building your content here.</p>
                </div>
            </main>
        </div>
    </div>

@endsection