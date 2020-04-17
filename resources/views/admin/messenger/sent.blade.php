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
            <div style="font-weight: bold; font-size: 25px; color: black;">Message sent
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
                                    <i class="fas fa-comments text-black-50"></i>
                                </label>
                            </td>

                            <td width='15%'>
                                <a href="{{ route('messenger.show', Crypt::encrypt($box->id)) }}"
                                    style="color: #858796; text-decoration: none">
                                    <b style="color:#483D8B">
                                        To: {{ $box->user2->username }}
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
                                <a href="{{ route('delete.message.mailbox', Crypt::encrypt($box->id)) }}"
                                    title="Remove this notification" style="color: #B22222;"
                                    onclick="return confirm('Do you want delete this message?')">
                                    <i class="fas fa-minus-circle"></i>
                                </a>
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