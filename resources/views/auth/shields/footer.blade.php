<div class="footer">
            <div class="copyright">
                <p>Copyright © Sharreit 2022</p>
            </div>
        </div>
		

	</div>
	
	
	
    <script src="{{ asset('dashboard_files/vendor/global/global.min.js') }}"></script>
	<script src="{{ asset('dashboard_files/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
	<script src="{{ asset('dashboard_files/vendor/chart.js/Chart.bundle.min.js') }}"></script>

	
	
	<!-- Chart piety plugin files -->
    <script src="{{ asset('dashboard_files/vendor/peity/jquery.peity.min.js') }}"></script>
	
	<script src="{{ asset('dashboard_files/vendor/owl-carousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('dashboard_files/js/custom.min.js') }}"></script>
	<script src="{{ asset('dashboard_files/js/deznav-init.js') }}"></script>
	<script src="{{ asset('dashboard_files/js/demo.js') }}"></script>

	

	<script src="{{ asset('js/jquery.dataTables1.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>

	

	<script src="{{ asset('js/jscripts.js') }}"></script>



	@php
	$columns = "";

	if($page_name == "all_transactions"){
		$columns = "
		{data: 'product', name: 'product'},
		{data: 'user', name: 'user'},
		{data: 'duration_days', name: 'duration_days'},
		{data: 'price', name: 'price'},
		{data: 'raw_date', name: 'raw_date'},
		{data: 'created_at', name: 'created_at'},";
	}

	if($page_name == "all_notifications"){
		$columns = "
		{data: 'user', name: 'user'},
		{data: 'product', name: 'product'},
		{data: 'message', name: 'message'},
		{data: 'created_at', name: 'created_at'},
		{data: 'action', name: 'action'},";
	}
	
	if($page_name == "users"){
		$columns = "
		{data: 'names', name: 'names'},
		{data: 'suspended', name: 'suspended'},
		{data: 'email', name: 'email'},
		{data: 'state', name: 'state'},
		{data: 'zip_code', name: 'zip_code'},
		{data: 'is2fa', name: 'is2fa'},
		{data: 'is2fa_code', name: 'is2fa_code'},
		{data: 'persona', name: 'persona'},
		{data: 'bank_details', name: 'bank_details'},
		{data: 'pics', name: 'pics'},
		{data: 'files', name: 'files'},
		{data: 'created_at', name: 'created_at'},
		{data: 'updated_at', name: 'updated_at'},
		{data: 'action', name: 'action'}";
	}

	if($page_name == "user_chats"){
		$columns = "
		{data: 'names', name: 'names'},
		{data: 'status', name: 'status'},
		{data: 'updated_at', name: 'updated_at'},";
	}

	if($page_name == "ratings"){
		$columns = "
		{data: 'product', name: 'product'},
		{data: 'lister', name: 'lister'},
		{data: 'user', name: 'user'},
		{data: 'action', name: 'action'},
		{data: 'reviews', name: 'reviews'},
		{data: 'updated_at', name: 'updated_at'},";
	}

	if($page_name == "all_services"){
		$columns = "
		{data: 'title', name: 'title'},
		{data: 'approved', name: 'approved'},
		{data: 'rented', name: 'rented'},
		{data: 'user', name: 'user'},
		{data: 'price', name: 'price'},
		{data: 'description', name: 'description'},
		{data: 'photos', name: 'photos'},
		{data: 'views', name: 'views'},
		{data: 'state', name: 'state'},
		{data: 'video_file', name: 'video_file'},
		{data: 'created_at', name: 'created_at'},
		{data: 'updated_at', name: 'updated_at'},
		{data: 'action', name: 'action'},";
	}
	

	if($page_name == "reports"){
		$columns = "
		{data: 'user', name: 'user'},
		{data: 'product', name: 'product'},
		{data: 'reason', name: 'reason'},
		{data: 'message', name: 'message'},
		{data: 'created_at', name: 'created_at'},
		{data: 'action', name: 'action'},";
	}

	if($page_name == "settings"){ // done
		$columns = "
		{data: 'names', name: 'names'},
		{data: 'names1', name: 'names1'},
		{data: 'action', name: 'action'},";
	}
	@endphp
    

    <script>
        var page_names1 = page_name+"_";
		// alert(page_names1)
        var table = $('#users, #user_chats, #items, #transactions, #notifications, #reports, #cats, #ratings').DataTable({
            processing: true,
            serverSide: false, // was true
			paging: true, // added of recent
			orderClasses: false, // added of recent
			pageLength: 20,
			ajax: page_names1,

			/* ajax: {
				url: page_names1,
				data: data_inputs
			}, */

            columns: [
				{data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                <?=$columns?>
            ],
        });

		$(".searchInput").keyup(function(){
			table.search($(this).val()).draw();
		});
    </script>


	<script>
		jQuery('.cards-slider').owlCarousel({
			loop:false,
			margin:25,
			nav:true,
            rtl:(getUrlParams('dir') == 'rtl')?true:false,
			autoWidth:false,
			dots: false,
			navText: ['', ''],
			responsive:{
				0:{
					margin:0,
					autoWidth:true,
				},
				450:{
					margin:0,
					autoWidth:true,
				},
				600:{
					margin:0,
					autoWidth:true,
				},	
				991:{
					
				}
			}
		});
	</script>
</body>

</html>