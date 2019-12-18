$(document).ready(function () {

    const optionName  = ['A','B','C','D','E','F','G','H','I','J','K'];
    const optDefaultCount  = 5;
    const base_url = window.location.origin;

    createOptionHtml(0,optDefaultCount,optionName);

    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#submitQuestion').click(function (e) {
        e.preventDefault();

        var exam_id = $('#exam_id').val();

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
                    //console.log(result.success);
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

        var question_data ={
            exam_id: exam_id,
            question_content: $('#question_content').val(),
            option_A: $('#option_A').val(),
            option_B: $('#option_B').val(),
            option_C: $('#option_C').val(),
            option_D: $('#option_D').val(),
            option_E: $('#option_E').val(),
            description : $('#description').val(),
            right_options: $('#right_options').val(),
        };

        if(question_data.question_content === ''){
            Swal.fire({
                icon: 'error',
                title: 'Uyarı!',
                text: 'Soru içeriği boş olamaz!',
                confirmButtonText: 'Tamam',

            })
        }else if(question_data.option_A === '' ||
                 question_data.option_B === '' ||
                 question_data.option_C === '' ||
                 question_data.option_D === '' ||
                 question_data.option_E === ''){

            Swal.fire({
                icon: 'error',
                title: 'Uyarı!',
                text: 'Cevap secenekleri boş olamaz!',
                confirmButtonText: 'Tamam',

            })
        }else if(question_data.right_options === '') {
            Swal.fire({
                icon: 'error',
                title: 'Uyarı!',
                text: 'Sorunun en az bir doğru cevabı olmalıdır!',
                confirmButtonText: 'Tamam',

            })
        }else{
            $.ajax({
                url: base_url + "/teacher/question",
                method: 'post',
                data: question_data,
                success: function (result) {
                    if (result.success){
                        //console.log(result.success);
                        //console.log(result.count);
                        listQuestions(result.exam_id,result.question_id,result.count,question_data);

                        $('#question_content').val('');
                        $('#answerContent').html('');
                        createOptionHtml(0,optDefaultCount,optionName);
                        $('#description').val('');
                        $('#right_options').val('');
                        $('#question_sort').html('<b># '+ (result.count+1) +'</b>')
                    }



                }
            })
        }



        /**/
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

    function listQuestions(exam_id,question_id,question_sort,data) {
        var options=data.right_options.split('||');
        var right_options ={
            'option_A':  options.indexOf('option_A') > -1 ? 'right-answer' :'',
            'option_B':  options.indexOf('option_B') > -1 ? 'right-answer' :'',
            'option_C':  options.indexOf('option_C') > -1 ? 'right-answer' :'',
            'option_D':  options.indexOf('option_D') > -1 ? 'right-answer' :'',
            'option_E':  options.indexOf('option_E') > -1 ? 'right-answer' :'',
        };
        $('#questionList').append(' <div id="'+ question_id +'" class="question-list">\n' +
            '        <div class="row">\n' +
            '            <div class="col-md-2 col-sm-2">\n' +
            '                <span id="sort"><b># '+ question_sort +'</b></span>\n' +
            '            </div>\n' +
            '            <div class="col-md-6 col-sm-6"></div>\n' +
            '            <div class="col-md-4 col-sm-4 text-right">\n' +
            '                <button class="btn btn-warning btn-sm" ><i class="material-icons">edit</i> DÜZENLE</button>\n' +
            '                <button class="btn btn-just-icon btn-danger btn-sm" ><i class="material-icons"' +
            '                 onclick="deleteQuestion('+ exam_id +','+ question_id +')">delete</i></button>\n' +
            '                <button class="btn btn-just-icon btn-primary btn-sm" ><i class="material-icons">arrow_upward</i></button>\n' +
            '                <button class="btn btn-just-icon btn-primary btn-sm" ><i class="material-icons">arrow_downward</i></button>\n' +
            '            </div>\n' +
            '        </div>\n' +
            '        <div class="row">\n' +
            '            <div class="col-md-8 col-sm-8 mt-3">\n' +
            '                <span id="listing_question_content">'+ data.question_content +'</span>\n' +
            '                <p><h4><b>CEVAP SEÇENEĞİ</b></h4></p>\n' +
            '            </div>\n' +
            '        </div>\n' +
            '        <div class="row">\n' +
            '            <div class="col-md-1 col-sm-1 list-answer-option text-center '+ right_options.option_A +'">\n' +
            '                <span class="">A</span>\n' +
            '            </div>\n' +
            '            <div class="col-md-9 col-sm-9 list-answer '+ right_options.option_A +'">\n' +
            '                <span id="option_list_A" class=" ">'+ data.option_A +'</span>\n' +
            '            </div>\n' +
            '        </div>\n' +
            '        <div class="row">\n' +
            '            <div class="col-md-1 col-sm-1 list-answer-option text-center '+ right_options.option_B +'">\n' +
            '                <span class="">B</span>\n' +
            '            </div>\n' +
            '            <div class="col-md-9 col-sm-9 list-answer '+ right_options.option_B +'">\n' +
            '                <span id="option_list_B" class="">'+ data.option_B +'</span>\n' +
            '            </div>\n' +
            '        </div>\n' +
            '        <div class="row">\n' +
            '            <div class="col-md-1 col-sm-1 list-answer-option text-center '+ right_options.option_C +'">\n' +
            '                <span class="">C</span>\n' +
            '            </div>\n' +
            '            <div class="col-md-9 col-sm-9 list-answer '+ right_options.option_C +'">\n' +
            '                <span id="option_list_C" class="">'+ data.option_C +'</span>\n' +
            '            </div>\n' +
            '        </div>\n' +
            '        <div class="row">\n' +
            '            <div class="col-md-1 col-sm-1 list-answer-option text-center '+ right_options.option_D +'">\n' +
            '                <span class="">D</span>\n' +
            '            </div>\n' +
            '            <div class="col-md-9 col-sm-9 list-answer '+ right_options.option_D +'">\n' +
            '                <span id="option_list_D" class="">'+ data.option_D +'</span>\n' +
            '            </div>\n' +
            '        </div>\n' +
            '        <div class="row">\n' +
            '            <div class="col-md-1 col-sm-1 list-answer-option text-center '+ right_options.option_E +'">\n' +
            '                <span class="">E</span>\n' +
            '            </div>\n' +
            '            <div class="col-md-9 col-sm-9 list-answer '+ right_options.option_E +'">\n' +
            '                <span id="option_list_E" class="">'+ data.option_E +'</span>\n' +
            '            </div>\n' +
            '        </div>\n' +
            '        <div class="row">\n' +
            '            <div class="col-md-9 col-sm-9 mt-2">\n' +
            '                <span class=""><b>Açıklama: </b></span>\n' +
            '                <span id="description" class="">'+ data.description +'</span>\n' +
            '            </div>\n' +
            '        </div>\n' +
            '    </div>');

    }

    $('#saveAndQuitBtn').click(function (e) {
        e.preventDefault();

        $.ajax({
            url: base_url + "/teacher/exams/store",
            method: 'post',
            data:{
                exam_name: $('#exam_name').val(),
                request_type: 'ajax'
            },
            success: function (result) {
                if (result.success){
                    window.location.href = base_url+"/teacher/exams";
                }

            }
        })
    });

});


function deleteQuestion(exam_id,question_id) {
    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var base_url = window.location.origin;

    $('#'+question_id).click(function (e) {
        e.preventDefault();
    });
    Swal.fire({
        title: 'Soruyu silmek istediğinden eminmisin?',
        text: "Silinen soru bir daha geri getirilemez!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Evet, sil!',
        cancelButtonText: 'İptal'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: base_url + "/teacher/question/"+exam_id+"/"+question_id,
                method: 'delete',
                success: function (result) {
                    if (result.success){
                        console.log(result.success);
                        console.log(result.exam_id);
                        window.location.reload(true);
                    }

                }
            })
        }
    })
}

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

