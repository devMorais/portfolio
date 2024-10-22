<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <div class="form-inline mr-auto"></div>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('frontend/assets/images/skill.jpg') }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block"></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Logged in 5 min ago</div>
                <a href="{{ route('profile.edit') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Perfil
                </a>
                <a href="features-settings.html" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Configurações
                </a>
                <div class="dropdown-divider"></div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="#"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();"
                        class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </form>
            </div>
        </li>
    </ul>
</nav>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">DevMorais - Admin</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item active">
                <a href="index.html" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Dropdown</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li><a class="nav-link" href="">test</a></li>
                </ul>
            </li>
            <li class="menu-header">Seções</li>
            <li class="nav-item dropdown">
                <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-bullhorn"></i>
                    <span>Hero</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li><a class="nav-link" href="{{ route('admin.typer-title.index') }}">Título do Digitalizador</a>
                    </li>
                    <li><a class="nav-link" href="{{ route('admin.header.index') }}">Seção de cabeçalho</a></li>
                </ul>
            </li>

            <li><a class="nav-link" href="{{ route('admin.service.index') }}"><i class="fas fa-hands-helping"></i>
                    <span>Serviços</span></a></a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('admin.about.index') }}">
                    <i class="fas fa-user"></i>
                    <span>Sobre</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-folder"></i>
                    <span>Portfolio</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li><a class="nav-link" href="{{ route('admin.category.index') }}">Categoria</a>
                    </li>
                    <li><a class="nav-link" href="{{ route('admin.portfolio-item.index') }}">Itens do portfólio</a></li>
                    <li><a class="nav-link" href="{{ route('admin.portfolio-section-setting.index') }}">Configuração de
                            seção</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-brain"></i>
                    <span>Habilidades</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li><a class="nav-link" href="{{ route('admin.skill-item.index') }}">Itens de habilidades</a></li>
                    <li><a class="nav-link" href="{{ route('admin.skill-section-setting.index') }}">Configuração de
                            seção</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="nav-link" href="{{ route('admin.experience.index') }}">
                    <i class="fas fa-user-tie"></i>
                    <span>Experiência</span>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a href="" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-comments"></i>
                    <span>Feedback</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li><a class="nav-link" href="{{ route('admin.feedback.index') }}">Feedbacks</a>
                    </li>
                    <li><a class="nav-link" href="{{ route('admin.feedback-section-setting.index') }}">Configuração
                            de seção</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-blog"></i>
                    <span>Blog</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li><a class="nav-link" href="{{ route('admin.blog-category.index') }}">Categoria</a>
                    </li>
                    <li><a class="nav-link" href="{{ route('admin.blog.index') }}">Lista de
                            Blogs</a></li>
                    <li><a class="nav-link" href="{{ route('admin.blog-section-setting.index') }}">Configuração
                            de seção</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-envelope"></i>
                    <span>Contato</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li><a class="nav-link" href="{{ route('admin.contact-section-setting.index') }}">Configuração de
                            sessão</a>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
