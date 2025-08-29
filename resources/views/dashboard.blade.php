@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Email Templates Dashboard</h2>
                    <p class="mb-0">Select an email template to send</p>
                </div>

                <div class="card-body">
                    <div class="row">
                        @foreach($templates as $template)
                            <div class="col-md-6 col-lg-4 mb-4">
                                <div class="card h-100">
                                    <div class="card-body text-center">
                                        <div class="mb-3">
                                            <i class="{{ $template['icon'] }} fa-3x text-primary"></i>
                                        </div>
                                        <h5 class="card-title">{{ $template['name'] }}</h5>
                                        <p class="card-text">{{ $template['description'] }}</p>
                                        <a href="{{ $template['route'] }}" class="btn btn-primary">
                                            Use This Template
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
    .card {
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        border: none;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }
    
    .card-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid rgba(0, 0, 0, 0.125);
    }
    
    .card-title {
        color: #2c3e50;
        font-weight: 600;
    }
    
    .btn-primary {
        background-color: #4a90e2;
        border: none;
        padding: 0.375rem 1.5rem;
    }
    
    .btn-primary:hover {
        background-color: #3a7bc8;
    }
</style>

<!-- Include Font Awesome for icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
@endsection
