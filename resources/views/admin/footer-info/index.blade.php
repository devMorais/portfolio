@extends('admin.layouts.layout')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('dashboard') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Informações do rodapé</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Atualização das informações do rodapé</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.footer-info.update', 1) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                {{-- Sub titulo --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Informações</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="info" id="" class="form-control" style="height: 100px">{!! $info->info !!}</textarea>
                                    </div>
                                </div>

                                {{-- Copy right --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Direitos
                                        Autorais</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="copy_right" value="{{ $info->copy_right }}"
                                            class="form-control">
                                    </div>
                                </div>

                                {{-- Powered by --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Desenvolvido
                                        por</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="powered_by" value="{{ $info->powered_by }}"
                                            class="form-control">
                                    </div>
                                </div>

                                {{-- Button Submit --}}
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
