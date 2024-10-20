@extends('admin.layouts.layout')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.skill-item.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Item de habilidades</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Cadastro dos itens de habilidades</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.skill-item.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nome</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="name" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Por cento</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="percent" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">Cadastrar</button>
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
@push('scripts')
    {{-- <script>
        $(document).ready(function() {
            $('#image-preview').css({
                'background-image': 'url("{{ asset() }}")',
                'background-size': 'cover',
                'background-position': 'center center'
            });
        });
    </script> --}}
@endpush
