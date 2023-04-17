@include('auth.shields.header')

<div class="content-body mt--30 mt-sm-0 mt-xs--20 mb--60 mb-xs-30">
	<div class="container-fluid pl-0 pr-0">
		<div class="row">
			<div class="col-xl-12 pl-xs-5 pr-xs-5">
				<div class="card_" style="background:#fff!important; border-radius:10px">
					<div class="card-body_ pl-0 pr-0 pt-xs-20 pl-xs-10 pr-xs-10" >
						<div class="pl-20 pl-xs-5 mb-0" style="font-size:14px;color:#444;">
							Please touch the circle <img src="{{ asset('images/cross-circle.png') }}" style="width:24px"> on each row below to reveal more information
						</div>
						
						@if($page_name == "all_transactions")
							<div class="containerx house_tbl_">
								<div class="card-body all_tables p-xs-0">

									<input type="text" name="email" class="form-control searchInput" placeholder="Search here..." autocomplete="off">
									<br>

									<div class="table-responsive">
										<table id="transactions" class="table table-striped table-bordereds display responsive wrap all_tables1_" cellspacing="0">
											<thead>
												<tr>
													<th>#</th>
													<th>Services</th>
													<th>Booked By</th>
													<th>Status</th>
													<th>Amount</th>
													<th>Dates</th>
													<th>Date Created</th>
												</tr>
											</thead>

											<tbody>
											</tbody>

											<!-- <tfoot>
												<tr>
													<th>#</th>
													<th>Products</th>
													<th>Users</th>
													<th>Status</th>
													<th>Amount</th>
													<th>Date Created</th>
												</tr>
											</tfoot> -->

										</table>
									</div>
								</div>
							</div>
						@endif


						@if($page_name == "all_notifications")
							<div class="containerx house_tbl_">
								<div class="card-body all_tables p-xs-0">

									<input type="text" name="email" class="form-control searchInput" placeholder="Search here..." autocomplete="off">
									<br>

									<div class="table-responsive">
										<table id="notifications" class="table table-striped table-bordereds display responsive wrap all_tables1_" cellspacing="0">
											<thead>
												<tr>
													<th>#</th>
													<th>Users</th>
													<th>Services</th>
													<th class="none">Message</th>
													<th>Date Created</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody>
											</tbody>

											<!-- <tfoot>
												<tr>
													<th>#</th>
													<th>Users</th>
													<th>Products</th>
													<th class="none">Message</th>
													<th>Status</th>
													<th>Date Created</th>
													<th>Action</th>
												</tr>
											</tfoot> -->

										</table>
									</div>
								</div>
							</div>
						@endif


						@if($page_name == "users")
							<div class="containerx house_tbl_">
								<div class="card-body all_tables p-xs-0">

									<input type="text" name="email" class="form-control searchInput" placeholder="Search here..." autocomplete="off">
									<br>

									<div class="table-responsive">
										<table id="users" class="table table-striped table-bordereds display responsive wrap all_tables1_" cellspacing="0">
											<thead>
												<tr>
													<th>#</th>
													<th>Names</th>
													<th>Status</th>
													<th>Email/Phone</th>
													<th class="none">Location</th>
													<th class="none">Zip Code</th>
													<th class="none">2FA</th>
													<th class="none">2FA Code</th>
													<th class="none">Persona Verified</th>
													<th class="none">Bank Details</th>
													<th class="none">Profile Photo</th>
													<th class="none">File Uploaded</th>
													<th>Date Created</th>
													<th class="none">Date Updated</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody>
											</tbody>

											<!-- <tfoot>
												<tr>
													<th>#</th>
													<th>Names</th>
													<th>Status</th>
													<th>Email/Phone</th>
													<th class="none">Location</th>
													<th class="none">2FA</th>
													<th class="none">2FA Code</th>
													<th class="none">Profile Photo</th>
													<th class="none">File Uploaded</th>
													<th>Date Created</th>
													<th class="none">Date Updated</th>
													<th>Action</th>
												</tr>
											</tfoot> -->

										</table>
									</div>
								</div>
							</div>
						@endif


						@if($page_name == "user_chats")
							<div class="containerx house_tbl_">
								<div class="card-body all_tables p-xs-0">

									<input type="text" name="email" class="form-control searchInput" placeholder="Search here..." autocomplete="off">
									<br>

									<div class="table-responsive">
										<table id="user_chats" class="table table-striped table-bordereds display responsive wrap all_tables1_" cellspacing="0">
											<thead>
												<tr>
													<th>#</th>
													<th>Names</th>
													<th>Status</th>
													<th>Last Chat Date</th>
												</tr>
											</thead>

											<tbody>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						@endif


						@if($page_name == "ratings")
							<div class="containerx house_tbl_">
								<div class="card-body all_tables p-xs-0">

									<input type="text" name="rating" class="form-control searchInput" placeholder="Search here..." autocomplete="off">
									<br>

									<div class="table-responsive">
										<table id="ratings" class="table table-striped table-bordereds display responsive wrap all_tables1_" cellspacing="0">
											<thead>
												<tr>
													<th>#</th>
													<th>Service</th>
													<th>Lister</th>
													<th>Booker</th>
													<th>Action</th>
													<th class="none">Reviews</th>
													<th>Date</th>
												</tr>
											</thead>

											<tbody>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						@endif


						@if($page_name == "reports")
							<div class="containerx house_tbl_">
								<div class="card-body all_tables p-xs-0">

									<input type="text" name="email" class="form-control searchInput" placeholder="Search here..." autocomplete="off">
									<br>
									
									<div class="table-responsive">
										<table id="reports" class="table table-striped table-bordereds display responsive wrap all_tables1_" cellspacing="0">
											<thead>
												<tr>
													<th>#</th>
													<th>Names</th>
													<th>Services</th>
													<th>Reason</th>
													<th class="none">Message</th>
													<th>Date Created</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody>
											</tbody>

											<!-- <tfoot>
												<tr>
													<th>#</th>
													<th>Names</th>
													<th>Products</th>
													<th>Reason</th>
													<th class="none">Message</th>
													<th>Date Created</th>
													<th>Action</th>
												</tr>
											</tfoot> -->

										</table>
									</div>
								</div>
							</div>
						@endif

						
						@if($page_name == "all_services")
							<div class="col-lg-12_ containerx house_tbl_">
								<div class="card-body all_tables p-xs-0">

									<input type="text" name="email" class="form-control searchInput" placeholder="Search here..." autocomplete="off">
									<br>

									<div class="table-responsive">
										<table id="items" class="table table-striped table-bordereds display responsive wrap all_tables1_" cellspacing="0">
											<thead>
												<tr>
													<th>#</th>
													<th>Title</th>
													<th>Status</th>
													<th>Booked</th>
													<th>User</th>
													<th>Price</th>
													<th class="none">Description</th>
													<th class="none">Photos</th>
													<th class="none">Views</th>
													<th class="none">Location</th>
													<th class="none">Video File</th>
													<th>Date Created</th>
													<th class="none">Date Updated</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody>
											</tbody>

										</table>
									</div>
								</div>
							</div>
						@endif

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@include('auth.shields.footer')