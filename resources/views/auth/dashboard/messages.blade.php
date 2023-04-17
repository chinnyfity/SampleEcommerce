
@include('header')

<div class="py-6 py-lg-6 mt-lg-10 mt-8 pb-lg-6 pb-7 mainCon">
    <div class="container">
        <div class="gotoDashboard">
            <a href="{{route('dashboard')}}">
                <i class="mdi mdi-arrow-left-bold icon-shape icon-shape3 icon-purple rounded-circle"></i>
                Back
            </a>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12 pe-md-1 ps-md-1 pe-5 ps-5">
                <div class="pb-lg-9 offset-md-2 col-md-8">
                    <div class="col-12 mb-5 mt-lg-3 mt-md-5 mt-6 text-center">
                        <h2><b>Your Messages</b></h2>
                        <p class="mt-n3 mb-6" style="color:#555;">These are messages of customers who sent private messages for your services</p>
                    </div>

                    @if($user_msg_infos)
                        @php $k=0; @endphp
                        @foreach($user_msg_infos as $user_msg)
                            @if($k % 2 == 0)
                                <div class="row mb-4 chats">
                                    <div class="col-md-1 col-3 pe-0">
                                        <img class='' src="{{ asset('products/'.$user_msg->prod_pics) }}" alt=''/>
                                    </div>

                                    <div class="col-md-11 col-9 ps-2">
                                        <p class="prods">{{ ucwords($user_msg->prod_name) }}</p>
                                        <p class="name">Customer: {{ ucwords($user_msg->fullnames) }}</p>
                                        <p class="dates">{{ date("D jS, M Y h:ia", strtotime($user_msg->created_at)) }}</p>
                                        <p>{{ ucfirst($user_msg->message) }}</p>
                                    </div>
                                </div>
                            @else
                                <div class="row mb-4 chats chats1">
                                    <div class="col-md-11 col-9 pe-2">
                                        <p class="prods">{{ ucwords($user_msg->prod_name) }}</p>
                                        <p class="name">Customer: {{ ucwords($user_msg->fullnames) }}</p>
                                        <p class="dates">{{ date("D jS, M Y h:ia", strtotime($user_msg->created_at)) }}</p>
                                        <p>{{ ucfirst($user_msg->message) }}</p>
                                    </div>

                                    <div class="col-md-1 col-3 ps-0 pe-0 rights">
                                        <img class='' src="{{ asset('products/'.$user_msg->prod_pics) }}" alt=''/>
                                    </div>
                                </div>
                            @endif
                            @php $k++; @endphp
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@include('footer')
