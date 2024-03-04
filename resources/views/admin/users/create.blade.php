@extends('admin.layouts.admin')
@section('title')
    <title>
        Trang chủ
    </title>
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên người dùng</label>
                                <input
                                    type="text"
                                    class="form-control "
                                    name = "name"
                                    placeholder="Nhập tên" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input
                                    type="email"
                                    class="form-control "
                                    name = "email"
                                    placeholder="Nhập email" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input
                                    type="password"
                                    class="form-control "
                                    name = "password"
                                    placeholder="Nhập password">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
