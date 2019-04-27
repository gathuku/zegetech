@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"> Transfer Cash </div>

                <div class="card-body">
                @include('flash::message')

                <form class="" action="index.html" method="post">
                  <div class="form-group">
                    <label for="">Enter user Email or Phone</label>
                  <input class="form-control" type="text" name="madeTo" value="">
                  </div>
                  <div class="form-group">
                    <label for="">Enter Amount</label>
                  <input class="form-control" type="text" name="madeTo" value="">
                  </div>
                  <div class="form-group">
                  <button class="btn btn-primary" type="submit" name="button"></button>
                  </div>

                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
