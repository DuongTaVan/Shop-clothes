@extends('backend.master')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm Thành viên</h1>
            </div>
        </div>
        <!--/.row-->
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fas fa-user"></i> Thêm thành viên</div>
                    <div class="panel-body">
                        <div class="row justify-content-center" style="margin-bottom:40px">

                            <div class="col-md-8 col-lg-8 col-lg-offset-2">
                             <form action="Admin/User/postAddUser" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Email</label>
                                    <input required="" type="text" name="email" class="form-control">
                                  
                                </div>
                                <div class="form-group">
                                    <label>password</label>
                                    <input required="" type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Full name</label>
                                    <input required="" type="full" name="full" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input required="" type="address" name="address" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input required="" type="phone" name="phone" class="form-control">
                                </div>
                              
                                <div class="form-group">
                                    <label>Level</label>
                                    <select name="level" class="form-control">
                                        <option value="1">admin</option>
                                        <option value="2">user</option>
                                        <option value="3">starr</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-lg-8 col-lg-offset-2 text-right">
                                  
                                    <button class="btn btn-success"  type="submit">Thêm thành viên</button>
                                    <a class="btn btn-danger" type="reset">Huỷ bỏ</a>
                                </div>
                            </div>
                           </form>

                        </div>
                    
                        <div class="clearfix"></div>
                    </div>
                </div>

        </div>
    </div>

        <!--/.row-->
    </div>

 @endsection