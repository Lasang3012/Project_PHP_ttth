@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê ý kiến khách hàng
            </div>

            <div id="notify_comment"></div>

            <form>
                @csrf
                <div class="table-responsive">

                    <table class="table table-striped b-t b-light">
                        <thead>
                            <tr>

                                @if (session()->has('message'))
                                    <span style="color: green;">{!! session()->get('message') !!} </span>
                                @elseif(session()->has('error'))
                                    <span style="color: red;">{!! session()->get('error') !!} </span>
                                @endif
                                <th style="width:20px;">
                                    <label class="i-checks m-b-none">
                                        <input type="checkbox"><i></i>
                                    </label>
                                </th>
                                <th>Tên người gửi</th>
                                <th>Ý kiến</th>
                                <th>Ngày gửi</th>
                                <th>Email khách hàng</th>
                                <th>Quản lý</th>

                                <th style="width:30px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comment as $key => $comm)
                                {{-- @if ($comm->comment_parrent == 0) --}}
                                    <tr>
                                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                                        </td>

                                        <td>{{ $comm->comment_name }}</td>

                                        <td>{{ $comm->comment }}
                                            <style type="text/css">
                                                ul.list_rep li {
                                                  list-style-type: decimal;
                                                  color: blue;
                                                  margin: 5px 40px;
                                              }
                                              </style>
                                            {{-- Hiển thị bình luận bên admin trả lời  --}}
                                            <ul  class="list_rep">
                                                {{-- @foreach ($comment_rep as $key => $comment_reply)
                                                    @if ($comment_reply->comment_parrent == $comm->comment_id)
                                                        <li>Trả lời :{{ $comment_reply->comment }}</li>
                                                    @endif
                                                @endforeach --}}

                                                @foreach ($comment as $key => $comment_reply)
                                                @if ($comment_reply->comment_parent_comment == $comm->comment_id)
                                                    <li>Trả lời :{{ $comment_reply->comment }}</li>
                                                @endif
                                            @endforeach

                                            </ul>

                                            {{-- Trả lời bình luận --}}
                                            {{-- @if ($comm->comment_status == 1) --}}
                                                <br>

                                                <textarea
                                                    class="reply_comment_{{$comm->comment_id}} form-control"
                                                    rows="3">
                                                </textarea>
                                                <br>
                                                {{--  --}}

                                                <button
                                                    class="btn btn-default btn-xs btn-reply-comment"
                                                    data-comment_id="{{ $comm->comment_id }}"
                                                    >
                                                    {{--  --}}
                                                    Trả lời ý kiến

                                                </button>



                                            {{-- @endif --}}
                                        </td>
                                        <td>{{ $comm->comment_date }}</td>
                                        <td>
                                            {{ $comm->comment_email }}
                                        </td>
                                        <td>

                                            <a onclick="return confirm('Bạn có chắc muốn xóa không ?')"
                                                href="{{ URL::to('/delete-comment/' . $comm->comment_id) }}"
                                                class="active btn btn-danger" ui-toggle-class="">
                                                Xóa ý kiến</a>
                                        </td>

                                    </tr>
                                {{-- @endif --}}
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </form>

        </div>
    </div>
@endsection
