@extends('master');
@section('title')
danh sach kh
@endsection
@section('content')
<h1>danh sach khach hang
    <a
        class="btn btn-info"
        href="{{route('customers.create')}}">Create</a>
</h1>
@if ( session()->has('success') && !session()->get('success'))
<div class="alert alert-danger">
   {{session()->get('error')}}
</div>
@endif

@if ( session()->has('success') && session()->get('success'))
<div class="alert alert-info">
   THANH CONG
</div>
@endif

<div
    class="table-responsive">
    <table
        class="table table-primary">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">ADDRESS</th>
                <th scope="col">AVATAR</th>
                <th scope="col">PHONE</th>
                <th scope="col">EMAIL</th>
                <th scope="col">IS ACTIVE</th>
                <th scope="col">CREATED AT</th>
                <th scope="col">UPDATED AT</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $customer)
            <tr class="">
                <td scope="row">{{$customer->id}}</td>
                <td>{{$customer->name}}</td>
                <td>{{$customer->address}}</td>
                <td>
                    @if ($customer->avatar)
                    <img src="{{Storage::url($customer->avatar)}}" width="100px">
                    @endif
                </td>
                <td>{{$customer->phone}}</td>
                <td>{{$customer->email}}</td>
                <td>
                    @if ($customer->is_active)
                    <span
                        class="badge bg-primary">yes!</span>
                    @else
                    <span
                        class="badge bg-danger">no!</span>
                    @endif
                </td>
                <td>{{$customer->created_at}}</td>
                <td>{{$customer->updated_at}}</td>
                <td>
                    <a
                        class="btn btn-info"
                        href="{{route('customers.show',$customer)}}">Show
                    </a>
                    <a
                        class="btn btn-warning"
                        href="{{route('customers.edit',$customer)}}">Edit
                    </a>
                    <form action="{{route('customers.destroy', $customer)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button
                            class="btn btn-danger"
                            type="submit"
                            onclick="return confirm('ban co muon xoa?')">Xoa mem
                        </button>
                    </form>
                    <form action="{{route('customers.forcedestroy', $customer)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button
                            class="btn btn-dark"
                            type="submit"
                            onclick="return confirm('ban co muon xoa?')">Xoa cung
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach


        </tbody>
    </table>
    {{$data->links()}}
</div>

@endsection
