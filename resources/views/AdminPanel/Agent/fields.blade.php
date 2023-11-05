@isset($agents)
    @method('PUT')
    <input type="hidden" value="{{ $agents->id }}" name="id">
@endisset
@csrf
<div class="card-body border-top p-9">

    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.name') }}</label>
        <!--end::Label-->

        <!--begin::Col-->
        <div class="col-lg-8">
            <!--begin::Row-->
            <div class="row">
                <!--begin::Col-->
                <div class="col-lg-12 fv-row fv-plugins-icon-container">
                    <input type="text" name="name"
                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                        placeholder="{{ __('lang.name') }}" value="{{ $agents->name ?? '' }}">
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
    <div class="row mb-6">
        <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.supervisors') }}</label>
        <div class="col-lg-8">
            <!--begin::Row-->
            <div class="row">
                    <div class="col-lg-12 fv-row fv-plugins-icon-container">
                        <select name="user_id"
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 ">
                            <option value="Choosse"> Choosse supervisors </option>
                            @foreach ($users as $user )
                                <option value="{{ $user->id }}" {{  isset( $agents ) && $user->id == $agents->user_id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                                {{-- <option value="{{ $cat->id }}"> {{ $cat->title  }} </option> --}}
                            @endforeach
                        </select>
                    </div>
            </div>
        </div>
     </div>

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
