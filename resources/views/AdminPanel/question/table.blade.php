<!--begin::Table-->
<table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-6 col-form-label  fw-semibold fs-6">{{ __('lang.filter') }}</label>
        <!--end::Label-->

        <!--begin::Col-->
        <div class="col-lg-6">
            <!--begin::Row-->
            <div class="row">
                <!--begin::Col-->

                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Col-->
    </div>
    <!--begin::Thead-->
    <thead>
        <tr class="fw-6 fw-semibold text-gray-600">
            <th class="min-w-250px">{{ __('lang.question') }}</th>
            <th class="min-w-250px">{{ __('lang.answer') }}</th>
{{--            <th class="min-w-250px">{{ __('lang.type') }}</th>--}}
            <th class="min-w-150px no-export">{{ __('lang.actions') }}</th>
        </tr>
    </thead>
    <!--end::Thead-->
    <!--begin::Tbody-->
    <tbody>
        @foreach ($questions as $question)
            <tr>
                <td>
                    <span class="badge badge-light-success fs-7 fw-bold">{{ $question->question }}</span>
                </td>
{{--                <td>--}}
{{--                    <span class="badge badge-light-success fs-7 fw-bold">{{ $question->correct_answer }}</span>--}}
{{--                </td>--}}
                <td>
                    <span class="badge badge-light-success fs-7 fw-bold">{{ $question->correct_answer }}</span>
                </td>


                <td>
                        <a href="{{ route('question.edit', $question->id) }}" class="btn btn-sm btn-light me-2">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <form method="POST" action="{{ route('question.destroy', $question->id) }}" style="display: inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger me-2">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>


                </td>

            </tr>
            <!-- Modal -->

        @endforeach
    </tbody>
    <!--end::Tbody-->
</table>
<!--end::Table-->

<style>
    div.dt-top-container {
    display: grid;
    grid-template-columns: auto auto auto;
    }

    div.dt-center-in-div {
    margin: 0 auto;
    }

    div.dt-filter-spacer {
    margin: 10px 0;
    }
</style>


<script>
    $(document).ready(function() {
        var table = $('#kt_datatable_dom_positioning').DataTable({
            "searching": true,
            "ordering": true,
            responsive: true,
            dom: '<"dt-top-container"<l><"dt-center-in-div"B><f>r>t<"dt-filter-spacer"f><ip>',
            buttons: [
                {
                extend: 'excelHtml5',
                text: '{{__('lang.exportexcel')}}',
                exportOptions: {
                columns: ':not(.no-export)' // Exclude columns with class 'no-export'
                },
                customize: function(xlsx) {
                // No need to hide the "Actions" column in this case
                }
                },
                {
                extend: 'pdfHtml5',
                text: '{{__('lang.exportpdf')}}',
                exportOptions: {
                columns: ':not(.no-export)' // Exclude columns with class 'no-export'
                },
                customize: function(xlsx) {
                // No need to hide the "Actions" column in this case
                }
                },

            ],

        });
        $('.filter').on('change', function() {
        var val = $.fn.dataTable.util.escapeRegex($(this).val());
        if (val==='all'){
            table.column(3).search('.' ? '.' : '', true, false).draw();
        }else{
            table.column(3).search(val ? '^'+val+'$' : '', true, false).draw();
        }

        });
    });

</script>


