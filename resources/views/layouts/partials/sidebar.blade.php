<div class="sidebar" data-color="rose" data-background-color="white" data-image="/assets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="/" class="simple-text logo-mini">
            sE
        </a>
        <a href="/" class="simple-text logo-normal">
            senEdu
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="user-info">
                <a data-toggle="collapse" href="#collapseExample" class="username">
                    <span><i class="fa fa-users" style="padding-right: 10px;color: #666;margin-left: 15px"></i>{{ App\Models\Room::getActiveRoom()->room_name }}<b class="caret"></b></span>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> <i class="material-icons">assignment</i> </span>
                                <span class="sidebar-normal"> Sınıfı listele </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" id="{{ App\Models\Room::getActiveRoom()->room_id }}"
                               onclick="deleteRoom('{{ App\Models\Room::getActiveRoom()->room_name}}')">
                                <span class="sidebar-mini"><i class="material-icons">delete</i> </span>
                                <span class="sidebar-normal"> Sınıfı sil </span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">

            <li class="nav-item">
                <a class="nav-link" href="dashboard.html">
                    <i class="material-icons">settings_input_antenna</i>
                    <p> Canlı sonuçlar </p>
                </a>
            </li>
            <li class="nav-item  ">
                <a class="nav-link" href="dashboard.html">
                    <i class="material-icons">play_circle_outline</i>
                    <p> Aktivite başlat </p>
                </a>
            </li>
            <li class="nav-item  {{ Request::is('teacher/notification*') ? 'active': '' }} ">
                <a class="nav-link" href="{{ route('teacher.notifications') }}">
                    <i class="material-icons">add_alert</i>
                    <p> Duyuru yayınla </p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('teacher/exams*') ? 'active': '' }}  ">
                <a class="nav-link " href="{{ route('teacher.exams') }}">
                    <i class="material-icons">format_list_numbered</i>
                    <p> Sınavlar </p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('teacher/rooms*') ? 'active': '' }} ">
                <a class="nav-link " href="{{ route('teacher.rooms') }}">
                    <i class="material-icons">perm_contact_calendar</i>
                    <p> Sınıflar </p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="dashboard.html">
                    <i class="material-icons">content_paste</i>
                    <p> Raporlar </p>
                </a>
            </li>
        </ul>
    </div>
</div>