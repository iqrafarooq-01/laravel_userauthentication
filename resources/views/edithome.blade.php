@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Profile</div>
                <div class="card-body">
                    <!-- Form -->
                    <form action="{{ route('users.update',$user->id) }}" method="post">

                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="">Name </label>
                                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="">
                                </div>
                                <!-- error message for name field -->
                                <span class="text-danger">@error('name') {{ $message }} @enderror </span>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" id="" name="email" value="{{ $user->email }}">
                                </div>
                                <!-- error message for description field -->
                                <span class="text-danger">@error('email') {{ $message }} @enderror </span>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <label for=""> Access Status </label>
                                <select class="form-select shadow-none" name="is_admin" value="{{ $user->is_admin }}">
                                    @error('is_admin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <option class="disabled" value=""> Select </option>
                                 
                                    <option value="1"  @if($user->is_admin == 1) selected @endif> Active User  </option>
                                    <option value="0"  @if($user->is_admin == 0) selected @endif > NonActive User </option>

                                </select>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="">Password </label>
                                    <input type="text" name="password" value="" class="form-control" id="">
                                </div>
                                <!-- error message for name field -->
                                <span class="text-danger">@error('password') {{ $message }} @enderror </span>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="">Confirm Password</label>
                                    <input type="text" class="form-control" id="" name="password_confirmation" value="">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <input href="" type="submit" value="Submit" class="btn btn-primary">
                            </div>
                        </div>


                    </form> <!-- End of Form -->


                </div>
            </div>
        </div>
    </div>
</div>
@endsection