@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="h5 mb-0">{{ $template['name'] }}</h2>
                    <p class="mb-0 text-muted">Fill in the details below to send this email</p>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form id="emailForm" method="POST" action="{{ route('send.purchase.confirmation', ['type' => $type]) }}">
                        @csrf

                        @if($type === 'purchase-confirmation')
                            <div class="form-group row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Recipient Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" 
                                           class="form-control @error('name') is-invalid @enderror" 
                                           name="name" 
                                           value="{{ old('name') }}" 
                                           required 
                                           autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Recipient Email</label>
                                <div class="col-md-6">
                                    <input id="email" 
                                           type="email" 
                                           class="form-control @error('email') is-invalid @enderror" 
                                           name="email" 
                                           value="{{ old('email') }}" 
                                           required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        @endif

                        <!-- Add more template-specific fields here as needed -->

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="submitButton" class="btn btn-primary">
                                    <i class="fas fa-paper-plane me-1"></i> <span id="buttonText">Send Email</span>
                                    <span id="loadingSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                </button>
                                <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-arrow-left me-1"></i> Back to Dashboard
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Font Awesome for icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

@push('scripts')
<script>
    document.getElementById('emailForm').addEventListener('submit', function() {
        const submitButton = document.getElementById('submitButton');
        const buttonText = document.getElementById('buttonText');
        const loadingSpinner = document.getElementById('loadingSpinner');
        
        // Disable the submit button to prevent multiple submissions
        submitButton.disabled = true;
        
        // Show loading spinner and update button text
        buttonText.textContent = 'Sending...';
        loadingSpinner.classList.remove('d-none');
    });
</script>
@endpush
@endsection
