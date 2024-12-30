<script>
    var input = document.getElementById("input");
    var table = document.getElementById("myTable")

    // var row_count = 0;

    $(document).ready(function() {
        input.focus();
        var table = $('#myTable').DataTable({
            "pagingType": "simple_numbers",
            "searching": false,
            "ordering": false,
            // "pageLength": 5,
            "lengthChange": false,
            "pageLength": 15

        });

        // input.focus();
        $('#input').on('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                var inputVal = $('#input').val();
                // console.log(inputVal);
                if (inputVal.includes(",")) {
                    var arr = inputVal.split(',');
                    // console.log(arr);
                    var val1 = arr[0];
                    // console.log(val1);
                    var val2 = arr[1];
                    // console.log(val2);
                    // cek data untuk menentukan data ada tidak di ekanban param
                    csrf_token = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: "{{ route('valiadasi_param1') }}",
                        method: 'get',
                        dataType: 'json',
                        data: {
                            '_token': csrf_token,
                            'val1': val1,
                            'val2': val2
                        },
                        success: function(data) {
                            // data koma 7
                            // untuk menentukan data koma 7 pada tabe;
                            if (data != "") {
                                // alert('data ada');
                                var kanban_no = arr[0];
                                var sq = arr[1];
                                // console.log(kanban_no);
                                // console.log(sq);
                                csrf_token = $('meta[name="csrf-token"]').attr('content');
                                $.ajax({
                                    url: "{{ route('validasi_data1') }}",
                                    method: 'get',
                                    dataType: 'json',
                                    data: {
                                        '_token': csrf_token,
                                        'kanban_no': kanban_no,
                                        'squence': sq
                                    },
                                    success: function(data) {
                                        // console.log(data);
                                        var tableData = table.rows().data();
                                        if (tableData.length >= 15) {
                                            document.getElementById(
                                                'Audioerror').play();
                                            swal.fire({
                                                icon: 'error',
                                                timer: 2000,
                                                title: 'Error',
                                                text: 'Data cannot exceed 15 rows',
                                            });
                                            return;
                                        }
                                        if (data == '') {
                                            var kanbanElements = document
                                                .getElementsByName(
                                                    "kanban_no[]");
                                            // console.log(kanbanElements);
                                            var sqElements = document
                                                .getElementsByName("sq[]");

                                            var alreadyExists = false;
                                            for (var i = 0; i < kanbanElements
                                                .length; i++) {
                                                if (kanbanElements[i].value ===
                                                    arr[0] &&
                                                    sqElements[i].value === arr[
                                                        1]) {
                                                    alreadyExists = true;
                                                    break;
                                                }
                                            }
                                            // console.log(alreadyExists);
                                            if (alreadyExists) {
                                                document.getElementById(
                                                    'Audioerror').play();
                                                swal.fire({
                                                    icon: 'error',
                                                    timer: 2000,
                                                    title: 'Perhatian',
                                                    text: 'Data Already Scan',
                                                });
                                            } else {
                                                var t = $('#myTable')
                                                    .DataTable();
                                                var counter = t.rows().count();
                                                var jml_row = Number(counter) +
                                                    1;
                                                var kanban_no = "kanban_no" +
                                                    jml_row;
                                                var sq = "sq" + jml_row;
                                                var part_no = "part_no" +
                                                    jml_row;
                                                var kode_item = "kode_item" +
                                                    jml_row;
                                                var qty = "qty" + jml_row;
                                                var cust = "cust" + jml_row;

                                                t.row.add([
                                                    '<input type="text" class=" text-center" id="' +
                                                    kanban_no +
                                                    '" name="kanban_no[]" value="' +
                                                    arr[0] +
                                                    '" readonly>',
                                                    '<input type="text" class=" text-center" id="' +
                                                    sq +
                                                    '" name="sq[]" value="' +
                                                    arr[1] +
                                                    '" readonly>',
                                                    '<input type="text" class=" text-center" id="' +
                                                    part_no +
                                                    '" name="part_no[]" value="' +
                                                    arr[2] +
                                                    '" readonly>',
                                                    '<input type="text" class=" text-center" id="' +
                                                    kode_item +
                                                    '" name="kode_item[]" value="' +
                                                    arr[3] +
                                                    '" readonly>',
                                                    '<input type="text" class=" text-center" id="' +
                                                    qty +
                                                    '" name="qty[]" value="' +
                                                    arr[4] +
                                                    '" readonly>',
                                                    '<input type="text" class=" text-center" id="' +
                                                    cust +
                                                    '" name="cust[]" value="' +
                                                    arr[
                                                        5] +
                                                    '" readonly>',
                                                ]).draw();
                                                var part_no = arr[2];
                                                var item_code = arr[3];
                                                // console.log(kode_item);
                                                csrf_token = $(
                                                    'meta[name="csrf-token"]'
                                                ).attr(
                                                    'content');
                                                $.ajax({
                                                    url: "{{ route('validasi_data3') }}",
                                                    method: 'get',
                                                    dataType: 'json',
                                                    data: {
                                                        '_token': csrf_token,
                                                        'part_no': part_no,
                                                        'item_code': item_code
                                                    },
                                                    success: function(
                                                        data) {
                                                        // console.log(data);
                                                        // console.log(data);
                                                        // alert(data);
                                                        var id =
                                                            data.id;
                                                        // console.log(id);
                                                        csrf_token =
                                                            $(
                                                                'meta[name="csrf-token"]'
                                                            ).attr(
                                                                'content'
                                                            );
                                                        $.ajax({
                                                            url: "{{ route('get_paramblob_image1') }}",
                                                            method: 'get',
                                                            dataType: 'json',
                                                            data: {
                                                                '_token': csrf_token,
                                                                'id': id
                                                            },
                                                            success: function(
                                                                data
                                                            ) {
                                                                // console.log(
                                                                //     data
                                                                // );
                                                                if (data
                                                                    .img_blob
                                                                ) {
                                                                    // Tampilkan elemen container jika data gambar tersedia
                                                                    $('.container')
                                                                        .show();

                                                                    // Setel sumber gambar jika data gambar tersedia
                                                                    $('#gambar')
                                                                        .attr(
                                                                            'src',
                                                                            data
                                                                            .img_blob
                                                                        );
                                                                } else {
                                                                    // Sembunyikan elemen container jika data gambar tidak tersedia
                                                                    $('.container')
                                                                        .hide();
                                                                }
                                                            }
                                                        });

                                                    }
                                                });
                                            }
                                        } else {
                                            document.getElementById(
                                                'Audioerror').play();
                                            swal.fire({
                                                icon: 'error',
                                                timer: 2000,
                                                title: 'Error',
                                                text: 'Data Already exists',
                                            });
                                        }
                                    }
                                });
                                //  jika data sama dengan kosong maka untuk memmasukan data per koma 8
                            } else if (data == "") {

                                // alert("tidak ada ");
                                csrf_token = $('meta[name="csrf-token"]').attr('content');
                                $.ajax({
                                    url: "{{ route('valiadasi_param2') }}",
                                    method: 'get',
                                    dataType: 'json',
                                    data: {
                                        '_token': csrf_token,
                                        'val1': val1,
                                        'val2': val2
                                    },
                                    success: function(data) {
                                        if (data != "") {
                                            // alert('data ada');
                                            var kanban_no = arr[1];
                                            var sq = arr[2];
                                            // console.log(kanban_no, sq);
                                            csrf_token = $(
                                                    'meta[name="csrf-token"]')
                                                .attr('content');
                                            $.ajax({
                                                url: "{{ route('validasi_data2') }}",
                                                method: 'get',
                                                dataType: 'json',
                                                data: {
                                                    '_token': csrf_token,
                                                    'kanban_no': kanban_no,
                                                    'squence': sq
                                                },
                                                success: function(
                                                    data) {
                                                    // alert(
                                                    //     'validasi no data lanjut ke tabel'
                                                    // )
                                                    // console.log(data);
                                                    var tableData =
                                                        table.rows()
                                                        .data();
                                                    if (tableData
                                                        .length >=
                                                        15) {
                                                        document
                                                            .getElementById(
                                                                'Audioerror'
                                                            )
                                                            .play();
                                                        swal.fire({
                                                            icon: 'error',
                                                            timer: 2000,
                                                            title: 'Error',
                                                            text: 'Data cannot exceed 15 rows',
                                                        });
                                                        return;
                                                    }
                                                    if (data ==
                                                        '') {
                                                        var kanbanElements =
                                                            document
                                                            .getElementsByName(
                                                                "kanban_no[]"
                                                            );
                                                        var sqElements =
                                                            document
                                                            .getElementsByName(
                                                                "sq[]"
                                                            );

                                                        var alreadyExists =
                                                            false;
                                                        for (var i =
                                                                0; i <
                                                            kanbanElements
                                                            .length; i++
                                                        ) {
                                                            if (kanbanElements[
                                                                    i
                                                                ]
                                                                .value ===
                                                                arr[
                                                                    1
                                                                ] &&
                                                                sqElements[
                                                                    i
                                                                ]
                                                                .value ===
                                                                arr[
                                                                    2
                                                                ]
                                                            ) {
                                                                alreadyExists
                                                                    =
                                                                    true;
                                                                break;
                                                            }
                                                        }
                                                        if (
                                                            alreadyExists
                                                        ) {
                                                            document
                                                                .getElementById(
                                                                    'Audioerror'
                                                                )
                                                                .play();
                                                            swal.fire({
                                                                icon: 'error',
                                                                timer: 2000,
                                                                title: 'Perhatian',
                                                                text: 'Data Already Scan',
                                                            });
                                                        } else {
                                                            // Add new row to datatable
                                                            var t =
                                                                $(
                                                                    '#myTable'
                                                                )
                                                                .DataTable();
                                                            var counter =
                                                                t
                                                                .rows()
                                                                .count();
                                                            var jml_row =
                                                                Number(
                                                                    counter
                                                                ) +
                                                                1;
                                                            var kanban_no =
                                                                "kanban_no" +
                                                                jml_row;
                                                            var sq =
                                                                "sq" +
                                                                jml_row;
                                                            var part_no =
                                                                "part_no" +
                                                                jml_row;
                                                            var kode_item =
                                                                "kode_item" +
                                                                jml_row;
                                                            var qty =
                                                                "qty" +
                                                                jml_row;
                                                            var cust =
                                                                "cust" +
                                                                jml_row;
                                                            t.row
                                                                .add(
                                                                    [
                                                                        '<input type="text" class=" text-center" id="' +
                                                                        kanban_no +
                                                                        '" name="kanban_no[]" value="' +
                                                                        arr[
                                                                            1
                                                                        ] +
                                                                        '" readonly>',
                                                                        '<input type="text" class=" text-center" id="' +
                                                                        sq +
                                                                        '" name="sq[]" value="' +
                                                                        arr[
                                                                            2
                                                                        ] +
                                                                        '" readonly>',
                                                                        '<input type="text" class=" text-center" id="' +
                                                                        part_no +
                                                                        '" name="part_no[]" value="' +
                                                                        arr[
                                                                            3
                                                                        ] +
                                                                        '" readonly>',
                                                                        '<input type="text" class=" text-center" id="' +
                                                                        kode_item +
                                                                        '" name="kode_item[]" value="' +
                                                                        arr[
                                                                            4
                                                                        ] +
                                                                        '" readonly>',
                                                                        '<input type="text" class=" text-center" id="' +
                                                                        qty +
                                                                        '" name="qty[]" value="' +
                                                                        arr[
                                                                            5
                                                                        ] +
                                                                        '" readonly>',
                                                                        '<input type="text" class=" text-center" id="' +
                                                                        cust +
                                                                        '" name="cust[]" value="' +
                                                                        arr[
                                                                            6
                                                                        ] +
                                                                        '" readonly>',
                                                                        // '<div class="text-center"><button class="delete-row btn btn-danger btn-sm"><i class="fa fa-trash remove"></i></button></div>',
                                                                    ]
                                                                )
                                                                .draw();
                                                            var part_no =
                                                                arr[
                                                                    3
                                                                ];
                                                            var item_code =
                                                                arr[
                                                                    4
                                                                ];
                                                            // console.log(kode_item);
                                                            csrf_token
                                                                = $(
                                                                    'meta[name="csrf-token"]'
                                                                )
                                                                .attr(
                                                                    'content'
                                                                );
                                                            $.ajax({
                                                                url: "{{ route('validasi_data4') }}",
                                                                method: 'get',
                                                                dataType: 'json',
                                                                data: {
                                                                    '_token': csrf_token,
                                                                    'part_no': part_no,
                                                                    'item_code': item_code
                                                                },
                                                                success: function(
                                                                    data
                                                                ) {
                                                                    // console.log(data);
                                                                    var id =
                                                                        data
                                                                        .id;
                                                                    csrf_token
                                                                        =
                                                                        $(
                                                                            'meta[name="csrf-token"]'
                                                                        )
                                                                        .attr(
                                                                            'content'
                                                                        );
                                                                    $.ajax({
                                                                        url: "{{ route('get_paramblob_image2') }}",
                                                                        method: 'get',
                                                                        dataType: 'json',
                                                                        data: {
                                                                            '_token': csrf_token,
                                                                            'id': id
                                                                        },
                                                                        success: function(
                                                                            data
                                                                        ) {
                                                                            if (data
                                                                                .img_blob
                                                                            ) {
                                                                                $('.container')
                                                                                    .show();
                                                                                $('#gambar')
                                                                                    .attr(
                                                                                        'src',
                                                                                        data
                                                                                        .img_blob
                                                                                    );
                                                                            } else {
                                                                                $('.container')
                                                                                    .hide();
                                                                            }
                                                                        }
                                                                    });
                                                                }
                                                            });
                                                        }
                                                    } else {
                                                        document
                                                            .getElementById(
                                                                'Audioerror'
                                                            )
                                                            .play();
                                                        swal.fire({
                                                            icon: 'error',
                                                            timer: 2000,
                                                            title: 'Error',
                                                            text: 'Data Already exists',
                                                        });
                                                    }
                                                }
                                            });

                                        } else if (data == "") {
                                            // alert('data tidak ada');
                                            swal.fire({
                                                icon: 'error',
                                                timer: 2000,
                                                title: 'Error',
                                                text: 'Data Not Found',
                                            });
                                        }
                                    }
                                })
                            }
                        }
                    });
                } else if (inputVal === "SendCode") {

                    $.ajax({
                        url: "{{ route('AddScanIn') }}",
                        method: 'POST',
                        dataType: 'json',
                        data: $('#form').serialize(),
                        success: function(data) {
                            // console.log(data);
                            $('.container').css('display', 'none');
                            document.getElementById('Audiosucces').play();
                            swal.fire({
                                icon: 'success',
                                title: 'success',
                                timer: 2000,
                                text: 'Data submit successfully',
                            });
                            // clear datatable
                            $('#myTable').DataTable().clear().draw();

                            // reset form input
                            // $('#myForm')[0].reset();
                            location.reload();
                            // Hide the container element by changing CSS property

                        }
                    });
                } else {
                    var arr = [""];
                    $('#input').val("");
                    //     $('#input').focus("");
                    //     return;
                }
                var inputArr = inputVal.split(',');

                $(document).on('click', '.delete-row', function() {
                    var table = $('#myTable').DataTable();
                    var row = $(this).closest('tr');
                    // console.log(row);
                    table.row(row).remove().draw();
                    $('#input').focus("");
                });

                // clear input
                $('#input').val('');

                // update jml_row input value
                $('#jml_row').val(table.rows().count());
                $('#input').focus("");
            }
        });
    });
</script>
