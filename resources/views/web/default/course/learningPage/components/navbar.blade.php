@php
$percent = $course->getProgress(true);
@endphp

<div style="max-height: 63px;" class="learning-page-navbar d-flex align-items-center justify-content-between px-15 px-lg-35 py-10">
    <div class="d-flex align-items-lg-center flex-column flex-lg-row flex-grow-2">

        <div class="learning-page-logo-card d-flex align-items-center justify-content-between justify-content-lg-start">
            <a class="navbar-brand mr-0" href="/">
                @if (!empty($generalSettings['logo']))
                    <img src="{{ $generalSettings['logo'] }}" class="img-cover" style="width: 11%!important"
                        alt="site logo">
                @endif
            </a>

            
            {{-- <div class="d-flex align-items-center d-lg-none ml-20">
                <a href="{{ $course->getUrl() }}"
                    class="btn learning-page-navbar-btn btn-sm border-gray200 d-none d-md-block">{{ trans('update.course_page') }}</a>

                <a href="/panel/webinars/purchases"
                    class="btn learning-page-navbar-btn btn-sm border-gray200 ml-0 ml-md-10">{{ trans('update.my_courses') }}</a>
            </div> --}}
        </div>

        {{-- <div class="learning-page-progress-card"> --}}
            
            
            {{-- <div class="d-flex align-items-center">
                <div
                    class="progress course-progress d-flex align-items-center flex-grow-1 bg-white border border-gray200 rounded-sm shadow-none mt-5">
                    <span class="progress-bar rounded-sm bg-warning" style="width: {{ $percent }}%"></span>
                </div>

                <span class="ml-10 font-weight-500 font-14 text-gray">{{ $percent }}%
                    {{ trans('update.learnt') }}</span>
            </div> --}}
        {{-- </div> --}}
    </div>
    {{-- <div>
        <a href="{{ $course->getUrl() }}" class="learning-page-navbar-title">
            <span class="font-weight-bold">{{ $course->title }}</span>
        </a>
    </div> --}}

    <div class="d-flex align-items-center">
        
        {{-- <div class="d-none align-items-center d-lg-flex">
            <a href="{{ $course->getUrl() }}"
                class="btn learning-page-navbar-btn btn-sm border-gray200">{{ trans('update.course_page') }}</a>

            <a href="/panel/webinars/purchases"
                class="btn learning-page-navbar-btn btn-sm border-gray200 ml-10">{{ trans('update.my_courses') }}</a>
        </div> --}}

        <button id="collapseBtn" type="button" class="btn-transparent ml-20">
            <i data-feather="menu" width="20" height="20" class=""></i>
        </button>
    </div>
</div>
