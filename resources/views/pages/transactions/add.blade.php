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

<div class="container-fluid mt--7 bg-default" style="height:100vh;">
    <div class="row">
        <div class="col-xl-12 mb-5 mb-xl-0">
        <div class="content-heading mb-4">
               <span class="text-white text-xl">Transactions</span> 
                <a class="btn btn-icon btn-primary float-right" href="{{ route('viewledger') }}">
                    <span class="btn-inner--icon"><i class="fa fa-eye"></i></span>
                    <span class="btn-inner--text">View Transactions</span>
                </a>
        </div>
            <div class="card bg-default responsive-padding p-6">
                <div class="col-md-12 bg-default mx-auto py-2 px-4 rounded">
                    <form method="post" action="{{route('createtransactions')}}" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ledger_id" class="text-white">Select Ledger</label>
                                    <select class="form-control text-default" id="ledger_id" required name="ledger_id">
                                    <option value="" hidden>Select Ledger</option>
                                    @foreach ($ledgers as $data)
                                        <option value="{{$data->id}}">
                                            {{$data->name}}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="account" class="text-white">Select Account</label>
                                    <select class="form-control text-default" required id="account" name="account">
                                        <option value=""  hidden>Select Ledger</option>
                                        <option>Income</option>
                                        <option>Expense</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="particular" class="text-white">Particulars</label>
                                    <textarea class="form-control text-default" required id="particular" name="particular"
                                        rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="amount" class="text-white">Amount</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text text-default">₱</span>
                                        </div>
                                        <input type="number" step=".01" required name="amount" id="amount" class="form-control text-default">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bank_id" class="text-white">Select Bank</label>
                                    <select disabled required class="form-control text-default"  id="bank_id" name="bank_id">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image" class="text-white">Upload File</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input text-default" id="image" name="image" lang="en">
                                        <label class="custom-file-label" for="image">Select file</label>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
        $(document).ready(function () {
            $('#ledger_id').on('change', function () {
                $( "#bank_id" ).prop( "disabled", false );
                var ledger_id = this.value;
                $("#bank_id").html('');
                $.ajax({
                    url: "{{url('api/fetch-banks')}}",
                    type: "POST",
                    data: {
                        ledger_id: ledger_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#bank_id').html('<option hidden value="">Select Bank</option>');
                        $.each(result.banks, function (key, value) {
                            $("#bank_id").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });

                    }
                });
            });
        });
</script>
<script>
$('#image').change(function() {
  var file = $('#image')[0].files[0].name;
    $('.custom-file-label').text(file);
});
</script>
@endpush
