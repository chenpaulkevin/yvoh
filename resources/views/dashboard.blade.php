@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')

<div class="container-fluid mt--7 bg-default" style="height:80vh;">
    <div class="row">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card bg-default">
                <div class="row" style="height:65vh;">
                    <div class="col-md-2 m-auto">
                        <a href="{{ route('transactions') }}">
                            <div class="card bg-gradient-primary">
                                <div class="card-body">
                                    <div class="text-center text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" style="height:5rem; m-auto" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </div>
                                    <div class="font-bold text-white text-md text-center">
                                        Transactions
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-2 m-auto">
                        <a href="{{ route('viewledger') }}">
                            <div class="card bg-gradient-primary">
                                <div class="card-body">
                                    <div class="text-center text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" style="height:5rem; m-auto"
                                            class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                        </svg>
                                    </div>
                                    <div class="font-bold text-white text-md text-center">
                                        Ledgers
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-2 m-auto">
                        <a href="{{ route('viewbank') }}">
                            <div class="card bg-gradient-primary">
                                <div class="card-body">
                                    <div class="text-center text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" style="height:5rem; m-auto"
                                            class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                                        </svg>
                                    </div>
                                    <div class="font-bold text-white text-md text-center">
                                        Bank Account
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-2 m-auto">
                        <div class="card bg-gradient-primary">
                            <div class="card-body">
                                <div class="text-center text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="height:5rem; m-auto" class="h-6 w-6"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                            d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <div class="font-bold text-white text-md text-center">
                                    Reports
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 m-auto">
                        <div class="card bg-gradient-primary">
                            <div class="card-body">
                                <div class="text-center text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="height:5rem; m-auto" class="h-6 w-6"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                                <div class="font-bold text-white text-md text-center">
                                    Users
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div>
</div>
@include('layouts.footers.auth')
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
