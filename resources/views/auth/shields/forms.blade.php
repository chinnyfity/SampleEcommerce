
@include('auth.shields.header')

<div class="content-body mt--30 mt-sm-0 mt-xs--20">
<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 pl-xs-5 pr-xs-5">
			<div class="card pl-xs-10 pr-xs-10">
				<div class="profile-tab">
					<div class="custom-tab-1">
						<ul class="nav nav-tabs">

							<li class="nav-item"><a href="#settings" data-bs-toggle="tab" class="nav-link active show">Settings</a>
							</li>

							<li class="nav-item"><a href="#change-pass" data-bs-toggle="tab" class="nav-link">Change Password</a>
							</li>

							<li class="nav-item"><a href="#edit-cats" data-bs-toggle="tab" class="nav-link">Add/Edit Category</a>
							</li>
						</ul>

						<div class="tab-content mb-30">
							<!-- <div id="statistics" class="tab-pane fade">
								<div class="my-post-content mt-30">
									<form class="form_settings1" autocomplete="off">
										{{ csrf_field() }}
										<div class="settings-form mb-30">
											<h3 class="text-light">Statistics</h3>
											<p style="color:#ccc; font-size:14px;">Leave the default or enter a faker statistics. This figures will show on the home page</p>

											<div class="row mt-20">
												<div class="mb-3 col-md-6">
													<label class="form-label">Currency Exchange <span class="star">*</span></label> 
													<input type="number" placeholder="Enter Currecy Exchange" class="form-control txtcurex" name="txtcurex" value="{{$settings->currency_exchange}}">
												</div>

												<div class="mb-3 col-md-6">
													<label class="form-label">Active Traders</label>
													<input type="number" placeholder="Enter Active Traders" class="form-control txttraders" name="txttraders" value="{{$settings->active_traders}}">
												</div>
											</div>

											<div class="row mt-20">
												<div class="mb-3 col-md-6">
													<label class="form-label">Our Customers <span class="star">*</span></label> 
													<input type="number" placeholder="Enter Customers Counts" class="form-control txtcus" name="txtcus" value="{{$settings->customers}}">
												</div>

												<div class="mb-3 col-md-6">
													<label class="form-label">Countries Supported</label>
													<input type="number" placeholder="Enter Countries Counts" class="form-control txtccounts" name="txtccounts" value="{{$settings->countries_supported}}">
												</div>
											</div>
											
											<button class="mt-10 btn-pad btn btn-md btn-primary update_settings3" type="button">Update Settings</button>
										</div>
									</form>
								</div>
							</div> -->


							<div id="change-pass" class="tab-pane fade">
								<h3 class="mt-30 mb-30">Update Your Password</h3>
								<form class="form_password" autocomplete="off">
									{{ csrf_field() }}
									<div class="row">
										<div class="mb-3 col-md-9">
											<label class="form-label">Current Password</label>
											<input type="password" name="txtpass1" placeholder="Type Current Password" class="form-control">
										</div>
										
										<div class="mb-3 col-md-9">
											<label class="form-label">New Password</label>
											<input type="password" name="txtpass2" placeholder="Type New Password" class="form-control">
										</div>

										<div class="mb-3 col-md-9">
											<label class="form-label">Confirm Password</label>
											<input type="password" name="txtpass3" placeholder="Confirm Your Password" class="form-control">
										</div>
									</div>
									
									<button class="mt-15 btn-pad btn btn-round btn-md btn-primary cmd_update_pass_adm" type="button">Update Password</button>
								</form>
							</div>


							<div id="settings" class="tab-pane fade active show">
								<div class="mt-30">
									<form class="form_settings" autocomplete="off">
										{{ csrf_field() }}
										<div class="settings-form mb-30">
											<h3 class="text-light_ mt-20 mb-20">Settings</h3>
											<div class="row">
												<div class="mb-3 col-md-12">
													<label class="form-label">Service Charges <font style="font-size:12.5px;color:#666;">(charges for sharing a service)</font></label> 
													<input type="number" placeholder="Enter number in %" class="form-control fname" name="txtcharges" value="{{$settings->service_fee}}">
												</div>

												<!-- <div class="mb-3 col-md-6">
													<label class="form-label">Pause Earning</label>
													<select name="txtstop_earn" class="form-control form-control-md txtstop_earn">
														<option value="0" {{$settings->stop_earning == 0 ? 'selected' : ''}}>NO</option>

														<option value="1" {{$settings->stop_earning == 1 ? 'selected' : ''}}>YES</option>
													</select>
												</div> -->
											</div>

											@php
												
											@endphp

											<div class="row">
												<div class="mb-3 col-md-6 col-12">
													<label class="form-label">Company Email</label>
													<input type="text" placeholder="Enter Company Email" class="form-control txtemail mb-5" name="txtemail" value="{{$settings->company_email}}">
												</div>

												<div class="mb-3 col-md-6 col-12">
													<label class="form-label">Company Phone</label>
													<input type="text" placeholder="Enter Company Phone" class="form-control txtphone mb-5" name="txtphone" value="{{$settings->company_phone}}">
												</div>
											</div>
											
											<button class="mt-10 btn-pad btn btn-md btn-primary update_settings1" type="button">Update Settings</button>
										</div>
									</form>
								</div>
							</div>


							<div id="edit-cats" class="tab-pane fade active_ _show">
								<div class="mt-30">
									<div class="card-body all_tables p-xs-0" style="background:#fff!important;border:0!important;width:85%!important">
										<div class="table-responsive">
											<table id="cats" class="table table-striped table-bordereds display responsive nowrap all_tables1_" cellspacing="0" style="background:#fff">
												<thead>
													<tr>
														<th>#</th>
														<th>Categories</th>
														<th class="none">Sub Categories</th>
														<th>Action</th>
													</tr>
												</thead>

												<tbody>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

@include('auth.shields.footer')