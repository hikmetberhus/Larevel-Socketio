<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-minimize">
                <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                    <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                    <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
                </button>
            </div>
            <a class="navbar-brand" href="#">Aktif sınıf kodu: <b>{{ App\Models\Room::getActiveRoom()->room_id }}</b></a>
        </div>

        <div class="collapse navbar-collapse justify-content-end">

            <ul class="navbar-nav">

                <li class="nav-item dropdown">
                    <a class="nav-link" href="http://example.com/" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="btn btn-primary btn-link  small">Aktif sınıfı deiğiştir</span>

                        <p class="d-lg-none d-md-block">
                            Some Actions
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        @foreach(App\Models\Room::getRooms() as $room)
                            <a class="dropdown-item" id="{{ $room->room_id }}" href="#" onclick="replaceDefaultRoom('{{ $room->room_id }}')">
                                {{ $room->room_name }}
                                <i class="material-icons ml-2">
                                    {{ $room->is_default == 1 ? 'done' : '' }}
                                </i>
                            </a>

                        @endforeach
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">person</i>
                        <p class="d-lg-none d-md-block">
                            Account
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                        <a class="dropdown-item" href="#">Profil</a>
                        <a class="dropdown-item" href="#">Hesap ayarları</a>
                        <div class="dropdown-divider"></div>
                        <form id="logoutForm" action="{{ route('teacher.logout') }}" method="post" style="display: none">
                            {{ csrf_field() }}
                        </form>
                        <a href="#" onclick="event.preventDefault();document.getElementById('logoutForm').submit();" class="dropdown-item" >Güvenli çıkış</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>