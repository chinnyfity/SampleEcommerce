
@include('header')

<div class="py-6 py-lg-6 mt-lg-11 mt-9 pb-lg-6 pb-7 mainCon">
    <div class="container ps-0 pe-1">
        <div class="gotoDashboard ps-2 mt-n6">
            <a href="{{route('dashboard')}}">
                <i class="mdi mdi-arrow-left-bold icon-shape icon-shape3 icon-purple rounded-circle"></i>Back
            </a>
        </div>

        @if($page_name == "view_services")
        <div class="mb-5 mt-4">
            <div class="col-md-12 col-12 mb-0 text-center">
                <h2><b class="service_info">Customers Who Booked my Services</b></h2>
            </div>

            <div class="offset-lg-3 col-lg-6">
                <div class="mb-2">
                    <!-- <label for="home" class="form-label">Category</label> -->
                    <select class="select2_2 select_table" id="home" name="txt_cat" autocomplete="off">
                        <option value="customers" selected>Services Customers Booked</option>
                        <option value="my_uploads">Services I Uploaded</option>
                    </select>
                </div>
            </div>

            <div class="row justify-content-center mt-n2">
                <div class="col-lg-12 container p-0" style="width:100%">
                    <div class="card-body all_tables p-xs-0 table-responsive">

                        <input type="text" name="email" class="form-control searchInput" placeholder="Search here..." autocomplete="off">
						<br>

                        <div class="table_one">
                            <table id="items" class="table table-striped table-bordered display responsive wrap all_tables1" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="prod_name">Product Name</th>
                                    <th>Status</th>
                                    <!-- <th class="none">Feature</th> -->
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th class="none">Media</th>
                                    <th class="none">Photos</th>
                                    <th class="none">Date Added</th>
                                    <th class="none">Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            <br><br>
                        </div>


                        <div class="table_two" style="display:none">
                            <table id="customers_bookings" class="table table-striped table-bordered display responsive wrap all_tables1" cellspacing="0">
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
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif


        @if($page_name == "booked_services")
        <div class="mb-5 mt-4">
            <div class="col-md-12 col-12 mb-0 text-center">
                <h1><b>My Bookings</b></h1>
            </div>

            <div class="row justify-content-center mt-n2">
                <div class="col-lg-12 container p-0" style="width:100%">
                    <div class="card-body all_tables p-xs-0 table-responsive">

                        <input type="text" name="email" class="form-control searchInput" placeholder="Search here..." autocomplete="off">
						<br>

                        <table id="booked_services" class="table table-striped table-bordered display responsive wrap all_tables1" cellspacing="0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</t>
                                <th>Booked Status</th>
                                <th>Price</th>
                                <th>Duration</th>
                                <th>Date Booked</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif


        @if($page_name == "my_customers")
        <div class="mb-5 mt-4">
            <div class="col-md-12 col-12 mb-0 text-center">
                <h1><b>My Customers</b></h1>
                <p style="margin:-10px 0 20px 0">List of customers that have booked your services</p>
            </div>

            <div class="row justify-content-center mt-n2">
                <div class="col-lg-12 container p-0" style="width:100%">
                    <div class="card-body all_tables p-xs-0 table-responsive">

                        <input type="text" name="email" class="form-control searchInput" placeholder="Search here..." autocomplete="off">
						<br>
                        
                        <table id="customers" class="table table-striped table-bordered display responsive wrap all_tables1" cellspacing="0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Customers</t>
                                <th>Service Booked</th>
                                <th>Location</th>
                                <th>Date Booked</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif



        @if($page_name == "all_transactions")
        <div class="mb-5 mt-4">
            <div class="col-md-12 col-12 mb-0 text-center">
                <h1><b>Your Transaction History</b></h1>
                <!-- <p style="margin:-10px 0 20px 0">Your Transaction History</p> -->
            </div>

            <div class="row justify-content-center mt-n2">
                <div class="col-lg-12 container p-0" style="width:100%">
                    <div class="card-body all_tables p-xs-0 table-responsive">

                        <!-- <input type="text" name="email" class="form-control searchInput" placeholder="Search here..." autocomplete="off"> -->
						<!-- <br> -->
                        
                        <table id="transactions" class="table table-striped table-bordered display responsive wrap all_tables1" cellspacing="0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Narration</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Payment Method</th>
                                <th class="none">Response</th>
                                <th>Date Created</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif


    </div>
</div>

@include('footer')
