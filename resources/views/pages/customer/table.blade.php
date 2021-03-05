<table>
    <thead>
    <tr>
        <th>STT</th>
        <th>Mã Khách Hàng</th>
        <th>Tên Khách Hàng</th>
        <th>Tên Liên Hệ</th>
        <th>Mã Số Thuế</th>
        <th>Số Điện Thoại</th>
        <th>Email</th>
        <th>Loại khách hàng</th>
        <th>Khả năng thanh toán</th>
        <th>Khối lượng</th>
        <th>Trạng Thái</th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
            <td>{{$customer->customer_id}}</td>
            <td>{{$customer->name_customer}}</td>
            <td>{{$customer->contact_name}}</td>
            <td>{{$customer->mst}}</td>
            <td>{{$customer->phone_customer}}</td>
            <td>{{$customer->email_customer}}</td>
            <td>{{$customer->name_type}}</td>
            <td>{{$customer->name_solvency}}</td>
            <td>{{$customer->mass}}</td>
            <td>{{$customer->status}}</td>
        </tr>
    </tbody>
</table>
