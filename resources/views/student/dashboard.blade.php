@extends('student.layouts.master')

@section('title','senEdu')

@section('content')
    <div class="row">
        @include('student.layouts.partials.classroomList')
    </div>
@endsection

@section('footer')
    <script type="text/javascript" src="{{ asset('js/student/dashboard.js') }}" ></script>

@endsection