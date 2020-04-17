@extends('admin.layouts')

@section('title', 'Your Notifications')

@section('content')
@include('php.time-ago')

<style>
    .table td,
    .table th {
        padding-bottom: 0px;
        padding-left: 7px;
    }
</style>

<!-- Main Content -->
<div id="content">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- 404 Error Text -->
        <div class="container">
            <div style="font-weight: bold; font-size: 25px; color: black;">Your mailbox
                <span style="float:right; font-size:18px">
                    <a href="{{ route('message.sent') }}">Message sent</a>
                </span>
            </div>
            <hr>
            @include('partials.message')
            <div>
                <table class="table table-hover">
                    <tbody>
                        @foreach ($inbox as $box)

                        <tr @if($box->reader == 0)
                            class="table-info"
                            @endif>

                            <td align="right" width='6%'>
                                <label class="icon-circle bg-warning">
                                    @if(!empty($box->user1->image))
                                    <img src="img/user/{{ $box->user1->image }}" alt="image"
                                        class="img-profile rounded-circle" style="width: 2.5rem; height: 2.5rem">
                                    @else
                                    <i class="fas fa-comments text-black-50"></i>
                                    @endif
                                </label>
                            </td>

                            <td width='15%'>
                                <a href="{{ route('messenger.show', Crypt::encrypt($box->id)) }}"
                                    style="color: #858796; text-decoration: none">
                                    <b style="color:#483D8B">
                                        {{ $box->user1->username }}
                                    </b>
                                </a>
                            </td>

                            <td align="left">
                                <a href="{{ route('messenger.show', Crypt::encrypt($box->id)) }}"
                                    style="color: #858796; text-decoration: none">
                                    @if($box->reader == 1)
                                    <span>
                                        {{ substr($box->title, 0, 101) }} . . .
                                    </span>
                                    @else
                                    <b style="color:black;">
                                        {{ substr($box->title, 0, 101) }} . . .
                                    </b>
                                    @endif
                                </a>
                            </td>

                            <td align="right">
                                {{ time_elapsed_string($box->created_at) }}
                            </td>

                            <td align="right">
                                <a href="{{ route('remove.message', Crypt::encrypt($box->id)) }}"
                                    title="Remove this notification" style="color: #B22222;"
                                    onclick="return confirm('Do you want delete this message?')">
                                    <i class="fas fa-minus-circle"></i>
                                </a>
                                <br>

                                @if($box->reader == 0)
                                <a href="{{ route('mark.read.mailbox', Crypt::encrypt($box->id)) }}"
                                    title="Mark as read" style="color: green;">
                                    <i class="fa fa-clipboard-check"></i>
                                </a>
                                @else
                                <a href="{{ route('mark.unread.mailbox', Crypt::encrypt($box->id)) }}"
                                    title="Mark unread" style="color: black;">
                                    <i class="fas fa-bookmark"></i>
                                </a>
                                @endif

                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>

                {{ $inbox->links() }}

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@endsection