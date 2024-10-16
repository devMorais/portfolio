@extends('admin.layouts.layout')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Perfil</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Perfil</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Olá, {{ old('name', $user->name) }}!</h2>
            <p class="section-lead">
                Altere informações sobre você nesta página.
            </p>
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Informações do perfil</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('profile.update') }}">
                                @csrf
                                @method('patch')
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label for="name">Nome</label>
                                        <input type="text" id="name" name="name" class="form-control"
                                            value="{{ old('name', $user->name) }}" required="">
                                        @if ($errors->has('name'))
                                            <code>{{ $errors->first('name') }}</code>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" class="form-control"
                                            value="{{ old('email', $user->email) }}" required="">
                                        @if ($errors->has('email'))
                                            <code>{{ $errors->first('email') }}</code>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">Salvar alterações</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Atualizar senha</h4>
                            <small class="mt-1 text-sm text-gray-600s">Certifique-se de que sua conta esteja usando uma
                                senha longa e aleatória para permanecer segura.</small>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('password.update') }}">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="update_password_current_password">Senha atual</label>
                                        <input type="password" id="update_password_current_password" name="current_password"
                                            class="form-control" autocomplete="current-password" />
                                        @if ($errors->updatePassword->has('current_password'))
                                            <code>{{ $errors->updatePassword->first('current_password') }}</code>
                                        @endif
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="update_password_password">Nova Senha</label>
                                        <input type="password" id="update_password_password" name="password"
                                            class="form-control" autocomplete="new-password" />
                                        @if ($errors->updatePassword->has('password'))
                                            <code>{{ $errors->updatePassword->first('password') }}</code>
                                        @endif
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="update_password_password_confirmation">Confirme sua senha</label>
                                        <input type="password" id="update_password_password_confirmation"
                                            name="password_confirmation" class="form-control" autocomplete="new-password" />
                                        @if ($errors->updatePassword->has('password_confirmation'))
                                            <code>{{ $errors->updatePassword->first('password_confirmation') }}</code>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">Salvar alterações</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
