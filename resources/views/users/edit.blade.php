<!-- Modal Header -->
<div class="modal-header">
    <h4 class="modal-title">Sửa người dùng({{ $user->email }})</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>

<!-- Modal body -->
<form  action="{{ route('users.update',[$user->id]) }}" method="post" class="needs-validation" id="valiForm" novalidate>
    @csrf
    @method('PUT')
    <input type="hidden" name="user_id" value="{{ $user->id }}">
    <input type="hidden" name="status" value="{{ $user->status }}">
    <div class="modal-body">
        
        <div class="form-group">
            <label for="fullname">Tên đầy đủ:</label>
            <label id="fullname-error" class="error" for="fullname"></label>
            <input type="fullname" class="form-control" value="{{ $user->fullname }}" id="fullname" placeholder="Nhập tên đầy đủ" name="fullname" />
        </div>
        <div class="form-group">
            <label for="phone">Số điện thoại:</label>
            <label id="phone-error" class="error" for="phone"></label>
            <input type="number" class="form-control" id="phone" value="{{ $user->phone }}" placeholder="Nhập số điện thoại" name="phone"  />
        </div>
        <div class="form-group">
            <label for="address">Địa chỉ:</label>
            <label id="address-error" class="error" for="address"></label>
            <input type="text" class="form-control" value="{{ $user->address }}" id="address" placeholder="Nhập địa chỉ" name="address"  />
        </div>
        <div class="form-group">
            <label for="status">Trạng thái:</label>
            <input type="checkbox" class="grid-switch" {{ ($user->status == 1) ? 'checked' : '' }} data-toggle="toggle" data-size="xs">
        </div>
    </div>

    <!-- Modal footer -->
    <div class="modal-footer">
        <input type="submit" value="Cập nhật" class="btn btn-primary" />
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
    </div>
</form>
<script>
    $(function(){ $('.grid-switch').bootstrapToggle() });
</script>


