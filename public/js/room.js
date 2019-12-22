
$(document).ready(function () {

    const base_url = window.location.origin;

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
                    return 'Sınav adı girmediniz!'
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