@extends('admin.master')

@section('content')

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Dashboard</h4>
    </div>
    <!-- <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <a class="btn btn-success d-none d-lg-block m-l-15" href="https://wrappixel.com/templates/elegant-admin/"> Upgrade To Pro</a>
        </div>
    </div> -->
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-midnight-bloom">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Total Orders</div>
                    <div class="widget-subheading">Last year expenses</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>1896</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-arielle-smile">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Clients</div>
                    <div class="widget-subheading">Total Clients Profit</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>$ 568</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-grow-early">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Followers</div>
                    <div class="widget-subheading">People Interested</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>46%</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-premium-dark">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Products Sold</div>
                    <div class="widget-subheading">Revenue streams</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-warning"><span>$14M</span></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Yearly Sales -->
<!-- ============================================================== -->
<!-- <div class="row">
    <div class="col-lg-8">
        <div class="card oh">
            <div class="card-body">
                <div class="d-flex m-b-30 align-items-center no-block">
                    <h5 class="card-title ">Yearly Sales</h5>
                    <div class="ml-auto">
                        <ul class="list-inline font-12">
                            <li><i class="fa fa-circle text-info"></i> Iphone</li>
                            <li><i class="fa fa-circle text-primary"></i> Ipad</li>
                        </ul>
                    </div>
                </div>
                <div id="morris-area-chart" style="height: 350px;"></div>
            </div>
            <div class="card-body bg-light">
                <div class="row text-center m-b-20">
                    <div class="col-lg-4 col-md-4 m-t-20">
                        <h2 class="m-b-0 font-light">6000</h2><span class="text-muted">Total sale</span>
                    </div>
                    <div class="col-lg-4 col-md-4 m-t-20">
                        <h2 class="m-b-0 font-light">4000</h2><span class="text-muted">Iphone</span>
                    </div>
                    <div class="col-lg-4 col-md-4 m-t-20">
                        <h2 class="m-b-0 font-light">2000</h2><span class="text-muted">Ipad</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Today's Schedule</h5>
                <h6 class="card-subtitle">check out your daily schedule</h6>
                <div class="steamline m-t-40">
                    <div class="sl-item">
                        <div class="sl-left bg-success"> <i class="fa fa-user"></i></div>
                        <div class="sl-right">
                            <div class="font-medium">Meeting today <span class="sl-date"> 5pm</span>
                            </div>
                            <div class="desc">you can write anything </div>
                        </div>
                    </div>
                    <div class="sl-item">
                        <div class="sl-left bg-info"><i class="fa fa-image"></i></div>
                        <div class="sl-right">
                            <div class="font-medium">Send documents to Clark</div>
                            <div class="desc">Lorem Ipsum is simply </div>
                        </div>
                    </div>
                    <div class="sl-item">
                        <div class="sl-left"> <img class="img-circle" alt="user" src="{{ asset('images/users/1.jpg') }}"> </div>
                        <div class="sl-right">
                            <div class="font-medium">John Doe <span class="sl-date"> 5pm</span></div>
                            <div class="desc">Call today with gohn doe </div>
                        </div>
                    </div>
                    <div class="sl-item">
                        <div class="sl-left"> <img class="img-circle" alt="user" src="{{ asset('images/users/2.jpg') }}"> </div>
                        <div class="sl-right">
                            <div class="font-medium">Go to the Doctor <span class="sl-date">5 minutes
                                    ago</span></div>
                            <div class="desc">Contrary to popular belief</div>
                        </div>
                    </div>
                    <div class="sl-item">
                        <div class="sl-left"> <img class="img-circle" alt="user" src="{{ asset('images/users/3.jpg') }}"> </div>
                        <div class="sl-right">
                            <div><a href="#">Tiger Sroff</a> <span class="sl-date">5 minutes ago</span>
                            </div>
                            <div class="desc">Approve meeting with tiger
                                <br><a href="javascript:void(0)" class="btn m-t-10 m-r-5 btn-rounded btn-outline-success">Apporve</a>
                                <a href="javascript:void(0)" class="btn m-t-10 btn-rounded btn-outline-danger">Refuse</a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- ============================================================== -->
