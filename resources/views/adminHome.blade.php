@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <span class="bg-success text-light">You are Admin.</span>
                    <p>Current  Time Zone : {{ $data }}</p>
                    

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="">
                                <th>Sr#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>

                                <td> {{ ++$i }}</td>
                                <td> {{ $user->name }} </td>
                                <td> <span class="badge bg-danger"> {{ $user->email }}</span></td>

                                <td>
                                    @if($user->is_admin == 1)

                                    Active User

                                    @elseif($user->is_admin == 0)

                                    Inactive User

                                    @endif
                                </td>
                                <td>
                                    <form action="" method="POST">

                                        <a class="btn btn-success" href="{{ route('users.edit',$user->id) }}">EDIT</a>

                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                        {!! $users->links() !!}
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection