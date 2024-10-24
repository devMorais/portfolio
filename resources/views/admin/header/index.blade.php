@extends('admin.layouts.layout')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('dashboard') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Sessão de Cabeçalho</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Atualização da Sessão de Cabeçalho</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.header.update', 1) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Título</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="title" value="{{ optional($header)->title }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sub-Título</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="sub_title" class="form-control" style="height: 100px">{{ optional($header)->sub_title }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Texto do
                                        botão</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="btn_text" value="{{ optional($header)->btn_text }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">URL do
                                        Botão</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="btn_url" value="{{ optional($header)->btn_url }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Imagem de
                                        fundo</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image"
                                                id="customFile" />
                                            <label class="custom-file-label" for="customFile">Escolha sua imagem</label>
                                        </div>
                                    </div>
                                </div>
                                @if (optional($header)->image)
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Visualização da
                                            imagem</label>
                                        <div class="col-sm-12 col-md-7">
                                            <img class="w-25" src="{{ asset($header->image) }}" alt="">
                                        </div>
                                    </div>
                                @endif
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">
                                            {{ $header ? 'Atualizar' : 'Cadastrar' }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
