<!DOCTYPE html>
<html lang="en">
<head>
    @include("admin.layouts.shared.head")
</head>
<body class="sb-nav-fixed">
@include("admin.layouts.shared.topnav")
<div id="layoutSidenav">
    @include("admin.layouts.shared.sidenav")

    <div id="layoutSidenav_content">
        <main>
            @yield("page-content")
        </main>
        @include("admin.layouts.shared.footer")
    </div>
</div>
@include("admin.layouts.shared.scripts")
</body>
</html>
