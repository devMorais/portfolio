@extends('admin.layouts.layout')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('dashboard') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Otimização SEO</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Atualização SEO</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.seo-setting.update', 1) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Seo Título</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="title" value="{{ $seo->title }}"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Seo
                                        Descrição</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="description" id="" class="form-control" style="height: 100px">{!! $seo->description !!}</textarea>
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"> Seo
                                        Palavras-chave</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="keywords" value="{{ $seo->keywords }}"
                                            class="form-control">
                                        <code>Palavras-chave serão separadas por vírgulas!</code>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">
                                            Atualizar
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