@extends('layouts.app')

@section('content')
<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-dark border-right" id="sidebar-wrapper">
        <div class="sidebar-heading text-white d-flex align-items-center justify-content-between p-3">
            <span>Email System</span>
            <button class="btn btn-link text-white p-0" id="menu-toggle">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white active">
                <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                <i class="fas fa-envelope mr-2"></i> Templates
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                <i class="fas fa-paper-plane mr-2"></i> Sent Emails
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                <i class="fas fa-cog mr-2"></i> Settings
            </a>
        </div>
    </div>

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
            <div class="container-fluid">
                <h4 class="mb-0 text-primary">Dashboard</h4>
                <div class="d-flex align-items-center">
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-circle fa-lg"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Profile</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container-fluid py-4">
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h6 class="text-uppercase">Total Templates</h6>
                            <h2 class="mb-0">{{ count($templates) }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <h6 class="text-uppercase">Sent Today</h6>
                            <h2 class="mb-0">24</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-warning text-white">
                        <div class="card-body">
                            <h6 class="text-uppercase">Pending</h6>
                            <h2 class="mb-0">5</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-danger text-white">
                        <div class="card-body">
                            <h6 class="text-uppercase">Failed</h6>
                            <h2 class="mb-0">2</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Email Templates</h5>
                    <p class="text-muted mb-0">Select an email template to send</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($templates as $template)
                            <div class="col-md-6 col-lg-4 mb-4">
                                <div class="card h-100 shadow-sm">
                                    <div class="card-body text-center">
                                        <div class="icon-wrapper mb-3">
                                            <i class="{{ $template['icon'] }} fa-3x text-primary"></i>
                                        </div>
                                        <h5 class="card-title font-weight-bold">{{ $template['name'] }}</h5>
                                        <p class="card-text text-muted">{{ $template['description'] }}</p>
                                        <a href="{{ $template['route'] }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-paper-plane mr-1"></i> Use Template
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    #wrapper {
        overflow-x: hidden;
    }
    
    #sidebar-wrapper {
        min-height: 100vh;
        margin-left: -15rem;
        transition: margin 0.25s ease-out;
        width: 250px;
    }
    
    #wrapper.toggled #sidebar-wrapper {
        margin-left: 0;
    }
    
    #page-content-wrapper {
        min-width: 100vw;
        width: 100%;
    }
    
    .card {
        border: none;
        border-radius: 10px;
        transition: all 0.3s ease;
        overflow: hidden;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    
    .icon-wrapper {
        width: 70px;
        height: 70px;
        margin: 0 auto 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: rgba(74, 144, 226, 0.1);
        border-radius: 50%;
    }
    
    @media (min-width: 768px) {
        #sidebar-wrapper {
            margin-left: 0;
        }
        
        #page-content-wrapper {
            min-width: 0;
            width: 100%;
        }
        
        #wrapper.toggled #sidebar-wrapper {
            margin-left: -15rem;
        }
    }
</style>

<!-- Include Font Awesome and jQuery -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        
        // Add active class to current nav item
        $('.list-group-item').click(function() {
            $('.list-group-item').removeClass('active');
            $(this).addClass('active');
        });
    });
</script>
@endsection
