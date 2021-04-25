@extends('layouts.app')

@section('page-css')
<style>

@media screen and (max-width: 600px) {
    
.responsive-padding{
    padding:1.5rem !important;
}
}

}

</style>
@endsection

@section('content')
@include('layouts.headers.cards')

<div class="container-fluid mt--7 bg-default" style="height: 100vh;">
    <div class="row">
        <div class="col-xl-12 mb-5 mb-xl-0">
        <div class="content-heading mb-4">
               <span class="text-white text-xl">Add Bank Account</span> 
                <a class="btn btn-icon btn-primary float-right" href="{{ route('viewbank') }}">
                    <span class="btn-inner--icon"><i class="fa fa-eye"></i></span>
                    <span class="btn-inner--text">View Bank Accounts</span>
                </a>
        </div>
            <div class="card bg-default responsive-padding p-6">
                <div class="col-md-12 bg-white mx-auto p-4 rounded">
                    <form method="post" action="{{route('createbankaccount')}}">
                    @csrf
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="form-control-label">Bank Name</label>
                                <input class="form-control" type="text" placeholder="Metrobank" id="name" name="name">
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="account_number" class="form-control-label">Account Number</label>
                                <input class="form-control" type="text" placeholder="xxx-xxx-xxx-xxx" id="account_number" name="account_number">
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="account_name" class="form-control-label">Account Name</label>
                                <input class="form-control" type="text" placeholder="Juan Dela Cruz" id="account_name" name="account_name">
                            </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="manager_id">Select Manager</label>
                                    <select class="form-control" id="manager_id" name="manager_id">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ledger_id">Select Ledger Name</label>
                                    <select class="form-control" id="ledger_id" name="ledger_id">
                                    @foreach($ledgers as $ledger)
                                        <option value="{{$ledger->id}}">{{$ledger->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="beginning_balance">Beginning Balance</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">₱</span>
                                        </div>
                                        <input type="number" name="beginning_balance" id="beginning_balance" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success btn-lg btn-block">Submit</button>
                            </div>
                        </div>
                    </form>
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
