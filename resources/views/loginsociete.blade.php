@extends('layouts.app')
@section('content')
<style>
.containers {
  box-shadow: 0 0 1rem 0 rgba(0, 0, 0, .2);
  border-radius: 5px;
  background-color: rgba(255, 255, 255, .15);
  backdrop-filter: blur(5px);
}

</style>
    <div class="main-content">
        <section class="divider bg-lighter" style="background-image: url('/images/login_v2.jpg'); height: 700px; background-attachment: fixed;">
            <div class="container">
                <div class="d-flex justify-content-center mt-100">
                    <div class="col-md-5 p-3 shadow rounded containers">
                        <h3 class="mt-0 mb-30 text-uppercase mt-0 text-theme-colored">Login</h3>
                        <form  method="POST" action="{{ route('login') }}"  style="color: #2c3e50">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Login</label>
                                    <input type="text" class="form-control"  name="email"  style="border-radius: 5px">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Password</label>
                                    <input type="password" class="form-control"  name="password" style="border-radius: 5px">
                                 </div>
                            </div>
                            <button  type="submit" class="btn btn-default btn-lg Hbtn  float-right btnform" style="background-color:#3ce2ad; font-weight:600; font-size: 16px;margin-top: 10px">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
