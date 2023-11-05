    <!--begin::Menu wrapper-->
    <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
        <!--begin::Scroll wrapper-->
        <div id="kt_app_sidebar_menu_scroll" class="scroll-y my-5 mx-3" data-kt-scroll="true" data-kt-scroll-activate="true"
            data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="#kt_app_sidebar_menu"
                data-kt-menu="true" data-kt-menu-expand="false">
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="fa-solid fa-house fa-2xl"></i>
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                        </span>
                        <span class="menu-title">{{ __('lang.dashboard') }}</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        @if (auth()->user()->can('View Admins'))
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active" href="{{ route('admins.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('lang.admin') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif
                         {{-- @if (auth()->user()->can('View User'))--}}
                         <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link active" href="{{ route('users.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{ __('lang.supervisors') }}</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    {{--@endif--}}
                        @if (auth()->user()->can('View Roles'))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link active" href="{{ route('role.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('lang.role') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                        @if (auth()->user()->hasRole('superadmin'))
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link active" href="{{ route('permessions.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('lang.permession') }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                        @endif
                        @if (auth()->user()->hasRole('superadmin'))
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link active" href="{{ route('agent.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('lang.Agent') }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                        @endif
                        @if (auth()->user()->hasRole('superadmin'))
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link active" href="{{ route('doctor.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('lang.Doctors') }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                        @endif
                        @if (auth()->user()->hasRole('superadmin'))
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link active" href="{{ route('permessions.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('lang.question') }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                        @endif
                        @if (auth()->user()->hasRole('superadmin'))
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link active" href="{{ route('permessions.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('lang.answer') }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                        @endif
                        @if (auth()->user()->hasRole('superadmin'))
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link active" href="{{ route('permessions.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('lang.visits') }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                        @endif
                        @if (auth()->user()->hasRole('superadmin'))
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link active" href="{{ route('permessions.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('lang.reports') }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                        @endif
                        @if (auth()->user()->hasRole('superadmin'))
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link active" href="{{ route('permessions.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('lang.message') }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                        @endif

                        <!--end:Menu item-->


                                <!--end:Menu item-->
                                <!--end:Menu item-->


                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Scroll wrapper-->
    </div>
    <!--end::Menu wrapper-->
