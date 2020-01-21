@extends('layouts.master')

@section('title','senEdu | Aktivite Başlat')

@section('content')
    <div class="container-fluid">
        <div class="col-md-10 col-12 mr-auto ml-auto">
            <!--      Wizard container        -->
            <div class="wizard-container">
                <div class="card card-wizard active" data-color="rose" id="wizardProfile">
                    <form action="#" method="">
                        <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                        <div class="card-header text-center">
                            <h3 class="card-title">
                                Hızlı Sınav Başlat
                            </h3>
                            <h5 class="card-description">Önceden hazırladığınız sınavlardan öğrencilerinizi hemen test edin.</h5>
                        </div>
                        <div class="wizard-navigation">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#about" data-toggle="tab" role="tab">
                                        Sınavı  Seçin
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#account" data-toggle="tab" role="tab">
                                        Sınav Ayarları ve Teslim Yöntemi
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="about">
                                    <h4 class="info-text"><b>Adım 1/2</b></h4>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header card-header-rose card-header-icon">

                                                </div>
                                                <div class="card-body">

                                                    <div class="material-datatables">
                                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                                            <thead>
                                                            <tr class="text-center">
                                                                <th>Sınav adı</th>
                                                                <th>Soru sayısı</th>
                                                                <th>Oluşturulma tarihi</th>
                                                                <th class="disabled-sorting">#</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($exams as $index=>$exam)
                                                                <tr class="text-center">
                                                                    <td><a href="{{ route('teacher.exams.new',$exam->exam_id) }}"><u>{{ $exam->exam_name }}</u></a></td>
                                                                    <td>{{ $count[$index] }}</td>
                                                                    <td>{{ $exam->created_at }}</td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input form-control" type="radio" name="select_exam" value="{{ $exam->exam_id }}" required> Sınavı Seç
                                                                                <span class="circle">
                                                                                    <span class="check"></span>
                                                                                </span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <!-- end content-->
                                            </div>
                                            <!--  end card  -->
                                        </div>
                                        <!-- end col-md-12 -->
                                    </div>
                                </div>
                                <div class="tab-pane" id="account">
                                    <h4 class="info-text"> <b>Adım 2/2 </b></h4>
                                    <div class="row justify-content-center">
                                        <div class="col-md-10 col-sm-10">
                                            <div class="togglebutton">
                                                <h6>Anında geri bildirim</h6>
                                                <label>
                                                    <input type="checkbox" >
                                                    <span class="toggle"></span>
                                                    <b>Anında geri bildirim, her soru sonunda sorunun puan değerini gösterir.</b>
                                                </label>
                                            </div>
                                            <hr>
                                            <div class="togglebutton">
                                                <h6>Gezintiyi Açın</h6>
                                                <label>
                                                    <input type="checkbox" >
                                                    <span class="toggle"></span>
                                                    <b>Gezinti, sınav esnasında öğrencinin sorular arasında geçiş yapmasını sağlar.</b>
                                                </label>
                                            </div>
                                            <hr>
                                            <div class="togglebutton">
                                                <h6>Son Puanı Göster</h6>
                                                <label>
                                                    <input type="checkbox" >
                                                    <span class="toggle"></span>
                                                    <b>Sınav sonunda öğrenciye notunu gösterir.</b>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="mr-auto">
                                <input type="button" class="btn btn-previous btn-fill btn-default btn-wd disabled" name="previous" value="Önceki">
                            </div>
                            <div class="ml-auto">
                                <input type="button" class="btn btn-next btn-fill btn-rose btn-wd" name="next" value="Sonraki">
                                <input type="button" class="btn btn-finish btn-fill btn-rose btn-wd" name="finish" value="Sınavı başlat" style="display: none;">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- wizard container -->
        </div>
    </div>
@endsection

@section('footer')
    <script>
        $(document).ready(function() {
            // Initialise the wizard
            demo.initMaterialWizard();
            setTimeout(function() {
                $('.card.card-wizard').addClass('active');
            }, 600);

            /*$("input[name='next']").val('Sonraki');
            $("input[name='previous']").val('Önceki');
            $("input[name='finish']").val('Sınavı Başlat');*/
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#datatables').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Sınav ara...",
                }
            });

            var table = $('#datatable').DataTable();

            // Edit record
            table.on('click', '.edit', function() {
                $tr = $(this).closest('tr');
                var data = table.row($tr).data();
                alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
            });

            // Delete a record
            table.on('click', '.remove', function(e) {
                $tr = $(this).closest('tr');
                table.row($tr).remove().draw();
                e.preventDefault();
            });

            //Like record
            table.on('click', '.like', function() {
                alert('You clicked on Like button');
            });
        });
    </script>
@endsection