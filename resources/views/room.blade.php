@extends('layouts.master')

@section('title','senEdu | Sınıflar')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">perm_contact_calendar</i>
                        </div>
                        <h4 class="card-title">Sınıflar</h4>
                        <div class="card-header-text text-right">
                            <a href="#" id="addRoomBtn" class="btn btn-warning ">
                                <i class="material-icons" style="padding-right: 20px;">library_add</i>
                                Sınıf ekle
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->


                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr class="text-center">
                                    <th>Sınıf kodu</th>
                                    <th>Sınıf adı</th>
                                    <th>Öğrenci sayısı</th>
                                    <th>Oluşturulma tarihi</th>
                                    <th class="disabled-sorting">İşlem</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr class="text-center">
                                    <th>Sınıf kodu</th>
                                    <th>Sınıf adı</th>
                                    <th>Öğrenci sayısı</th>
                                    <th>Oluşturulma tarihi</th>
                                    <th class="disabled-sorting">İşlem</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($rooms as $index=>$room)
                                    <tr class="text-center">
                                        <td>{{ $room->room_id }}</td>
                                        <td><a href="{{ route('teacher.exams.new',$room->room_id) }}"><u>{{ $room->room_name }}</u></a></td>
                                        <td>0</td>
                                        <td>{{ $room->created_at }}</td>
                                        <td>
                                            <button onclick="deleteExam({{ $room->room_id }})" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons" rel="tooltip" data-placement="bottom" title="Sınıfı sil">delete</i></button>
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
        <!-- end row -->
    </div>
@endsection

@section('footer')
    <script type="text/javascript" src="{{ asset('js/room.js') }}"></script>
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
                    searchPlaceholder: "Sınıf ara...",
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