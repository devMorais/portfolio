@extends('admin.layouts.layout')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Configurações</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Configrações</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Visão Geral</h2>
            <p class="section-lead">
                Organize e ajuste todas as configurações sobre este site.
            </p>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <i class="fas fa-cog"></i>
                        </div>
                        <div class="card-body">
                            <h4>Geral</h4>
                            <p>Configurações gerais, como título do site, descrição do site e outras informações.</p>

                            <a href="{{ route('admin.general-setting.index') }}" class="card-cta">Alterar Configuração <i
                                    class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <i class="fas fa-search"></i>
                        </div>
                        <div class="card-body">
                            <h4>SEO</h4>
                            <p>Otimização de busca com meta tags e integração com redes sociais.</p>
                            <a href="{{ route('admin.seo-setting.index') }}" class="card-cta">Alterar Configuração <i
                                    class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
