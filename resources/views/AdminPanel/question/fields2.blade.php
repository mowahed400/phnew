@isset($questions)
    @method('PUT')
    <input type="hidden" value="{{$questions->id }}" name="id">
@endisset
@csrf
<div class="card-body border-top p-9">

    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.question') }}</label>
        <!--end::Label-->

        <!--begin::Col-->
        <div class="col-lg-8">
            <!--begin::Row-->
            <div class="row">
                <!--begin::Col-->
                <div class="col-lg-12 fv-row fv-plugins-icon-container">
                    <input type="text" name="question"
                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                        placeholder="{{ __('lang.question') }}" value="{{ $questions->question ?? '' }}">
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                    </div>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Col-->
    </div> <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.answer') }}</label>
        <!--end::Label-->

        <!--begin::Col-->
        <div class="col-lg-8">
            <!--begin::Row-->
            <div class="row">
                <!--begin::Col-->
                <div class="col-lg-12 fv-row fv-plugins-icon-container">
                    <input type="text" name="correct_answer"
                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                        placeholder="{{ __('lang.answer') }}" value="{{ $questions->correct_answer ?? '' }}">
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                    </div>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Col-->
    </div>
    <!--begin::Input group-->


        <!--end::Col-->
    </div>

    <!--end::Input group-->
    <!--begin::Input group-->



        <!--begin::Col-->

        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->

    <!--end::Input group-->

    <!--begin::Input group-->

    <!--end::Input group-->

</div>


<script>
    $(document).ready(function() {
                $('.js-example-basic').select2({
                    placeholder: "{{ __('lang.select') }}",
                    allowClear: true
                });
</script>
