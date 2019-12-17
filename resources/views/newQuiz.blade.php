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
                    <form id="examInfoForm" name="examInfoForm" >
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
                                    <input type="text" class="form-control" name="exam_name" id="exam_name" value="İsimsiz Sınav">
                                    <input type="hidden" name="exam_id" id="exam_id" value="{{ $exam_id }}">
                                </div>
                            </div>
                        </div>
                        <div id="questionList">
                            @include('layouts.partials.listQuestions')
                        </div>
                    </div>
                    </form>
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
                                    <form name="addQuestionForm" id="addQuestionForm">
                                    <div class="card-header">
                                        <h4 class="card-title" id="question_sort"><b># {{ $sort }}</b></h4>
                                        <div class=" text-right">
                                            <button class="btn btn-warning" id="submitQuestion" ><i class="material-icons">save</i> KAYDET</button>
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
                                                <textarea name="question_content" id="question_content"  rows="2" data-min-rows="2" class="autoExpand quiz-text mt-2"></textarea>
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
                                                <input type="hidden" name="right_options" id="right_options" value="">
                                                <textarea id="description" name="description" rows="2" data-min-rows="2" class="autoExpand quiz-text"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
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
    <script src="{{asset('js/question.js')}}"></script>
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