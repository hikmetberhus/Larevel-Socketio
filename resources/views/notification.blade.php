@extends('layouts.master')

@section('title','senEdu | Bildirimler')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">add_alert</i>
                        </div>
                        <h4 class="card-title">Duyuru yayınla</h4>

                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->

                        </div>
                        <form action="" method="">
                            <div class="row justify-content-start">
                                <label for="subject" class="col-md-3 col-form-label"><b>Konu:</b></label>
                                <div class="col-md-7">
                                    <div class="form-group has-default bmd-form-group">
                                        <input type="text" class="form-control" id="subject" name="subject">
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-start">
                                <label for="content" class="col-md-3 col-form-label"><b>Duyuru içeriği:</b></label>
                                <div class="col-md-7">
                                    <div class="form-group has-default bmd-form-group">
                                        <textarea name="content" id="content"  rows="2" data-min-rows="2" class="autoExpand form-control mt-2"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-start">
                                <label for="selectRoom" class="col-md-3 col-form-label"><b>Yayınlanacağı Sınıf / Sınıflar:</b></label>
                                <div class="col-lg-6 col-md-7 col-sm-4">
                                    <div class="dropdown bootstrap-select show-tick">
                                        <select name="selectRoom" id="selectRoom" class="selectpicker" data-style="select-with-transition" multiple="" title="Sınıf seç" data-size="7" tabindex="-98">
                                            <option disabled=""> Sınıf Listesi</option>
                                            @foreach($rooms as $room)
                                                <option value="{{ $room->room_id }}">{{ $room->room_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center mt-5">

                                <div class="col-md-7">
                                    <div class="">
                                        <button class="btn  btn-round btn-outline-primary col-md-5">Yayınla</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- end content-->
                </div>
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
        <!-- end row -->
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">receipt</i>
                        </div>
                        <h4 class="card-title">Yayınlanmış Duyurular</h4>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->


                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr class="text-center">
                                    <th>Konu</th>
                                    <th>İçeriği</th>
                                    <th>Oluşturulma tarihi</th>
                                    <th class="disabled-sorting">İşlem</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr class="text-center">
                                    <th>Konu</th>
                                    <th>İçeriği</th>
                                    <th>Oluşturulma tarihi</th>
                                    <th class="disabled-sorting">İşlem</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                {{--@foreach($exams as $index=>$exam)
                                    <tr class="text-center">
                                        <td><a href="{{ route('teacher.exams.new',$exam->exam_id) }}"><u>{{ $exam->exam_name }}</u></a></td>
                                        <td>{{ $count[$index] }}</td>
                                        <td>{{ $exam->created_at }}</td>
                                        <td>
                                            <a href="#" class="btn btn-link btn-info btn-just-icon like" rel="tooltip" data-placement="bottom" title="Sınavı kopyala"><i class="material-icons">filter_none</i></a>
                                            <a href="#" class="btn btn-link btn-warning btn-just-icon edit" rel="tooltip" data-placement="bottom" title="Sınavı indir"><i class="material-icons">cloud_download</i></a>
                                            <button onclick="deleteExam({{ $exam->exam_id }})" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons" rel="tooltip" data-placement="bottom" title="Sınavı sil">delete</i></button>
                                        </td>
                                    </tr>
                                @endforeach--}}
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
        <!-- end row -->
    </div>
@endsection

@section('footer')
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