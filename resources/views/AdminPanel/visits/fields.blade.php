@isset($visits)
    @method('PUT')
    <input type="hidden" value="{{$visits->id }}" name="id">
@endisset
@csrf
<div class="card-body border-top p-9">
    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.supervisors') }}</label>
        <!--end::Label-->

        <!--begin::Col-->
        <div class="col-lg-8">
            <!--begin::Row-->
            <div class="row">
                <!--begin::Col-->
                <div class="col-lg-12 fv-row fv-plugins-icon-container">
                    <select id="kt_select2_3" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 " name="user_id">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" >
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
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
        <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.agent') }}</label>
        <!--end::Label-->

        <!--begin::Col-->
        <div class="col-lg-8">
            <!--begin::Row-->
            <div class="row">
                <!--begin::Col-->
                <div class="col-lg-12 fv-row fv-plugins-icon-container">
                    <select id="kt_select2_3" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 " name="agent_id">
                        @foreach ($agents as $agent)
                            <option value="{{ $agent->id }}">
                                {{ $agent->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">

                    </div>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Col-->
    </div>


    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.doctor') }}</label>
        <!--end::Label-->

        <!--begin::Col-->
        <div class="col-lg-8">
            <!--begin::Row-->
            <div class="row">
                <!--begin::Col-->
                <div class="col-lg-12 fv-row fv-plugins-icon-container">
                    <select id="kt_select2_3" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 " name="doctor_id">
                        @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id }}">
                                {{ $doctor->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">

                    </div>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Col-->
    </div>


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
