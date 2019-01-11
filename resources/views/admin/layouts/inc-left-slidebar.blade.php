<div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
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
                </div>    <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                            <li class="app-sidebar__heading">Menu</li>
                            <li>
                                <a href="{{url('admin/dashboard')}}" {{ (Request::is('admin/dashboard*') ? 'class=mm-active' : '') }} {{ (Request::is('search_mem_dash') ? 'class=mm-active' : '') }} >
                                    <i class="metismenu-icon pe-7s-airplay">
                                    </i>Dashboard / สรุป
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-users"></i>
                                    สมาชิก
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>

                                <ul class="mm-show">
                                  <li>
                                      <a href="{{url('admin/member')}}" {{ (Request::is('search_mem') ? 'class=mm-active' : '') }} {{ (Request::is('admin/member') ? 'class=mm-active' : '') }} {{ (Request::is('admin/preview/*') ? 'class=mm-active' : '') }} {{ (Request::is('admin/member/1/edit*') ? 'class=mm-active' : '') }}>
                                          <i class="metismenu-icon">
                                          </i>รายชื่อสมาชิก
                                      </a>
                                  </li>
                                    <li>
                                        <a href="{{url('admin/member/create')}}" {{ (Request::is('admin/member/create') ? 'class=mm-active' : '') }}>
                                            <i class="metismenu-icon">
                                            </i>สมัครสมาชิก
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                            <i class="metismenu-icon">
                                            </i>หน้าเช็คอิน
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="metismenu-icon">
                                            </i>ประวัติสมาชิก
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-ball"></i>
                                    Trainers
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>

                                <ul class="mm-show">
                                    <li>
                                        <a href="{{url('admin/trainer')}}" {{ (Request::is('admin/trainer*') ? 'class=mm-active' : '') }}>
                                            <i class="metismenu-icon">
                                            </i>เพิ่ม Trainers
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                            <i class="metismenu-icon">
                                            </i>ประวัติ Trainers
                                        </a>
                                    </li>


                                </ul>
                            </li>
                            <li>
                                <a href="{{url('admin/table_course')}}" {{ (Request::is('admin/table_course*') ? 'class=mm-active' : '') }}>
                                    <i class="metismenu-icon pe-7s-news-paper">
                                    </i>ตาราง Class
                                </a>
                            </li>
                            <li >
                                <a href="{{url('admin/category')}}" {{ (Request::is('admin/category*') ? 'class=mm-active' : '') }} >
                                    <i class="metismenu-icon pe-7s-light">
                                    </i>ประเภท class
                                </a>
                            </li>
                            <li >
                                <a href="{{url('admin/course')}}" {{ (Request::is('admin/course*') ? 'class=mm-active' : '') }} {{ (Request::is('edit_c_t*') ? 'class=mm-active' : '') }}  >
                                    <i class="metismenu-icon pe-7s-plugin">
                                    </i>Class เรียน
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
