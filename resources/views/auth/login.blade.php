@extends('admin')

@section('content')

<div class="log_p">
    <div class="s_wraper">
        <div class="logo bg_white tac"><img src="{{ asset('images/logo.png') }}" alt="logo" width="200" /></div>
        <div class="form bg_black fc_white pad15">
            <div class="pad15">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label>E-Mail Address</label>
                    <input type="email" class="tbox" name="email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="tbox" name="password">
                </div>
                <div class="form-group tar">
                    <button type="submit" class="btn_small bg_blue">Login</button>
                </div>        
                </form>
            </div>
        </div>
    </div>
</div>





@endsection
