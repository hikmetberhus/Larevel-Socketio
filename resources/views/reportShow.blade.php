@extends('layouts.master')

@section('title','senEdu | Rapor ')
@section('head')
    <link rel="stylesheet" href="{{ asset('css/exam_launch.css') }}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Sınav Sonuc Ekranı</h4>

                    </div>
                    <div class="card-body">
                        <h5>Sınava giren öğrenci sayısı: <span id="studentCount"><b>{{ count($students) }}</b></span></h5>
                        <div class="table-responsive ">
                            <table>
                                <thead>
                                <tr>
                                    <th class="name">İsim</th>
                                    <th>Doğru Sayısı</th>
                                    <th>Yanlış Sayısı</th>
                                    @foreach($questions as $question)
                                        <th>{{ $question->sort }}</th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $key=>$student)
                                    @php
                                        $right_options_count = 0;
                                        $wrong_options_count = 0;
                                        $td = ''
                                    @endphp

                                    @foreach($questions as $index=>$question)
                                        @php
                                                $right_options = explode('||',$question->right_options);

                                                $class_name = '';
                                                $opt_text = '-';

                                                for($i=0; $i< count($students[$key]['answers']); $i++ )
                                                {
                                                    if($students[$key]['answers'][$i]['question_id'] == $question->question_id)
                                                    {
                                                        if($students[$key]['answers'][$i]['answer_given'] != null){
                                                            for($j=0 ; $j< count($right_options) ; $j++)
                                                            {
                                                                if($students[$key]['answers'][$i]['answer_given'] == $right_options[$j])
                                                                {
                                                                    $class_name = 'opt-right';
                                                                    $opt_text = explode('_',$students[$key]['answers'][$i]['answer_given'])[1];
                                                                    $right_options_count ++;
                                                                }else{
                                                                    $class_name = 'opt-wrong';
                                                                    $opt_text = explode('_',$students[$key]['answers'][$i]['answer_given'])[1];
                                                                    $wrong_options_count ++;
                                                                }
                                                            }
                                                        }

                                                    }
                                                }

                                                $td = $td . '<td class="'.$class_name.'">' . $opt_text .'</td>'
                                        @endphp

                                    @endforeach

                                    <tr>
                                        <td>{{ $students[$key]['name'] }}</td>
                                        <td class="text-center">{{ $right_options_count }}</td>
                                        <td class="text-center">{{ $wrong_options_count }}</td>
                                        {!! $td !!}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

