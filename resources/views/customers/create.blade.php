@extends('master');
@section('title')
add kh
@endsection
@section('content')
<h1>add khach hang</h1>

@if ( session()->has('success') && !session()->get('success'))
<div class="alert alert-danger">
   {{session()->get('error')}}
</div>
@endif

@if ($errors->any())
   <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
           <li>{{$error}}</li>
        @endforeach
    </ul>
   </div>
@endif
<div class="container">
    <form method="post" action="{{route('customers.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 row">
            <label for="name" class="col-4 col-form-label">Name</label>
            <div
                class="col-8">
                <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}"/>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="address" class="col-4 col-form-label">address</label>
            <div
                class="col-8">
                <input type="text" class="form-control" name="address" id="address" value="{{old('address')}}" />
            </div>
        </div>
        <div class="mb-3 row">
            <label for="phone" class="col-4 col-form-label">phone</label>
            <div
                class="col-8">
                <input type="tell" class="form-control" name="phone" id="phone" value="{{old('phone')}}" />
            </div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-4 col-form-label">email</label>
            <div
                class="col-8">
                <input type="email" class="form-control" name="email" id="email"  value="{{old('email')}}"/>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="is_active" class="col-4 col-form-label">is_active</label>
            <div
                class="col-8">
                <input type="checkbox" class="form-checkbox" name="is_active" id="is_active" value="1" />
            </div>
        </div>
        <div class="mb-3 row">
            <label for="avatar" class="col-4 col-form-label">avatar</label>
            <div
                class="col-8">
                <input type="file" class="form-control" name="avatar" id="avatar" value="1" />
            </div>
        </div>



        <div class="mb-3 row">
            <div class="offset-sm-4 col-sm-8">
                <button type="submit" class="btn btn-primary">
                    submit
                </button>
            </div>
        </div>
    </form>
</div>

@endsection
