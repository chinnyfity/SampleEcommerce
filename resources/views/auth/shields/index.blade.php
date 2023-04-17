@include('auth.shields.header')

	<div class="content-body mt-lg--30 mt-sm-10 mt-xs--10">
		<div class="container-fluid">
			
			<h3 style="color:#222;">Hello Administrator</h3>
			<div class="mt--5" style="color:#555;">Welcome to your dashboard</div>

			<div class="row mt-30">
				<div class="col-md-4 pl-sm-10 pr-sm-10">
					@php $paths = url('/')."/dashboard_files/images/"; @endphp
					<div class="wallet-card bg-secondaryi" style="width:100%; height:90%">
						<a href="{{ route('users') }}">
							<div class="head">
								<p class="fs-16 text-white mb-0 font-w600">Total Users</p>
								<span><i class="fa fa-users"></i> {{ $total_users }}</span>
							</div>
							
							<div class="wallet-footer pb-10">
								<div class="row profit_info profit_info1 mt--20 mt-md-5 mt-xs-20">
									<div class="col-12 pl-5 pr-5">
										<p>Recently logged in</p>
										<span class="fs-14 usd_btc_bal">{{ $users_logged > 0 ? $users_logged : 'No' }} users</span>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-4 pl-sm-10 pr-sm-10">
					<div class="wallet-card bg-secondaryi" style="width:100%; height:90%">
						<a href="{{ route('services') }}">
							<div class="head">
								<p class="fs-16 text-white mb-0 font-w600">Total Booking</p>
								<span><i class="fab fa-renren"></i> {{ $total_rents }}</span>
							</div>

							<div class="wallet-footer pb-10">
								<div class="row profit_info profit_info1 mt--20 mt-md-5 mt-xs-20">
									<div class="col-12 pl-5 pr-5">
										<p>Currently Booked</p>
										<span class="fs-14">{{$current_rents}} active</span>
									</div>
								</div>
								<!-- <img src="{{ url('/') }}/dashboard_files/images/card-logo.png" alt=""> -->
							</div>
						</a>
					</div>
				</div>


				<div class="col-md-4 pl-sm-10 pr-sm-10">
					<div class="wallet-card bg-secondaryi" style="width:100%; height:90%">
						<a href="{{ route('transactions') }}">
							<div class="head">
								<p class="fs-16 text-white mb-0 font-w600">Total Transactions</p>
								<span><i class="fa fa-money-bill-wave"></i> ${{ number_format($total_trans, 2) }}</span>
							</div>

							<div class="wallet-footer pb-10">
								<div class="row profit_info profit_info1 mt--20 mt-md-5 mt-xs-20">
									<div class="col-12 pl-5 pr-5">
										<p>Yesterday's Transaction</p>
										<span class="fs-14 usd_usdt_bal">${{$today_trans}}</span>
									</div>
								</div>
								<!-- <img src="{{ url('/') }}/dashboard_files/images/card-logo.png" alt=""> -->
							</div>
						</a>
					</div>
				</div>


				<div class="col-md-4 pl-sm-10 pr-sm-10">
					<div class="wallet-card bg-secondaryi" style="width:100%; height:90%">
						<a href="{{ route('services') }}">
							<div class="head">
								<p class="fs-16 text-white mb-0 font-w600">Total Services</p>
								<span><i class="fab fa-product-hunt"></i> {{ $total_prods }}</span>
							</div>

							<div class="wallet-footer pb-10">
								<div class="row profit_info profit_info1 mt--20 mt-md-5 mt-xs-20">
									<div class="col-12 pl-5 pr-5">
										<p>Recently Uploaded</p>
										<span class="fs-14">{{$recent_prods}} recent</span>
									</div>
								</div>
								<!-- <img src="{{ url('/') }}/dashboard_files/images/card-logo.png" alt=""> -->
							</div>
						</a>
					</div>
				</div>


				<div class="col-md-4 pl-sm-10 pr-sm-10">
					<div class="wallet-card bg-secondaryi" style="width:100%; height:90%">
						<a href="{{ route('notifications') }}">
							<div class="head">
								<p class="fs-16 text-white mb-0 font-w600">Total Notification</p>
								<span><i class="fa fa-bell"></i> {{ $total_notify }}</span>
							</div>

							<div class="wallet-footer pb-10">
								<div class="row profit_info profit_info1 mt--20 mt-md-5 mt-xs-20">
									<div class="col-12 pl-5 pr-5">
										<p>Recent Notifications</p>
										<span class="fs-14">{{ $recent_notify > 0 ? $recent_notify : 'No' }} new</span>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>


				<div class="col-md-4 pl-sm-10 pr-sm-10">
					<div class="wallet-card bg-secondaryi" style="width:100%; height:90%">
						<a href="{{ route('service-report') }}">
							<div class="head">
								<p class="fs-16 text-white mb-0 font-w600">Total Service Reports</p>
								<span><i class="fa fa-bell"></i> {{ $total_reports }}</span>
							</div>

							<div class="wallet-footer pb-10">
								<div class="row profit_info profit_info1 mt--20 mt-md-5 mt-xs-20">
									<div class="col-12 pl-5 pr-5">
										<p>Recent Reports</p>
										<span class="fs-14">{{ $recent_reports > 0 ? $recent_reports : 'No' }} new</span>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>


				<div class="col-md-4 pl-sm-10 pr-sm-10">
					<div class="wallet-card bg-secondaryi" style="width:100%; height:90%">
						<a href="{{ route('service-report') }}">
							<div class="head">
								<p class="fs-16 text-white mb-0 font-w600">Admin Earnings</p>
								<span><i class="fa fa-money-bill-wave"></i> ${{ $admin_wallet }}</span>
							</div>

							
						</a>
					</div>
				</div>
			</div>



			<div class="col-xl-12 mt-30 mb-60 pl-xs-0 pr-xs-0">
				<h4 class="text-black">
					Recent Bookings
					<span><a href="{{ route('transactions') }}" style="color:#2e96e5; font-size:15px; margin-left:6px;">show all</a></span>
				</h4>
				<div class="table-responsive table-hover fs-14 mt-15">
					<table id="transactions_" class="table table-striped dataTablesCard card-table display responsive nowrap all_tables1_ index" cellspacing="0">
						<thead>
							<tr>
								<th>Users</th>
								<th>Services</th>
								<th>Price</th>
								<th>Duration</th>
								<th>Date</th>
							</tr>
						</thead>
						<tbody>
							@if($transactions)
								@foreach($transactions as $transaction)
									<tr>
										<td>
											{{ucwords($transaction->user)}}
										</td>
										<td>
											{{ucwords($transaction->title)}}
										</td>

										<td>${{ @number_format($transaction->price, 2) }} </td>
										<td>
											<div style="font-size: 13px; color: #555;">{{ $transaction->duration_days }} days</div>

											@php $color="red"; @endphp
											@if($transaction->duration >= time())
											@php $color="green"; @endphp
											@endif


											<div style="font-size:12px;color:{{$color}}">
												{{ 
													$transaction->duration >= time() 
													? 
													'Expire in '.date('d F Y h:ia', $transaction->duration) 
													: 
													'Booking expired'
												}}
											</div>
										</td>
										<td>{{ date("D jS, M Y h:ia", strtotime($transaction->updated_at)) }}</td>
									</tr>
								@endforeach
							@endif
						</tbody>
					</table>
				</div>	
			</div>
		
		</div>
	</div>

@include('auth.shields.footer')