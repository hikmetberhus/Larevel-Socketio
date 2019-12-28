@extends('student.layouts.master')

@section('title','senEdu')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card card-chart" >
                <div class="card-header card-header-success" >
                    <h3><b>Sınıf adı</b></h3>
                    <h4> Öğretmen adı</h4>
                </div>
                <div class="card-body">
                    <h4 class="card-title"><a href="#"><b>Sınıfa git</b></a> </h4>
                    <p class="card-category">Devam eden aktivite: <b>Yok</b></p>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">access_time</i> Yakın zamanda sınav yok.
                    </div>
                    <button type="button" class="btn btn-danger btn-link" rel="tooltip" data-placement="bottom" title="" data-original-title="Sınıfı sil">
                        <i class="material-icons">close</i>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script type="text/javascript" src="{{ asset('js/student/dashboard.js') }}" ></script>
@endsection