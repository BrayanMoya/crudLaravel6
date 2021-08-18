<div class="card border-0 shadow">
    <div class="card-body">
        {{view('formErrors')}}
        <form action="{{ route('users.store') }}" method="post">
            <div class="form-group row">
                <div class="col-sm-3">
                    <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{ old('name') }}">
                </div>
                <div class="col-sm-4">
                    <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                </div>
                <div class="col-sm-3">
                    <input type="password" name="password" class="form-control" placeholder="Contraseña">
                </div>
                <div class="col-auto">
                    @csrf
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>
