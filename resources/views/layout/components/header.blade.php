<div class="container-fluid">
    <div class="row header">
        <div class="col left">
            <button class="menu-sistemas open_menu_sistemas waves-effect">
                <div class="btn-menu">
                    <i class="fa-light fa-grid-2"></i>
                </div>
            </button>
            <div class="logo">
                <a href="" class="text-dark">
                    <img src="{{asset('assets/images/')}}" alt="Logo"> 
                </a>
            </div>
        </div>
        <ul class="col center">
            <li class="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Pesquise por sistemas, solicitações e muito mais">
                    <button class="input-group-text waves-effect waves-light">
                        <i class="fa-regular fa-magnifying-glass"></i>
                    </button>
                </div>
            </li>

            <li class="btns-actions d-grid d-inline-flex">
                <!-- <button class="btn btn-primary waves-effect waves-light" onclick="window.toggleContrast()" type="button">
                    <i class="fa-light fa-moon"></i>
                </button> -->
                <button class="btn btn-primary waves-effect waves-light" type="button">
                    <i class="fa-light fa-bell"></i>
                </button>
                <button class="btn btn-primary waves-effect waves-light" type="button">
                    <i class="fa-solid fa-question"></i>
                </button>
            </li>
        </ul>
        <ul class="col right">

            <li class="user d-inline-flex">
                <div class="username">
                    <span class="text-truncate">Bem-vindo, </span>
                    <small>Servidor(a)</small>
                </div>
                <div class="userfoto">
                    <img src="{{ auth()->user()->foto ?? asset('assets/images/user.png') }}" />
                </div>
                <div class="user-options ps-3">
                    <button class="btn waves-effect open-user-menu">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fa-solid fa-id-card-clip me-2"></i>
                                <span class="align-middle">Dados Pessoais</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fa-solid fa-key me-2"></i>
                                <span class="align-middle">Alterar Senha</span>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fa-solid fa-sign-out me-2"></i>
                                <span class="align-middle">Sair</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>
    </div>
</div>
