@extends('backend.master')
@section('content')
	<!--/. end sidebar left-->

	<!--main-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Danh sách thành viên</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách thành viên</h1>
			</div>
			@if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">

					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								@can('Admin')
								<a href="Admin/User/addUser" class="btn btn-primary">Thêm Thành viên</a>
								@endcan
								<table class="table table-bordered" style="margin-top:20px;">

									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th>Email</th>
											<th>Full</th>
											<th>Address</th>
                                            <th>Phone</th>
                                            <th>Level</th>
											<th width='18%'>Tùy chọn</th>
										</tr>
									</thead>
									<tbody>
									@foreach($users as $us)
										<tr>
											<td>{{$us->id}}</td>
											<td>{{$us->email}}</td>
											<td>{{$us->full}}</td>
											<td>{{$us->address}}</td>
                                            <td>{{$us->phone}}</td>
                                            <td>
                                            	@if($us->level == 1)
                                            		Admin
                                            	@elseif($us->level == 2)
                                            		User
                                            	@elseif($us->level == 3)
                                            		Staff
                                            	@endif

                                            </td>
											<td>

												<a href="Admin/User/editUser/{{$us->id}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												
												<a href="Admin/User/delUser/{{$us->id}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
												
											</td>
                                        </tr>
                                    @endforeach
								
									</tbody>
								</table>
								<div align='right'>
									{{$users->links()}}
								</div>
							</div>
							<div class="clearfix"></div>
						</div>

					</div>
				</div>
				<!--/.row-->


			</div>
			<!--end main-->

			<!-- javascript -->
			<script src="js/jquery-1.11.1.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="js/chart.min.js"></script>
			<script src="js/chart-data.js"></script>
		</div>	
			
 @endsection

