@extends('admin.layouts')

@section('title', 'Your Notifications')

@section('content')
@include('php.time-ago')

<style>
    .table td,
    .table th {
        padding-bottom: 0px;
    }
</style>

<!-- Main Content -->
<div id="content">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- 404 Error Text -->
        <div class="container">
            <div>Your Notifications</div>
            <hr>
            <div>
                <table class="table table-hover">
                    <tbody>
                        @foreach ($your_notifications as $alert)

                        @if(!empty($alert->id_bill) && empty($alert->id_review))

                        <tr @if($alert->reader == 0)
                            class="table-info"
                            @endif>
                            <td align="right" width='6%'>
                                <label class="icon-circle bg-primary">
                                    <i class="fas fa-file-alt text-white"></i>
                                </label>
                            </td>

                            <td align="left">
                                <a href="{{ route('bills.read', $alert->id) }}"
                                    style="color: #858796; text-decoration: none">
                                    <b>
                                        New invoice: {{ $alert->bills->id }},
                                        total money:
                                        <span
                                            style="color: #8B0000; ">${{ number_format($alert->bills->total, 2) }}</span>,
                                        customer: {{ $alert->bills->customers->name }}
                                    </b>
                                </a>
                            </td>

                            <td>
                                {{ time_elapsed_string($alert->created_at) }}
                            </td>

                            <td align="right">
                                <a href="{{ route('delete.notifications', $alert->id) }}"
                                    title="Remove this notification" style="color: #B22222;"
                                    onclick="return confirm('Do you want delete this notifications?')">
                                    <i class="fas fa-minus-circle"></i>
                                </a>
                                <br>

                                @if($alert->reader == 0)
                                <a href="{{ route('mark.read', $alert->id) }}" title="Mark as read"
                                    style="color: green;">
                                    <i class="fa fa-clipboard-check"></i>
                                </a>
                                @else
                                <a href="{{ route('mark.unread', $alert->id) }}" title="Mark unread"
                                    style="color: black;">
                                    <i class="fas fa-bookmark"></i>
                                </a>
                                @endif

                            </td>
                        </tr>

                        @elseif(!empty($alert->id_review) && empty($alert->id_bill))

                        <tr @if($alert->reader == 0)
                            class="table-info"
                            @endif>

                            <td align="right">
                                <label class="icon-circle bg-warning">
                                    <i class="fas fa-comments text-black-50"></i>
                                </label>
                            </td>

                            <td align="left">
                                <a href="{{ route('reviews.read', $alert->id) }}"
                                    style="color: #858796; text-decoration: none" target="_blank">
                                    <b>
                                        New reviews: {{ $alert->reivews->name }}, rating:
                                        {{ $alert->reivews->rating }} <span style="color: #FAC451;">
                                            <i class="fa fa-star fa-sm"></i></span>,
                                        products: {{ $alert->reivews->products->name }}
                                    </b>
                                </a>
                            </td>

                            <td>
                                {{ time_elapsed_string($alert->created_at) }}
                            </td>

                            <td align="right">
                                <a href="{{ route('delete.notifications', $alert->id) }}"
                                    title="Remove this notification" style="color: #B22222;"
                                    onclick="return confirm('Do you want delete this notifications?')">
                                    <i class="fas fa-minus-circle"></i>
                                </a>
                                <br>

                                @if($alert->reader == 0)
                                <a href="{{ route('mark.read', $alert->id) }}" title="Mark as read"
                                    style="color: green;">
                                    <i class="fa fa-clipboard-check"></i>
                                </a>
                                @else
                                <a href="{{ route('mark.unread', $alert->id) }}" title="Mark unread"
                                    style="color: black;">
                                    <i class="fas fa-bookmark"></i>
                                </a>
                                @endif

                            </td>
                        </tr>

                        @endif
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@endsection