@extends('layouts.master')

@section('title','senEdu | Raporlar')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">content_paste</i>
                        </div>
                        <h4 class="card-title">Raporlar</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table class="table">
                                <thead>
                                <tr class="text-center">
                                    <th><b>Sınav Adı</b></th>
                                    <th><b>Soru sayısı</b> </th>
                                    <th><b>Katılan öğrenci sayısı</b></th>
                                    <th><b>Tarih</b></th>
                                    <th><b>İşlem</b></th>
                                </tr>
                                </thead>
                                <tbody class="studentList">
                                @foreach($exam_broadcasts as $key=>$exam_broadcast)
                                    <tr class="text-center">
                                        <td><a href="{{ route('teacher.exams.new',$exams[$key]->exam_id) }}">{{ $exams[$key]->exam_name }}</a></td>
                                        <td>{{ $question_counts[$key] }}</td>
                                        <td>{{ $student_counts[$key] }}</td>
                                        <td>{{ $exam_broadcast->created_at }}</td>
                                        <td><a href="{{ route('teacher.reports.show',$exam_broadcast->exam_broadcast_id) }}">Sonuçları gör</a></td>
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