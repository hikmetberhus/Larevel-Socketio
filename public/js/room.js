
$(document).ready(function () {

    const base_url = window.location.origin;

    $('#datatables').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Sınıf ara...",
        }
    });

    var table = $('#datatable').DataTable();

    // Edit record
    table.on('click', '.edit', function() {
        $tr = $(this).closest('tr');
        var data = table.row($tr).data();
        alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
    });

    // Delete a record
    table.on('click', '.remove', function(e) {
        $tr = $(this).closest('tr');
        table.row($tr).remove().draw();
        e.preventDefault();
    });

    //Like record
    table.on('click', '.like', function() {
        alert('You clicked on Like button');
    });

    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#addRoomBtn').click(function (e) {
        e.preventDefault();

        Swal.fire({
            title: 'Sınıf adını giriniz:',
            input: 'text',
            inputAttributes: {
                autocapitalize: 'off'
            },
            inputValidator: (value) => {
                if (!value) {
                    return 'Sınıf adı boş bırakılamaz!'
                }
            },
            showCancelButton: true,
            showCloseButton: true,
            confirmButtonText: 'Sınıf Ekle',
            cancelButtonText: 'İptal',
            showLoaderOnConfirm: true,
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: base_url + "/teacher/rooms/store",
                    method: 'post',
                    data: result,
                    success: function (result) {
                        if (result.success){
                            window.location.reload(true);
                        }
                    }
                }).fail(function (error) {
                    Swal.showValidationMessage(
                        `Bir hata oluştu: ${error}`
                    )
                })
            }
        })

    });



});

function editRoom(room_id = null) {

    if (room_id !== null){

        var base_url = window.location.origin;
        var room_name = $('#room-'+room_id).text();

        Swal.fire({
            title: 'Sınıfı düzenle:',
            input: 'text',
            inputValue: room_name,
            inputAttributes: {
                autocapitalize: 'off'
            },
            inputValidator: (value) => {
                if (!value) {
                    return 'Sınıf adı boş bırakılamaz!'
                }
            },
            showCancelButton: true,
            showCloseButton: true,
            confirmButtonText: 'Güncelle',
            cancelButtonText: 'İptal',
            showLoaderOnConfirm: true,
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.value  !== room_name) {
                $.ajax({
                    url: base_url + "/teacher/rooms/update/"+room_id,
                    method: 'post',
                    data: result,
                    success: function (result) {
                        if (result.success){
                            window.location.reload(true);
                        }
                    }
                }).fail(function (error) {
                    Swal.showValidationMessage(
                        `Bir hata oluştu: ${error}`
                    )
                })
            }
        })

    }
}

function deleteRoom(room_id = null) {

    $('#'+room_id).click(function (e) {
        e.preventDefault();
    });

    if (room_id !== null) {

        var base_url = window.location.origin;

        Swal.fire({
            title: 'Sınıfı silmek istediğinden eminmisin?',
            text: "Silinen sınıf bir daha geri getirilemez!",
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
                    url: base_url + "/teacher/rooms/destroy/"+room_id,
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

