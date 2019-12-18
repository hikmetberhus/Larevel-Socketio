
function deleteExam(exam_id =null) {

    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    if (exam_id !== null) {
        var base_url = window.location.origin;

        Swal.fire({
            title: 'Sınavı silmek istediğinden eminmisin?',
            text: "Silinen ssınav bir daha geri getirilemez!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Evet, sil!',
            cancelButtonText: 'İptal'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: base_url + "/teacher/exams/destroy/"+exam_id,
                    method: 'delete',
                    success: function (result) {
                        if (result.success){
                            console.log(result.success);
                            window.location.reload(true);
                        }

                    }
                })
            }
        })
    }
}



