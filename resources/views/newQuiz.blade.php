@extends('layouts.master')
@section('title','senEdu | Sınav Ekle')
@section('head')
    <link rel="stylesheet" href="{{ asset('css/quiz_style.css') }}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 mr-auto ml-auto">
                <div class="card ">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Sınav Oluşturun</h4>
                        <div class=" text-right">
                            <button class="btn btn-warning" ><i class="material-icons">library_add</i> KAYDET ve ÇIK</button>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-10 mt-5 mr-auto ml-auto">
                                <div class="form-group bmd-form-group">
                                    <label for="quizName" class="bmd-label-floating">Sınav adı</label>
                                    <input type="text" class="form-control" name="quizName" id="quizName">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
                <div class="col-md-10 ml-auto mr-auto">
                    <div class="page-categories">
                        <h3 class="title ">Soru Ekle</h3>
                        <div class="tab-content tab-space tab-subcategories">
                            <div class="tab-pane active" id="link1">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title"><b># 1</b></h4>
                                        <div class=" text-right">
                                            <button class="btn btn-warning" ><i class="material-icons">save</i> KAYDET</button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4 text-center">
                                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                    <div>
                                                      <span class="btn btn-just-icon btn-outline-primary btn-lg btn-file" rel="tooltip" data-placement="bottom" title="Resim ekle">
                                                        <span class="fileinput-new"><i class="material-icons" >add_photo_alternate</i></span>
                                                        <span class="fileinput-exists"><i class="material-icons">add_photo_alternate</i></span>
                                                        <input type="file" name="..." />
                                                      </span>
                                                        <a href="#pablo" class="btn btn-just-icon btn-outline-danger btn-lg fileinput-exists" data-dismiss="fileinput"><i class="material-icons">delete</i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-sm-8">
                                                <textarea  rows="2" data-min-rows="2" class="autoExpand quiz-text mt-2"></textarea>
                                            </div>
                                        </div>
                                        <div class="row" >
                                            <div class="col-md-6 col-sm-6 mt-3">
                                                <div class="justify-content-start">
                                                    <h4><b>CEVAP SEÇENEĞİ</b></h4>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 mt-3">
                                                <div class="text-right">
                                                    <h4><b>DOĞRU CEVAP MI?</b></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="answerContent">

                                        </div>

                                        <!--<div class="row">
                                            <div class="col-md-3 col-ms-3">
                                                <button id="addOptionBtn" class="btn btn-primary"><i class="material-icons">add</i> CEVAP EKLE</button>
                                            </div>
                                        </div>-->
                                        <div class="row">
                                            <div class="col-md-2 col-ms-2 mt-5">
                                                <h5><b>Açıklama:</b></h5>
                                            </div>
                                            <div class="col-md-10 col-ms-10 mt-5">
                                                <textarea id="comment" name="comment" rows="2" data-min-rows="2" class="autoExpand quiz-text"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
@section('footer')
    <script src="{{asset('assets/js/plugins/sweetalert2.js')}}"></script>
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
        $(document).ready(function () {
            const optionName  = ['A','B','C','D','E','F','G','H','I','J','K'];
            const optDefaultCount  = 5;

            createOptionHtml(0,optDefaultCount,optionName);



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


        });

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
                        '<label for="option-'+ optionName[i] +'" class="option">'+ optionName[i] +'</label></div>' +
                        '<div class="col-md-9 col-sm-9 ml-0">' +
                        '<textarea id="option-'+ optionName[i] +'" name="option-'+ optionName[i] +'" rows="2" data-min-rows="2" class="autoExpand quiz-text" ></textarea></div>' +
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

        function rightChoice(){
            $(".form-check-input").change(function() {
                if(this.checked === true) {
                    var idName = 'option-'+$(this).attr('id');
                    $("label[for='"+ idName +"']").removeClass('option');
                    $("label[for='"+ idName +"']").addClass('selected-option');
                    $("#"+idName).removeClass('quiz-text');
                    $("#"+idName).addClass('selected-quiz-text');
                    console.log(idName);
                }else if(this.checked === false){
                    var idName = 'option-'+$(this).attr('id');
                    $("label[for='"+ idName +"']").removeClass('selected-option');
                    $("label[for='"+ idName +"']").addClass('option');
                    $("#"+idName).removeClass('selected-quiz-text');
                    $("#"+idName).addClass('quiz-text');
                }
            });

        }

        function deleteOption(index){

        console.log(index)
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


    </script>
@endsection