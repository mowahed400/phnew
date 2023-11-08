<!--begin::Table-->
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


