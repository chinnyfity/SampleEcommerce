
@include('header')

<style type="text/css">
.uploadifive-button {
	float: left;
	margin-right: 10px;
}
#queue {
	border: 1px solid #ddd;
	height: 177px;
	overflow: auto;
	margin-bottom: 10px;
	padding: 0 3px 3px;
	width: 100%;
    background: #f4f4f4;
}
</style>


<div class="py-6 py-lg-6 mt-13 pb-lg-6 pb-7 mainCon">
    <div class="container">
        <div class="gotoDashboard mt-n6">
            <a href="{{route('dashboard')}}">
                <i class="mdi mdi-arrow-left-bold icon-shape icon-shape3 icon-purple rounded-circle"></i>
                Back
            </a>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                @include('auth.dashboard.post_items2')
            </div>
        </div>
    </div>
</div>

@include('footer')
