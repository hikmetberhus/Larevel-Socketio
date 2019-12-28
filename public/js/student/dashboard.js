$(document).ready(function () {


    const base_url = window.location.origin;

    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#addClassroomBtn').click(function (e) {
        e.preventDefault();


        Swal.fire({
            title: 'Sınıf kodunu giriniz:',
            input: 'text',
            inputAttributes: {
                autocapitalize: 'off'
            },
            inputValidator: (value) => {
                if (!value) {
                    return 'Sınıf kodu boş bırakılamaz!'
                }
            },
            showCancelButton: true,
            showCloseButton: true,
            confirmButtonText: 'Sınıfa katıl',
            cancelButtonText: 'İptal',
            showLoaderOnConfirm: true,
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: base_url + "/student/classrooms/store",
                    method: 'post',
                    data: result,
                    success: function (result) {
                        if (result.success === 'OK'){
                            console.log(result.message);
                            window.location.reload(true);
                        }else{
                            console.log(result.message);
                            Swal.fire({
                                icon: 'error',
                                title: 'Hatalı sınıf kodu girdiniz!',
                                text: 'Sınıf kodunun doğruluğundan emin olduktan sonra tekrar deneyiniz.',
                                confirmButtonText: 'Tamam'
                            })
                        }
                    }
                })
            }
        })
    })

});

function exitToClassroom(room_id = null) {

    $('#exitBtn-'+room_id).click(function (e) {
        e.preventDefault();
    });

    if (room_id !== null)
    {

        var base_url = window.location.origin;

        Swal.fire({
            title: 'Sınıftan ayrılmak istediğine Eminmisin?',
            text: "Kayıtlı aktivitelerin silinecektir!",
            icon: 'warning',
            showCancelButton: true,
            showCloseButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Evet, ayrıl!',
            cancelButtonText: 'İptal'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: base_url + "/student/classrooms/destroy/"+room_id,
                    method: 'delete',
                    success: function (result) {
                        if (result.success) {
                            console.log(result.success);
                            window.location.reload(true);
                        }
                    }
                })
            }
        })
    }
}