
function replaceDefaultRoom(room_id = null) {
    $(document).ready(function () {
        $('#'+room_id).click(function (e) {
            e.preventDefault();

        });

        $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        if (room_id !== null)
        {
            var base_url = window.location.origin;

            $.ajax({
                url: base_url + "/teacher/rooms/replaceIsDefault/"+room_id,
                method: 'post',
                data: room_id,
                success: function (result) {
                    if (result.success){
                        window.location.reload(true);
                    }
                }
            })
        }
    });
}