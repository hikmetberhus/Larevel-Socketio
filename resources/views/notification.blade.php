@extends('layouts.master')

@section('title','senEdu | Bildirimler')

@section('head')
    <script src="https://cdn.socket.io/socket.io-1.3.4.js"></script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">add_alert</i>
                        </div>
                        <h4 class="card-title">Duyuru yayınla</h4>

                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->

                        </div>
                        <form action="" method="">

                            <div class="row justify-content-start">
                                <label for="subject" class="col-md-3 col-form-label"><b>Konu:</b></label>
                                <div class="col-md-7">
                                    <div class="form-group has-default bmd-form-group">
                                        <input type="text" class="form-control" id="subject" name="subject">
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-start">
                                <label for="content" class="col-md-3 col-form-label"><b>Duyuru içeriği:</b></label>
                                <div class="col-md-7">
                                    <div class="form-group has-default bmd-form-group">
                                        <textarea name="content" id="content"  rows="2" data-min-rows="2" class="autoExpand form-control mt-2"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-start">
                                <label for="selectRoom" class="col-md-3 col-form-label"><b>Yayınlanacağı Sınıf / Sınıflar:</b></label>
                                <div class="col-lg-6 col-md-7 col-sm-4">
                                    <div class="dropdown bootstrap-select show-tick">
                                        <select name="selectRoom" id="selectRoom" class="selectpicker" data-style="select-with-transition" multiple="" title="Sınıf seç" data-size="7" tabindex="-98">
                                            <option disabled=""> Sınıf Listesi</option>
                                            @foreach($rooms as $room)
                                                <option value="{{ $room->room_id }}">{{ $room->room_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center mt-5">

                                <div class="col-md-7">
                                    <div class="">
                                        <button id="broadCastBtn" class="btn  btn-round btn-outline-primary col-md-5">Yayınla</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- end content-->
                </div>
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
        <!-- end row -->
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">receipt</i>
                        </div>
                        <h4 class="card-title">Yayınlanmış Duyurular</h4>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->


                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr class="text-center">
                                    <th>Konu</th>
                                    <th>İçeriği</th>
                                    <th>Oluşturulma tarihi</th>
                                    <th class="disabled-sorting">İşlem</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr class="text-center">
                                    <th>Konu</th>
                                    <th>İçeriği</th>
                                    <th>Oluşturulma tarihi</th>
                                    <th class="disabled-sorting">İşlem</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($notifications as $notification)
                                    <tr class="text-center">
                                        <td>{{ $notification->subject }}</td>
                                        <td>{{ $notification->content }}</td>
                                        <td>{{ $notification->created_at }}</td>
                                        <td>
                                            <a href="#" class="btn btn-link btn-warning btn-just-icon edit" rel="tooltip" data-placement="bottom" title="Görüntüle"><i class="material-icons">remove_red_eye</i></a>
                                            <button id="{{ $notification->notification_id }}" onclick="deleteNotification({{ $notification->notification_id }})" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons" rel="tooltip" data-placement="bottom" title="Duyuruyu Sil">delete</i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end content-->
                </div>
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
        <!-- end row -->
    </div>
@endsection

@section('footer')
    <script>
        var socket = io.connect('http://localhost:8890');
        socket.on('notification', function (data) {
            /*data = jQuery.parseJSON(data);
            alert('sdfdsfdsfd');
            console.log();
            console.log(data.content);*/
            console.log(data.name);
        });
        $("#broadCastBtn").click(function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers : {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var subject = $("#subject").val();
            var content = $("#content").val();
            var rooms = $('#selectRoom').val();
            if(subject === '' || content === '' ||  rooms == ''){
                Swal.fire({
                    icon: 'warning',
                    title: 'Lütfent tüm alanları doldurun!',
                    text: 'Yayınlanacak sınıfı seçmeyi unutmayın.',
                    confirmButtonText: 'Tamam'
                })
            }else{
                $.ajax({
                    type: "POST",
                    url: window.location.origin+'/teacher/notifications/store',
                    data: {
                        subject: subject,
                        notificationContent: content,
                        rooms: rooms
                    },
                    success:function(data){
                        console.log(data);
                        //window.location.reload(true);
                    }
                });
            }
        })

        function deleteNotification(notification_id = null)
        {
            $('#'+notification_id).click(function (e) {
                e.preventDefault();


            });

            if (notification_id !== null)
            {
                $.ajaxSetup({
                    headers : {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var base_url = window.location.origin;

                Swal.fire({
                    title: 'Duyuruyu silmek istediğinden eminmisin?',
                    text: "Silinen duyuru bir daha geri getirilemez!",
                    icon: 'warning',
                    showCancelButton: true,
                    showCloseButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Evet, sil!',
                    cancelButtonText: 'İptal'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: base_url + "/teacher/notifications/destroy/"+notification_id,
                            method: 'delete',
                            success: function (result) {
                                if (result.success === 'error'){
                                    Swal.fire(
                                        'Hata!',
                                        result.message,
                                        'warning',
                                    )
                                }else{
                                    console.log(result.success);
                                    window.location.reload(true);
                                }
                            }
                        })
                    }
                })
            }
        }
    </script>
    <script>
        $(document)
            .one('focus.autoExpand', 'textarea.autoExpand', function(){
                var savedValue = this.value;
                this.value = '';
                this.baseScrollHeight = this.scrollHeight;
                this.value = savedValue;
            })
            .on('input.autoExpand', 'textarea.autoExpand', function(){
                var minRows = this.getAttribute('data-min-rows')|0, rows;
                this.rows = minRows;
                rows = Math.ceil((this.scrollHeight - this.baseScrollHeight) / 16);
                this.rows = minRows + rows;
            });

    </script>
@endsection