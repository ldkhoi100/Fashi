@php

function time_elapsed_string1($datetime, $full = false)
{
$now = new DateTime;
$ago = new DateTime($datetime);
$diff = $now->diff($ago);

$diff->w = floor($diff->d / 7);
$diff->d -= $diff->w * 7;

$string = array(
'y' => 'year',
'm' => 'month',
'w' => 'week',
'd' => 'day',
'h' => 'hour',
'i' => 'minute',
's' => 'second',
);
foreach ($string as $k => &$v) {
if ($diff->$k) {
$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
} else {
unset($string[$k]);
}
}

if (!$full) $string = array_slice($string, 0, 1);
return $string ? implode(', ', $string) . ' ago' : 'just now';
}

@endphp

<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                            aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - Notifications -->
        <li class="nav-item dropdown no-arrow mx-1" id="notifications">

            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>

                <!-- Counter - Alerts -->
                @if($total_not_read == 0)
                @elseif($total_not_read < 6) <span class="badge badge-danger badge-counter">{{ $total_not_read }}</span>
                    @else
                    <span class="badge badge-danger badge-counter">5+</span>
                    @endif
            </a>

            <!-- Dropdown - Notifications -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">

                <h6 class="dropdown-header">
                    Notifications
                    <span style="float: right">
                        <a href="{{ route('mark.all.read') }}" style="color: white; font-size: 10px;">
                            Mark All as Read <i class="far fa-check-circle"></i>
                        </a>
                    </span>
                </h6>

                @foreach ($alerts_center as $alert)
                @if(!empty($alert->id_bill) && empty($alert->id_review))
                <a class="dropdown-item d-flex align-items-center" href="{{ route('bills.read', $alert->id) }}">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">{{ time_elapsed_string1($alert->created_at) }}</div>
                        <span style="font-size:13px" @if($alert->reader == 0)
                            class="font-weight-bold"
                            @endif >
                            @if($alert->bills->cancle == 1)
                            <span style="color: #ee4d2d;">The Invoice Has Been Canceled:</span> {{ $alert->bills->id }}
                            <br>
                            Total Money: ${{ number_format($alert->bills->total, 2) }} <br>
                            Customer: {{ $alert->bills->customers->name }}</span>
                        @else
                        New invoice: {{ $alert->bills->id }} <br>
                        total money: ${{ number_format($alert->bills->total, 2) }} <br>
                        Customer: {{ $alert->bills->customers->name }}</span>
                        @endif
                    </div>
                </a>
                @elseif(!empty($alert->id_review) && empty($alert->id_bill))

                <a class="dropdown-item d-flex align-items-center" href="{{ route('reviews.read', $alert->id) }}"
                    target="_blank">
                    <div class="mr-3">
                        <div class="icon-circle bg-warning">
                            <i class="fas fa-comments"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">{{ time_elapsed_string1($alert->created_at) }}</div>
                        <span style="font-size:13.5px" @if($alert->reader == 0)
                            class="font-weight-bold"
                            @endif >New reviews: {{ $alert->reivews->name }}, rating:
                            {{ $alert->reivews->rating }} <span style="color: #FAC451;">
                                <i class="fa fa-star fa-sm"></i></span>,
                            products: {{ $alert->reivews->products->name }}
                        </span>
                    </div>
                </a>

                @endif

                @endforeach

                <a class="dropdown-item text-center small text-gray-500" href="{{ route('notifications') }}">Show All
                    Alerts</a>
            </div>
        </li>

        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                @if($count_messenger_sent == 0)
                @else
                <span class="badge badge-danger badge-counter">{{ $count_messenger_sent }}</span>
                @endif
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                    Message Center
                    <span style="float: right">
                        <a href="{{ route('messenger.create') }}" style="color: white; font-size: 10px;">
                            Create message <i class="fas fa-plus"></i>
                        </a>
                    </span>
                </h6>

                @foreach ($messenger_sent as $messenger_sent)

                <a class="dropdown-item d-flex align-items-center"
                    href="{{ route('messenger.show', Crypt::encrypt($messenger_sent->id)) }}">

                    <div class="dropdown-list-image mr-3">

                        @if(!empty($messenger_sent->user1->provider))
                        <img src="{{ $messenger_sent->user1->image }}" alt="image" width="60px" class="rounded-circle">
                        @elseif(!empty($messenger_sent->user1->image))
                        <img src="img/user/{{ $messenger_sent->user1->image }}" alt="image" width="60px"
                            class="rounded-circle">
                        @else
                        <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                        @endif
                        <div class="status-indicator bg-success"></div>

                    </div>

                    <div>
                        <div class="text-truncate" @if($messenger_sent->reader == 0)
                            style='font-weight: bold';
                            @endif
                            >{{ $messenger_sent->title }}</div>
                        <div class="small text-gray-500">{{ $messenger_sent->user1->username }} ·
                            {{ time_elapsed_string1($messenger_sent->created_at) }}</div>
                    </div>
                </a>

                @endforeach

                <a class="dropdown-item text-center small text-gray-500" href="{{ route('mailbox') }}">
                    Read More Messages
                </a>

            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                @if(Auth::check())
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><b>{{ Auth::user()->username }}</b></span>
                @endif

                @if(!empty(Auth::user()->provider))
                <img src="{{ Auth::user()->image }}" alt="image" class="img-profile rounded-circle">
                @elseif(!empty(Auth::user()->image))
                <img src="img/user/{{ Auth::user()->image }}" alt="image" class="img-profile rounded-circle">
                @else
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/daily/60x60">
                @endif

            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                @if(Auth::user())
                <a class="dropdown-item" href="{{ route('details') }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile
                </a>

                @if(count(Auth::user()->roles) >= 2 && Auth::user()->roles[0]->id == 1 && Auth::user()->roles[1]->id ==
                2)
                <a class="dropdown-item" href="{{ route('users.index') }}">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Managerment users
                </a>
                @endif

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                </a>
                @else

                <a class="dropdown-item" href="{{ route('login') }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Login
                </a>

                @endif
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->