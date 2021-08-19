@extends('app')

@section('contentPost')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Form Request
            </div>

            <div class="links">
                <form action="{{ route('posts.store') }}" method="post">
                    @csrf
                    <input type="text" name="title">
                    <input type="submit" value="Enviar">
                </form>
            </div>
            <br/>
            <div class="footer-center">
                <a class="btn btn-default btn-sm" href="{{ route('users.index') }}">Lista de usuarios</a>
            </div>
        </div>
    </div>
@endsection