<!-- News -->
<!-- ============================================================== -->
<!-- <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div>
                        <h5 class="card-title">Sales Overview</h5>
                        <h6 class="card-subtitle">Check the monthly sales </h6>
                    </div>
                    <div class="ml-auto">
                        <select class="custom-select b-0">
                            <option>January</option>
                            <option value="1">February</option>
                            <option value="2" selected="">March</option>
                            <option value="3">April</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>NAME</th>
                            <th>DATE</th>
                            <th>PRICE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="txt-oflo">Elite admin</td>
                            <td class="txt-oflo">April 18, 2017</td>
                            <td><span class="text-success">$24</span></td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td class="txt-oflo">Real Homes WP Theme</td>
                            <td class="txt-oflo">April 19, 2017</td>
                            <td><span class="text-info">$1250</span></td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td class="txt-oflo">Ample Admin</td>
                            <td class="txt-oflo">April 19, 2017</td>
                            <td><span class="text-info">$1250</span></td>
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td class="txt-oflo">Medical Pro WP Theme</td>
                            <td class="txt-oflo">April 20, 2017</td>
                            <td><span class="text-danger">-$24</span></td>
                        </tr>
                        <tr>
                            <td class="text-center">5</td>
                            <td class="txt-oflo">Hosting press html</td>
                            <td class="txt-oflo">April 21, 2017</td>
                            <td><span class="text-success">$24</span></td>
                        </tr>
                        <tr>
                            <td class="text-center">6</td>
                            <td class="txt-oflo">Digital Agency PSD</td>
                            <td class="txt-oflo">April 23, 2017</td>
                            <td><span class="text-danger">-$14</span></td>
                        </tr>
                        <tr>
                            <td class="text-center">7</td>
                            <td class="txt-oflo">Helping Hands WP Theme</td>
                            <td class="txt-oflo">April 22, 2017</td>
                            <td><span class="text-success">$64</span></td>
                        </tr>
                        <tr>
                            <td class="text-center">8</td>
                            <td class="txt-oflo">Helping Hands WP Theme</td>
                            <td class="txt-oflo">April 22, 2017</td>
                            <td><span class="text-success">$64</span></td>
                        </tr>
                        <tr>
                            <td class="text-center">9</td>
                            <td class="txt-oflo">Ample Admin</td>
                            <td class="txt-oflo">April 19, 2017</td>
                            <td><span class="text-info">$1250</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> -->
<!-- ============================================================== -->
<!-- To do chat and message -->
<!-- ============================================================== -->
<!-- <div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Feeds</h4>
            </div>
            <ul class="feeds p-b-20">
                <li>
                    <div class="bg-info"><i class="fa fa-bell-o"></i></div> You have 4 pending tasks.
                    <span class="text-muted">Just Now</span>
                </li>
                <li>
                    <div class="bg-success"><i class="ti-server"></i></div> Server #1 overloaded.<span class="text-muted">2 Hours ago</span>
                </li>
                <li>
                    <div class="bg-warning"><i class="ti-shopping-cart"></i></div> New order
                    received.<span class="text-muted">31 May</span>
                </li>
                <li>
                    <div class="bg-danger"><i class="ti-user"></i></div> New user registered.<span class="text-muted">30 May</span>
                </li>
                <li>
                    <div class="bg-dark"><i class="fa fa-bell-o"></i></div> New Version just arrived.
                    <span class="text-muted">27 May</span>
                </li>
                <li>
                    <div class="bg-info"><i class="fa fa-bell-o"></i></div> You have 4 pending tasks.
                    <span class="text-muted">Just Now</span>
                </li>
                <li>
                    <div class="bg-danger"><i class="ti-user"></i></div> New user registered.<span class="text-muted">30 May</span>
                </li>
                <li>
                    <div class="bg-dark"><i class="fa fa-bell-o"></i></div> New Version just arrived.
                    <span class="text-muted">27 May</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Messages (5 New)</h5>
                <div class="message-box">
                    <div class="message-widget message-scroll">

                        <a href="javascript:void(0)">
                            <div class="user-img"> <img src="{{ asset('images/users/1.jpg') }}" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                            <div class="mail-contnet">
                                <h5>Pavan kumar</h5> <span class="mail-desc">Lorem Ipsum is simply dummy
                                    text of the printing and type setting industry. Lorem Ipsum has
                                    been.</span> <span class="time">9:30 AM</span>
                            </div>
                        </a>

                        <a href="javascript:void(0)">
                            <div class="user-img"> <img src="{{ asset('images/users/2.jpg') }}" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                            <div class="mail-contnet">
                                <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you
                                    at</span> <span class="time">9:10 AM</span>
                            </div>
                        </a>

                        <a href="javascript:void(0)">
                            <div class="user-img"> <span class="round">A</span> <span class="profile-status away pull-right"></span> </div>
                            <div class="mail-contnet">
                                <h5>Arijit Sinh</h5> <span class="mail-desc">Simply dummy text of the
                                    printing and typesetting industry.</span> <span class="time">9:08
                                    AM</span>
                            </div>
                        </a>

                        <a href="javascript:void(0)">
                            <div class="user-img"> <img src="{{ asset('images/users/4.jpg') }}" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                            <div class="mail-contnet">
                                <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my
                                    admin!</span> <span class="time">9:02 AM</span>
                            </div>
                        </a>

                        <a href="javascript:void(0)">
                            <div class="user-img"> <img src="{{ asset('images/users/1.jpg') }}" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                            <div class="mail-contnet">
                                <h5>Pavan kumar</h5> <span class="mail-desc">Welcome to the Elite
                                    Admin</span> <span class="time">9:30 AM</span>
                            </div>
                        </a>

                        <a href="javascript:void(0)">
                            <div class="user-img"> <img src="{{ asset('images/users/2.jpg') }}" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                            <div class="mail-contnet">
                                <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you
                                    at</span> <span class="time">9:10 AM</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->


@endsection