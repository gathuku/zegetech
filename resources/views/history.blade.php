@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"> Transaction History</div>

                <div class="card-body">
                @include('flash::message')

              
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
