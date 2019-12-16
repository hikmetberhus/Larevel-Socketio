$(document).ready(function () {
    const optionName  = ['A','B','C','D','E','F','G','H','I','J','K'];
    const optDefaultCount  = 5;

    createOptionHtml(0,optDefaultCount,optionName);

    $('#submitQuestion').click(function (e) {
        e.preventDefault();

        var base_url = window.location.origin;
        var exam_id = $('#exam_id').val();



        $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        if(exam_id === ""){
            console.log('null değer ');
            $.ajax({
                url: base_url + "/teacher/exams/store",
                method: 'post',
                data: {
                    exam_name: $('#exam_name').val(),
                    request_type: 'ajax'
                },
                success: function (result) {
                    console.log(result.success);
                    exam_id = result.exam_id;
                    $('#exam_id').val(exam_id);
                    addQuestion(base_url,exam_id);
                }
            });

        }else{
            addQuestion(base_url,exam_id);
        }


    });


    function addQuestion(base_url,exam_id) {
        $.ajax({
            url: base_url + "/teacher/question",
            method: 'post',
            data: {
                exam_id: exam_id,
                question_content: $('#question_content').val(),
                option_A: $('#option_A').val(),
                option_B: $('#option_B').val(),
                option_C: $('#option_C').val(),
                option_D: $('#option_D').val(),
                option_E: $('#option_E').val(),
                description : $('#description').val(),
                right_options: $('#right_options').val(),
            },
            success: function (result) {
                console.log(result.success);
                console.log(result.count);

                $('#question_content').val('');
                $('#answerContent').html('');
                createOptionHtml(0,optDefaultCount,optionName);
                $('#description').val('');
                $('#right_options').val('');
                $('#question_sort').html('<b># '+ (result.count+1) +'</b>')
            }
        })
    }

    function createOptionHtml(start=0,end=5,optionName) {

        if (start >= optionName.length){
            Swal.fire({
                icon: 'error',
                title: 'Uyarı!',
                text: 'Ekleyebileceğiniz maksimum cevap sayısına ulaştınız.',
                confirmButtonText: 'Tamam',

            })
        }else{
            for (let i = start ; i < end ;i++){
                $('#answerContent').append('<div id="answer-'+ (i+1) +'" class="row">' +
                    '<div class="col-md-1 col-sm-1 ">' +
                    '<label for="option_'+ optionName[i] +'" class="option">'+ optionName[i] +'</label></div>' +
                    '<div class="col-md-9 col-sm-9 ml-0">' +
                    '<textarea id="option_'+ optionName[i] +'" name="option_'+ optionName[i] +'" rows="2" data-min-rows="2" class="autoExpand quiz-text" ></textarea></div>' +
                    '<!--<div class="col-md-1 col-sm-1 mt-2">' +
                    '<span  class="delete_button" rel="tooltip" data-placement="bottom" title="Seçeneği sil">' +
                    '<i id="'+ (i+1) +'" onclick="deleteOption('+ (i+1) +')"  class="material-icons deleteBtn">delete_outline</i></span>\n' +
                    '</div>-->' +
                    '<div class="col-md-1 col-sm-1">' +
                    '<div class="form-check">' +
                    '<label class="form-check-label">' +
                    '<input class="form-check-input" type="checkbox" onclick="rightChoice()"  id="'+ optionName[i] +'"  value="'+ optionName[i] +'">' +
                    '<span class="form-check-sign">' +
                    '<span class="check"></span>' +
                    '</span>' +
                    '</label>' +
                    '</div>' +
                    '</div>' +
                    '</div>'
                );
            }
        }
    }

    function listQuestions() {

    }

});

function right_options(action,option) {

    var options = $('#right_options').val();

    var index;
    var temp;

    if(action === 'add'){
        if (options === ""){
            $('#right_options').val(option);
        }else{
            temp = options.split('||');
            index = temp.indexOf(option);
            if (index < 0) {
                temp.push(option);
                $('#right_options').val(temp.join('||'));
            }

        }
    }else if(action === 'delete'){
        temp = options.split('||');
        index = temp.indexOf(option);

        if (index > -1) {
            temp.splice(index, 1);
            $('#right_options').val(temp.join('||'));
        }
    }
}

function rightChoice(){

    $(".form-check-input").change(function() {

        if(this.checked === true) {
            var idName = 'option_'+$(this).attr('id');
            right_options('add',idName);
            $("label[for='"+ idName +"']").removeClass('option');
            $("label[for='"+ idName +"']").addClass('selected-option');
            $("#"+idName).removeClass('quiz-text');
            $("#"+idName).addClass('selected-quiz-text');
            console.log(idName);
        }else if(this.checked === false){
            var idName = 'option_'+$(this).attr('id');
            right_options('delete',idName);
            $("label[for='"+ idName +"']").removeClass('selected-option');
            $("label[for='"+ idName +"']").addClass('option');
            $("#"+idName).removeClass('selected-quiz-text');
            $("#"+idName).addClass('quiz-text');
        }
    });
}

function deleteOption(index){

    let optionName  = ['A','B','C','D','E','F','G','H','I','J','K'];
    let count=0;

    for(let i=1;i<optionName.length;i++){

        let temp = $('#answer-'+ (count+1)).html();
        if(temp === undefined){
            break
        }else{
            count++;
        }
    }

    console.log(count);
    $('#answer-'+ (index)).remove();

    for(let i=index ; i< count;i++){

        $("label[for=option-"+ optionName[i] +"]").attr('for', 'option-'+optionName[i-1]);
        $("label[for=option-"+ optionName[i-1] +"]").text(optionName[i-1]);
        $('#option-'+optionName[i]).attr({
            id: "option-"+optionName[i-1],
            name: "option-"+optionName[i-1],
        });
        $('#deleteOption-'+optionName[i]).attr({
            id: "deleteOption-"+optionName[i-1],
            onclick: "deleteOption("+ i +")",
        });
        $('#answer-'+(i+1)).attr({ id: "#answer-"+(i-1) });

    }

}

$('#addOptionBtn').on('click',function () {
    let count=0;
    while (true){

        let temp = $('#answer-'+ (count+1)).html();
        if(temp === undefined){
            break
        }else{
            count++;
        }
    }
    createOptionHtml(count,count+1,optionName);
});

