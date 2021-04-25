@extends('layouts.app')

@section('page-css')
<style>
    @media screen and (max-width: 600px) {

        .responsive-padding {
            padding: 1.5rem !important;
        }
    }

    }

</style>
@endsection

@section('content')
@include('layouts.headers.cards')

<div class="container-fluid mt--7 bg-default" style="height:100vh;">
    <div class="row">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="content-heading mb-4">
                <span class="text-white text-xl">Add Ledger</span>
                <a class="btn btn-icon btn-primary float-right" href="{{ route('viewledger') }}">
                    <span class="btn-inner--icon"><i class="fa fa-eye"></i></span>
                    <span class="btn-inner--text">View Ledgers</span>
                </a>
            </div>
            <div class="card bg-default responsive-padding p-6">
                <div class="col-md-12 bg-default mx-auto py-2 px-4 rounded">
                    <form method="post" action="{{route('createledger')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="form-control-label text-white">Ledger Name / Business
                                        Name</label>
                                    <input class="form-control text-default" type="text"  placeholder="Ledger Name" id="name" name="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="location" class="form-control-label text-white">Location</label>
                                    <input class="form-control text-default" type="text" required placeholder="Address" id="location"
                                        name="location">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contact_person" class="form-control-label text-white">Contact
                                        Person</label>
                                    <input class="form-control text-default" type="text" required placeholder="Juan Dela Cruz" id="contact_person"
                                        name="contact_person" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contact_number" class="form-control-label text-white">Contact
                                        Number</label>
                                    <input class="form-control text-default" type="text" required id="contact_number"
                                        name="contact_number" placeholder="+63 999 999 9999" data-inputmask='"mask": "+63 999 999 9999"' data-mask>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="manage_id" class="text-white">Select Manager</label>
                                    <select class="form-control text-default" required id="manager_id" name="manager_id">
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
                                    <label for="beginning_balance" class="text-white">Beginning Balance</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">₱</span>
                                        </div>
                                        <input type="number" name="beginning_balance" id="beginning_balance" required class="form-control text-default">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/4.0.9/jquery.inputmask.bundle.min.js"></script>
<script>
    $('[data-mask]').inputmask();
</script>
@endpush
