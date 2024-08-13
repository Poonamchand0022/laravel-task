<!DOCTYPE html>
<html lang="en">

@include('includes.head')

<body>
    @include('includes.header')
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            @include('includes.nav')
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    @yield('content')
                </div>
            </div>
            @include('includes.leftside')
        </div>
    </div>

    @include('includes.footer')
</body>

</html>