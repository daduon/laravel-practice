<header class="main-header ">
    <div class="container changeback">
        <nav class="navbar navbar-expand-lg main-nav px-0">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="http://rajeshdas.com/assets/images/logo.svg" alt="rajeshdas.com">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainMenu"
                aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar icon-bar-1"></span>
                <span class="icon-bar icon-bar-2"></span>
                <span class="icon-bar icon-bar-3"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainMenu">
                <ul class="navbar-nav ml-auto text-uppercase f1">
                    <li>
                        <a href="{{ url('/') }}" class="active active-first">home</a>
                    </li>
                    <li>
                        <a href="#about">about</a>
                    </li>
                    <li>
                        <a href="#service">services</a>
                    </li>
                    <li>
                        <a href="#project">projects</a>
                    </li>
                    <li>
                        <a href="#team">team</a>
                    </li>
                    <li>
                        <a href="#testimony">testimonils</a>
                    </li>
                    <li>
                        <a href="{{ route('website.logout') }}">logout</a>
                    </li>
                </ul>
                <ul class="navbar-nav text-uppercase" style="width: 600px; margin-left: 400px;">
                    <li>
                        <a href="{{ route('cart') }}" class="btn btn-primary"> 
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> 
                            Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- /.container -->
</header>

@section('scripts')
<script type="text/javascript">
    $(function() {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $(".main-header").addClass("bg-dark");
                $(".main-header").addClass("new-top");
            } 
            if ($(this).scrollTop() < 100) {
                $(".main-header").removeClass("bg-dark");
                $(".main-header").removeClass("new-top");
            } 
        });
    });
</script>
@endsection