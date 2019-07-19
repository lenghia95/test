<!-- Modal Header -->
<div class="modal-header">
    <h4 class="modal-title">Xem thông tin({{ $user->email }})</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>

<!-- Modal body -->
    <div class="modal-body">
        <div class="form-group">
            <label for="username">Tên đăng nhập:</label>
            <span class="form-control"> {{ $user->username }} </span>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <span class="form-control"> {{ $user->email }} </span>
        </div>
        <div class="form-group">
            <label for="status">Trạng thái:</label>
            <span class="btn btn-{{ ($user->status == 1) ? 'success' : 'warning' }} btn-xs"> {{ ($user->status == 1) ? 'Kích hoạt' : 'Ẩn' }} </span>
        </div>
        <div class="form-group">
            <label for="fullname">Tên đầy đủ:</label>
            <span class="form-control"> {{ ($user->fullname) ? $user->fullname : 'Chưa cập nhật'}} </span>
        </div>
        <div class="form-group">
            <label for="phone">Số điện thoại:</label>
            <span class="form-control"> {{ ($user->phone) ? $user->phone : 'Chưa cập nhật'}} </span>
        </div>
        <div class="form-group">
            <label for="address">Địa chỉ:</label>
            <span class="form-control"> {{ ($user->address) ? $user->address : 'Chưa cập nhật' }} </span>
        </div>
        <div class="form-group">
            <label for="address">Ngày tạo:</label>
            <span class="form-control"> {{ $user->created_at }} </span>
        </div>
    </div>

    <!-- Modal footer -->
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
    </div>
</form>


    