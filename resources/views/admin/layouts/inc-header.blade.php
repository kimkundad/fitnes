
<style>
.app-header__logo .logo-src {
    height: 69px;
    width: 162px;
    background: url({{url('assets/images/logo-inverse.png?v3')}});
}
</style>

<div class="app-header header-shadow" >
        <div class="app-header__logo" style="background: rgba(250,251,252,0.1); border-right:none">
            <div class="logo-src"></div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
            <span>
                <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                    <span class="btn-icon-wrapper">
                        <i class="fa fa-ellipsis-v fa-w-6"></i>
                    </span>
                </button>
            </span>
        </div>    <div class="app-header__content">
            <div class="app-header-left">

                <ul class="header-megamenu nav">





                </ul>        </div>
            <div class="app-header-right">
                <div class="header-dots">










                </div>

                <div class="header-btn-lg pr-0">
                    <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="btn-group">

                                    <a href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                        <img width="42" class="rounded-circle" src="{{url('./assets/images/avatar/'.Auth::user()->avatar)}}" alt="">
                                        <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                    </a>


                                    <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
                                        <div class="dropdown-menu-header">
                                            <div class="dropdown-menu-header-inner bg-info">
                                                <div class="menu-header-image opacity-2" style="background-image: url('{{url('assets/images/dropdown-header/city3.jpg')}}');"></div>
                                                <div class="menu-header-content text-left">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                                <img width="42" class="rounded-circle"
                                                                     src="{{url('./assets/images/avatar/'.Auth::user()->avatar)}}"
                                                                     alt="">
                                                            </div>
                                                            <div class="widget-content-left">
                                                                <div class="widget-heading">{{Auth::user()->name}}
                                                                </div>
                                                                <div class="widget-subheading opacity-8">  ผู้ดูแลระบบ
                                                                </div>
                                                            </div>
                                                            <div class="widget-content-right mr-2">
                                                                <a href="{{url('logout')}}" class="btn-pill btn-shadow btn-shine btn btn-focus">Logout
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>




                                </div>
                            </div>
                            <div class="widget-content-left  ml-3 header-user-info">
                                <div class="widget-heading">
                                    {{Auth::user()->name}}
                                </div>
                                <div class="widget-subheading">
                                    ผู้ดูแลระบบ
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                        </div>
        </div>
    </div>
