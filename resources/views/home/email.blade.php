<font face="Arial">
    <div>
        <h3><font color="#FF9600" >Thông tin khách hàng</font></h3>
        <p>
            <strong class="info">Khách hàng: </strong>
            {{$info['name']}}
        </p>
        <p>
            <strong class="info">Email: </strong>
            {{$info['email']}}
        </p>
        <p>
            <strong class="info">Điện thoại: </strong>
            {{$info['phone']}}
        </p>
        <p>
            <strong class="info">Địa chỉ: </strong>
            {{$info['add']}}
        </p>
    </div>
    <div>
        <h3><font color="#FF9600" >Hóa đơn mua hàng</font></h3>
        <table border="1" cellspacing="0">
            <tr class="bold">
                <td><strong>Tên sản phẩm</strong></td>
                <td><strong>Giá</strong></td>
                <td><strong>Số lượng</strong></td>
                <td><strong>Thành tiền</strong></td>
            </tr>
            @foreach ($cart as $data )
            <tr>
                <td>{{$data->name}}</td>
                <td>{{$data->price}}</td>
                <td>{{$data->qty}}</td>
                <td>{{ number_format($data->total, 0, ',', '.') }} VNĐ</td>
            </tr>
            @endforeach
            <tr>
                <td>Tổng tiền:</td>
                <td colspan="3" align="right">{{ $total }} VNĐ</td>
            </tr>
        </table>
    </div>
    <div>
        <br>
        <p align="justify">
            <b><font color="#FF9600" >Quý khách đã đặt hàng thành công!</font></b><br />
            • Sản phẩm của Quý khách sẽ được chuyển đến Địa chỉ có trong phần Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.<br />
            • Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng.<br />
            <b><br />Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng Tôi!</b>
        </p>
    </div>
</div>
</font>
