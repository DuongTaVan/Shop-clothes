@extends('Frontend/master')
@section('content')


<!-- <script type="text/javascript" src="source/frontend/js/jquery-3.4.1.min.js"></script> -->


@if(Cart::count()==0)
	<div style="text-align: center;background: teal"> <h1>Bạn chưa mua hàng</h1></div>
@else
	<div class="colorlib-shop">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-10 col-md-offset-1">
						<div class="process-wrap">
							<div class="process text-center active">
								<p><span>01</span></p>
								<h3>Giỏ hàng</h3>
							</div>
							<div class="process text-center">
								<p><span>02</span></p>
								<h3>Thanh toán</h3>
							</div>
							<div class="process text-center">
								<p><span>03</span></p>
								<h3>Hoàn tất thanh toán</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row row-pb-md">
					<div class="col-md-10 col-md-offset-1">
						<div class="product-name">
							<div class="one-forth text-center">
								<span>Chi tiết sản phẩm</span>
							</div>
							<div class="one-eight text-center">
								<span>Giá</span>
							</div>
							<div class="one-eight text-center">
								<span>Số lượng</span>
							</div>
							<div class="one-eight text-center">
								<span>Tổng</span>
							</div>
							<div class="one-eight text-center">
								<span>Xóa</span>
							</div>
						</div>
						@foreach($data as $data)
						<div class="product-cart">
							<div class="one-forth">
								<div class="product-img">
									<img class="img-thumbnail cart-img" src="source/backend/img/{{$data->options->img}}">
								</div>
								<div class="detail-buy">
									<h4>Mã : {{$data->code}}</h4>
									<h5>{{$data->name}}</h5>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<span class="price">{{number_format($data->price)}} đ</span>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<input type="number" id="quantity" name="quantity"
										class="form-control input-number text-center" value="{{$data->qty}}"  onchange="update('{{ $data->rowId }}',this.value)">
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<span class="price">{{number_format($data->price*$data->qty)}} đ</span>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<a href="Frontend/Product/delCart/{{$data->rowId}}" class="closed"></a>
								</div>
							</div>
						</div>
						@endforeach


					</div>
				</div>
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="total-wrap">
							<div class="row">
								<div class="col-md-8">

								</div>
								<div class="col-md-3 col-md-push-1 text-center">
									<div class="total">
										<div class="sub">
											<p><span>Tổng:</span> <span>{{$total}} đ</span></p>
										</div>
										<div class="grand-total">
											<p><span><strong>Tổng cộng:</strong></span> <span>{{$total}} đ</span></p>
											<a href="Frontend/Product/ckeckout" class="btn btn-primary">Thanh toán <i
													class="icon-arrow-right-circle"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
	@endif
@endsection
@section('script')
<script>
	
	function update(rowId,qty)
	{

		$.get("Frontend/Product/update/"+rowId+"/"+qty,

		function($data)
		{

			if($data="success")
			{
				
				window.location.reload();
			}
			else
			{
				alert("cap nhat that bai");
			}
		});

	}
</script>
@endsection
