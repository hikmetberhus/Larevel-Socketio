<nav class="navbar navbar-expand-lg navbar-toggle navbar-absolute fixed-top  ">
    <div class="container-fluid">
        <div class="navbar-wrapper ml-5">

            <h4><b><a href="{{ route('student.home') }}">SenEdu</a> </b></h4>
        </div>

        <div class="collapse navbar-collapse justify-content-end">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link " id="addClassroomBtn" href="#">
                        sınıf ekle
                        <i class="material-icons" >add</i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="http://example.com/" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">notifications</i>
                        <div id="notificationCount"></div>
                        <p class="d-lg-none d-md-block">
                            Some Actions
                        </p>
                    </a>
                    <div id="notificationsList" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <div id="nullNotification"></div>

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
                        <form id="logoutForm" action="{{ route('student.logout') }}" method="post" style="display: none">
                            {{ csrf_field() }}
                        </form>
                        <a href="#" onclick="event.preventDefault();document.getElementById('logoutForm').submit();" class="dropdown-item" >Güvenli çıkış</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
