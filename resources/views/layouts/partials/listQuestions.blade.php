
@if($questions != null)
    @foreach($questions as $question)
        @php
            $right_options=explode('||',$question->right_options);

            $option_A = in_array('option_A',$right_options)  ? 'right-answer' :'';
            $option_B = in_array('option_B',$right_options)  ? 'right-answer' :'';
            $option_C = in_array('option_C',$right_options)  ? 'right-answer' :'';
            $option_D = in_array('option_D',$right_options)  ? 'right-answer' :'';
            $option_E = in_array('option_E',$right_options)  ? 'right-answer' :'';
        @endphp
        <div id="{{ $question->question_id }}" class="question-list">
        <div class="row">
            <div class="col-md-2 col-sm-2">
                <span id="sort"><b># {{ $question->sort  }}</b></span>
            </div>
            <div class="col-md-6 col-sm-6"></div>
            <div class="col-md-4 col-sm-4 text-right">
                <button class="btn btn-warning btn-sm" ><i class="material-icons">edit</i> DÜZENLE</button>
                <button class="btn btn-just-icon btn-danger btn-sm" onclick="deleteQuestion({{ $exam_id }},{{ $question->question_id }})" ><i class="material-icons">delete</i></button>
                <button class="btn btn-just-icon btn-primary btn-sm" ><i class="material-icons">arrow_upward</i></button>
                <button class="btn btn-just-icon btn-primary btn-sm" ><i class="material-icons">arrow_downward</i></button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-sm-8 mt-3">
                <span id="listing_question_content">{{ $question->content }}</span>
                <p><h4><b>CEVAP SEÇENEĞİ</b></h4></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1 col-sm-1 list-answer-option text-center {{ $option_A }}">
                <span class="">A</span>
            </div>
            <div class="col-md-9 col-sm-9 list-answer {{ $option_A }}">
                <span id="option_list_A" class=" ">{{ $question->option_A }}</span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1 col-sm-1 list-answer-option text-center {{ $option_B }}">
                <span class="">B</span>
            </div>
            <div class="col-md-9 col-sm-9 list-answer {{ $option_B }}">
                <span id="option_list_B" class="">{{ $question->option_B }}</span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1 col-sm-1 list-answer-option text-center {{ $option_C }}">
                <span class="">C</span>
            </div>
            <div class="col-md-9 col-sm-9 list-answer {{ $option_C }}">
                <span id="option_list_C" class="">{{ $question->option_C }}</span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1 col-sm-1 list-answer-option text-center {{ $option_D }}">
                <span class="">D</span>
            </div>
            <div class="col-md-9 col-sm-9 list-answer {{ $option_D }}">
                <span id="option_list_D" class="">{{ $question->option_D }}</span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1 col-sm-1 list-answer-option text-center {{ $option_E }}">
                <span class="">E</span>
            </div>
            <div class="col-md-9 col-sm-9 list-answer {{ $option_E }}">
                <span id="option_list_E" class="">{{ $question->option_E }}</span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 col-sm-9 mt-2">
                <span class=""><b>Açıklama: </b></span>
                <span id="description" class="">{{ $question->description }}</span>
            </div>
        </div>
    </div>
    @endforeach
@endif