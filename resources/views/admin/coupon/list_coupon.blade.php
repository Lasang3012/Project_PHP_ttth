@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê mã giảm giá
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-5 m-b-xs">
                    {{-- <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button> --}}



                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-sm btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if ($message) {
                echo '<span class="text-alert">' . $message . '</span>';
                Session::put('message', null);
                }
                ?>
                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>


                            <th>Tên mã giảm giá</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                            <th>Mã giảm giá</th>
                            <th>Số lượng giảm giá</th>
                            <th>Điều kiện giảm giá</th>
                            <th>Số giảm</th>
                            <th>Tình trạng</th>
                            <th>Hết hạn</th>
                            <td>Quản lý</td>
                            <th>Gửi mã</th>



                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coupon as $key => $cou)
                            <tr>

                                <td>{{ $cou->coupon_name }}</td>
                                <td>{{ $cou->coupon_date_start }}</td>
                                <td>{{ $cou->coupon_date_end }}</td>

                                <td>{{ $cou->coupon_code }}</td>
                                <td>{{ $cou->coupon_time }}</td>

                                <td>
                                    <span class="text-ellipsis">
                                        <?php if ($cou->coupon_condition == 1) { ?>
                                        Giảm theo %
                                        <?php } else { ?>
                                        Giảm theo tiền
                                        <?php } ?>
                                    </span>
                                </td>

                                <td>
                                    <span class="text-ellipsis">
                                        <?php if ($cou->coupon_condition == 1) { ?>
                                        Giảm {{ $cou->coupon_number }} %
                                        <?php } else { ?>
                                        Giảm {{ $cou->coupon_number }} k
                                        <?php } ?>
                                    </span>
                                </td>

                                <td>
                                    <span class="text-ellipsis">
                                        <?php if ($cou->coupon_status == 1) { ?>
                                        <span style="color:green">On</span>
                                        <?php } else { ?>
                                        <span style="color:red">Off</span>
                                        <?php } ?>
                                    </span>
                                </td>

                                <td>
                                    @php
                                        $today_coupon_indb = Carbon\Carbon::createFromFormat('d/m/Y', $cou->coupon_date_end)->format('d');

                                        $month_coupon_indb = Carbon\Carbon::createFromFormat('d/m/Y', $cou->coupon_date_end)->format('m');

                                        $year_coupon_indb = Carbon\Carbon::createFromFormat('d/m/Y', $cou->coupon_date_end)->format('Y');
                                        // $month_coupon_indb = date('m', strtotime($cou->coupon_date_end));
                                        // $year_coupon_indb = date('Y', strtotime($cou->coupon_date_end));
                                    @endphp
                                    {{-- <span style="color:green"> Ngày : {{ $today_coupon_indb - $today }}</span>
                                    <br>
                                    <span style="color:green"> Tháng : {{ $month_coupon_indb - $month }}</span>
                                    <br>
                                    <span style="color:green"> Năm : {{ $year_coupon_indb - $year }}</span>
                                    <br> --}}

                                    {{-- <span style="color:green">{{ $cou->coupon_date_end }}</span> --}}
                                    {{-- <span style="color:green">{{$month_coupon_indb}}</span>
                                    <span style="color:green">{{$year_coupon_indb}}</span> --}}

                                    <?php if ($year_coupon_indb - $year > 0) {
                                    echo '<span style="color:rgb(66, 122, 66)">Còn hạn</span>';
                                    } elseif ($year_coupon_indb - $year == 0) {
                                    if ($month_coupon_indb - $month > 0) {
                                    echo '<span style="color:green">Còn hạn</span>';
                                    } elseif ($month_coupon_indb - $month == 0) {
                                    if ($today_coupon_indb - $today > 0) {
                                    echo '<span style="color:green">Còn hạn</span>';
                                    } else {
                                    echo '<span style="color:red">Đã hết hạn</span>';
                                    }
                                    } else {
                                    echo '<span style="color:red">Đã hết hạn</span>';
                                    }
                                    } else {
                                    echo '<span style="color:red">Đã hết hạn</span>';
                                    } ?>

                                    {{-- @if ($year_coupon_indb - $year > 0)
                                        <span style="color:green">Còn hạn</span>

                                    @elseif ($year_coupon_indb - $year = 0)

                                        @if ($month_coupon_indb - $month > 0)
                                            <span style="color:green">Còn hạn</span>

                                        @elseif ($month_coupon_indb - $month = 0)
                                            @if ($today_coupon_indb - $today > 0)
                                                <span style="color:green">Còn hạn</span>
                                            @else
                                                <span style="color:red">Đã hết hạn</span>
                                            @endif
                                        @endif
                                    @else
                                        <span style="color:red">Đã hết hạn</span>
                                    @endif
                                @else
                                    <span style="color:red">Đã hết hạn</span>
                        @endif -}}
                        {{-- @else
                        <span style="color:red">Đã hết hạn</span>
                        @endif


                        {{-- @if ($cou->coupon_date_end >= $today)
                                        <span style="color:green">Còn hạn</span>
                                    @else
                                        <span style="color:red">Đã hết hạn</span>
                                    @endif --}}


                                </td>
                                <td>

                                    <a onclick="return confirm('Bạn có chắc là muốn xóa mã này ko?')"
                                        href="{{ URL::to('/delete-coupon/' . $cou->coupon_id) }}"
                                        class="active styling-edit" ui-toggle-class="">
                                        <i class="fa fa-times text-danger text"></i>
                                    </a>
                                </td>
                                <td>

                                    <p>
                                        <a href="{{ url('/send-coupon-vip', [
                                            'coupon_time' => $cou->coupon_time,
                                            'coupon_condition' => $cou->coupon_condition,
                                            'coupon_number' => $cou->coupon_number,
                                            'coupon_code' => $cou->coupon_code,
                                        ]) }}"
                                            class="btn btn-primary" style="margin:5px 0;">Gửi khách vip</a>
                                    </p>
                                    <p>
                                        <a href="{{ url('/send-coupon', [
                                            'coupon_time' => $cou->coupon_time,
                                            'coupon_condition' => $cou->coupon_condition,
                                            'coupon_number' => $cou->coupon_number,
                                            'coupon_code' => $cou->coupon_code,
                                        ]) }}"
                                            class="btn btn-default">Gửi khách thường</a>
                                    </p>


                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">

                    <div class="col-sm-5 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                    </div>
                    <div class="col-sm-7 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            {!! $coupon->links() !!}
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
