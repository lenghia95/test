<!DOCTYPE html>
<html lang="en">
<head>
  <title>Users</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('test/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="{{ asset('test/js/jquery-3.4.1.min.js') }}"></script>
  <script src="{{ asset('test/js/popper.min.js') }}"></script>
  <script src="{{ asset('test/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('test/js/jquery.validate.min.js') }}"></script>
  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.5.0/css/bootstrap4-toggle.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.5.0/js/bootstrap4-toggle.min.js"></script>
  <style>
      .error{
          color:red;
          font-weight: normal;
      }
      .modal-content{
          border-radius:0px;
      }
      label {
        font-weight: 700;
     }
  </style>
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="text-center">
            <h1>Quản lý người dùng</h1>
            <hr>
        </div>
        <div class="row">
            <div class=""></div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <button data-toggle="modal" data-target="#addModal" type="button" class="btn btn-primary mb-4"><span class="fa fa-plus"></span> Thêm</button>
                @if(session('success'))
                    <div class="alert alert-success">
                        <i class="fa fa-check"></i> {{ session('success') }}
                    </div>
                @endif
                @if(session('failed'))
                    <div class="alert alert-danger">
                        <i class="fa fa-times"></i> {{ session('failed') }}
                    </div>
                @endif
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">STT</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Tên đầy đủ</th>
                                    <th class="text-center">Số điện thoại</th>
                                    <th class="text-center">Địa chỉ</th>
                                    <th class="text-center">Trạng thái</th>
                                    <th class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->fullname }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td class="text-center">
                                            <input type="checkbox" id="toggle-trigger" class="grid-switch" {{ ($user->status == 1) ? 'checked' : '' }} data-toggle="toggle" data-size="xs">
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" data-id="{{ $user->id }}" class="btn btn-warning btn-xs user-show" style="display:inline;padding:1px 5px 3px 7px;"><i class="fa fa-eye"></i></a>
                                            <a href="javascript:void(0)" data-id="{{ $user->id }}" class="btn btn-info btn-xs user-edit" style="display:inline;padding:1px 5px 3px 7px;"><i class="fa fa-edit"></i></a>
                                            <form method="POST" action="{{ route('users.destroy',[$user->id]) }}" accept-charset="UTF-8" style="display:inline;" >
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-xs" type="submit" style="padding: 5px 7px 5px 7px;" onclick="return confirm('Bạn chắc chắn muốn xóa người dùng này?')">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>   
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    
        <!-- The Modal add -->
        <div class="modal fade" id="addModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm người dùng</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <form  action="{{ route('users.store') }}" method="post" class="needs-validation" id="valiForm" novalidate>
                        @csrf
                        <input type="hidden" name="status" value="1">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="username">Tên đăng nhập(*):</label>
                                <label id="username-error" class="error" for="username"></label>
                                <input type="text" class="form-control" id="username" placeholder="Nhập tên đăng nhập" name="username" required />
                            </div>
                            <div class="form-group">
                                <label for="email">Email(*):</label>
                                <label id="email-error" class="error" for="email"></label>
                                <input type="email" class="form-control" id="email" placeholder="Nhập email" name="email" required />
                            </div>
                            <div class="form-group">
                                <label for="password">Mật khẩu(*):</label>
                                <label id="password-error" class="error" for="password"></label>
                                <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu" name="password" required />
                            </div>
                            <div class="form-group">
                                <label for="status">Trạng thái:</label>
                                <input type="checkbox" class="grid-switch" name="" value="" checked data-toggle="toggle" data-size="xs">
                            </div>
                            <div class="form-group">
                                <label for="fullname">Tên đầy đủ:</label>
                                <input type="text" class="form-control" placeholder="Nhập tên đầy đủ" name="fullname" />
                            </div>
                            <div class="form-group">
                                <label for="phone">Số điện thoại:</label>
                                <input type="number" class="form-control"  placeholder="Nhập số điện thoại" name="phone" />
                            </div>
                            <div class="form-group">
                                <label for="address">Địa chỉ:</label>
                                <input type="text" class="form-control"  placeholder="Nhập địa chỉ" name="address" />
                            </div>
                        </div>
            
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <input type="submit" value="Lưu" class="btn btn-primary" />
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- The Modal add -->
    </div>

    <!-- The Modal edit -->
    <div class="modal fade" id="editModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content edit-content show-content">
                
            </div>
        </div>
    </div>
    <!-- The Modal edit -->
</body>
@include('users.scripts')

</html>
