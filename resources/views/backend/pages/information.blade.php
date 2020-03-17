@extends('backend.master')
@section('content')
    <!--/. end sidebar left-->
    <!--main-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thông tin  Admin</h1>
            </div>
        </div>
        <!--/.row-->
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fas fa-user"></i> Thông tin Admin - {{Auth::user()->full}}</div>
                    <div class="panel-body">
                        <div class="row justify-content-center" style="margin-bottom:40px">

                            <div class="col-md-8 col-lg-8 col-lg-offset-2">
                             
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" value="{{Auth::user()->email}}">
                                    
                                </div>
                                
                                <div class="form-group">
                                    <label>Full name</label>
                                    <input type="full" name="full" class="form-control" value="{{Auth::user()->full}}">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="address" name="address" class="form-control" value="{{Auth::user()->address}}">
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="phone" name="phone" class="form-control" value="{{Auth::user()->phone}}">
                                </div>
                              
                                <div class="form-group">
                                    <label>Level</label>
                                    <select name="level" class="form-control" value="">
                                        @if(Auth::user()->level==1)
                                        <option value="1">admin</option>
                                        @elseif(Auth::user()->level==2)
                                        <option selected value="2">user</option>
                                 
                                        @elseif(Auth::user()->level==3)
                                        <option selected value="3">starr</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-lg-8 col-lg-offset-2 text-right">
                                  
                                    <a href="Admin/editAdmin" class="btn btn-success"  type="submit">Sửa thành viên</a>
                                    <a href="Admin" class="btn btn-danger" type="reset">Huỷ bỏ</a>
                                </div>
                            </div>
                           

                        </div>
                    
                        <div class="clearfix"></div>
                    </div>
                </div>

        </div>
    </div>

        <!--/.row-->
    </div>

@endsection