$(document).ready(function () {

    const base_url = window.location.origin;

    $('#addClassroomBtn').click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

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