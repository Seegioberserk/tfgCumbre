<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
               {{-- aquí alinea el boton ala derecha --}}
                
            <div class="header-wrap d-flex justify-content-end">
                <div class="header-button">
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="{{ asset('CoolAdmin-master/images/icon/avatar-01.jpg') }}" alt="John Doe" />
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="2776F5">jose</a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="account-dropdown__footer">
                                    <a href="{{ route('login') }}">
                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- /header-wrap -->
        </div>
    </div>
</header>
