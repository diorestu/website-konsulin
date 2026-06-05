@extends('admin.layout.main')

@section('title')
    Contact Message List
@endsection

@push('addon-style')
    <link href="{{ asset('backend-assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend-assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
@endpush

@section('content')
    <div class="row px-0">
        <div class="col-12">
            <div class="page-title-box pb-2 d-sm-flex align-items-start justify-content-between">
                <div>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Contact</li>
                    </ol>
                    <h4 class="mb-sm-0 fw-bold font-size-22 mt-3">Contact Message List</h4>
                    <p class="text-muted mt-1 text-opacity-50">These following data is the message obtained from the website
                        contact form</p>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-custom gutter-b rounded-sm shadow-sm">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover" id="myTable">
                    <thead class="table-dark">
                        <tr>
                            <th width="">No</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Subject</th>
                            <th>Date</th>
                            <th class="text-center">Detail</th>
                            <th width="5%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $i)
                            <tr
                                data-child-value="
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td width='70%'>{{ $i->ct_email }}</td>
                                </tr>
                                <tr>
                                    <td>Message</td>
                                    <td>:</td>
                                    <td width='70%'>{{ $i->ct_pesan }}</td>
                                </tr>
                                <tr>
                                    <td>Date</td>
                                    <td>:</td>
                                    <td width='70%'>{{ tanggalIndoWaktuLengkap($i->created_at) }}</td>
                                </tr>
                                ">
                                <td>{{ $loop->iteration }}</td>
                                <td class='font-weight-bolder'>{{ $i->ct_name }}</td>
                                <td>{{ $i->ct_phone }}</td>
                                <td>{{ $i->ct_subject }}</td>
                                <td>{{ tanggalIndoWaktuLengkap($i->created_at) }}</td>
                                <td class="dt-control text-center">
                                    <a class="btn btn-dark btn-sm btn-circle" href="javascript:void(0);"><i
                                            class="fas fa-chevron-down"></i></a>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button
                                            class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle"
                                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end" style="">
                                            <li><a id="{{ $i->id }}" href="javascript:void(0);"
                                                    class="remove dropdown-item text-danger"><i
                                                        class="fa fa-trash text-danger me-2"></i><b>Delete</b></a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script src="{{ asset('backend-assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend-assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        function format(data) {
            return '<table class="table">' + data + '</table>';
        }
        $(document).ready(function() {
            $('#myTable').DataTable({
                lengthMenu: [30, 60, 150, 300],
                order: [
                    [0, 'asc']
                ]
            });
            $('#myTable tbody').on('click', 'td.dt-control', function() {
                var table = $('#myTable').DataTable();
                var tr = $(this).closest('tr');
                var row = table.row(tr);
                if (row.child.isShown()) {
                    row.child.hide();
                    tr.removeClass('shown');
                } else {
                    row.child(format(tr.data('child-value'))).show();
                    tr.addClass('shown');
                }
            });
            $('#myTable').on('click', '.remove', function() {
                var table = $('#myTable').DataTable();
                var row_index = table.row($(this).closest('tr'));
                var idData = $(this).attr("id");
                Swal.fire({
                    title: 'Delete Confirmation',
                    text: 'Are you sure want to delete this data?',
                    icon: 'question',
                    confirmButtonText: '<i class="fas fa-trash"></i>&nbsp; Delete',
                    confirmButtonColor: '#e83f3f',
                    showConfirmButton: 'true',
                    showCancelButton: 'true',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var url = "{{ url('admin/module-contact') }}" + '/' + idData;
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: 'DELETE',
                            url: url,
                            beforeSend: function() {
                                Swal.showLoading()
                            },
                            success: function(result) {
                                if (result == "ok") {
                                    row_index.remove().draw();
                                    Swal.fire('Deleted',
                                        'Data has been deleted',
                                        'success')
                                } else {
                                    Swal.fire('Failed', result, 'error')
                                }
                            },
                            cache: false,
                            contentType: false,
                            processData: false
                        });
                    }
                });
            });
        });
    </script>
    @if (Session::has('success'))
        <script type="text/javascript">
            Swal.fire('Berhasil', '{{ \Session::get('success') }}', 'success')
        </script>
    @endif
    @if (Session::has('error'))
        <script type="text/javascript">
            Swal.fire('Gagal', '{{ \Session::get('error') }}', 'error')
        </script>
    @endif
@endpush
