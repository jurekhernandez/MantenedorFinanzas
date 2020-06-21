<!DOCTYPE html>
<html class="no-js" lang="zxx">
@include("/base.header")

<body>
    @include('sweetalert::alert')
    <div class="container-scroller">
        <nav class="rt_nav_header horizontal-layout col-lg-12 col-12 p-0">
            @include("./base.top")
            @include("./base.menu")
        </nav>


        <div class="main-content">
            <div class="main-content-inner">
                @yield('content')

            </div>
        </div>

        @include("/base.footer")
    </div>
    @include("/base.js")
    @yield('js')
</body>

</html>