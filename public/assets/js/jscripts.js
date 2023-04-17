
var site_url = $('#site_url').val();
var page_names = $('#page_names').val();
var token = $('#txt_token').val();
//alert(page_names)

$(document).ready(function(){
  $('ul.tabs li').click(function(){
		var tab_id = $(this).attr('data-tab');

		$('ul.tabs li').removeClass('current');
		$('.tab-content').removeClass('current');

		$(this).addClass('current');
    $("#"+tab_id).addClass('current');
  });


  $('.bank_trans').on('change', function() {
    if (this.value == 'new') {
      $('#shipping_online').hide();
      $('#shipping-new').slideToggle('fast');
    } else {
      $('#shipping_online').show();
      $('#shipping-new').slideToggle('fast');
    }
  });


  $('.shipping_online').on('change', function() {
    if (this.value == 'cod') {
      $('#shipping-new').hide();
      $('#shipping_online').slideToggle('fast');
    } else {
      $('#shipping-new').show();
      $('#shipping_online').slideToggle('fast');
    }
  });



  
});



$('.woocommerce-loop-product__link').live("hover", function(){
  var ids = $(this).attr('id');
  $('#cover_inner'+ids).fadeToggle('fast');
});


$('body').live("click", function(e){
  e.stopPropagation();
  $("#myDropdown").fadeOut('fast');
  $("#myDropdown1").fadeOut('fast');
  $("#myDropdown2").fadeOut('fast');
});


$('.add_to_cart_btn').live("click", function(){
  $('.alert_cart_add').fadeIn('fast');
  setTimeout(function(){
    $('.alert_cart_add').fadeOut('fast');
  },3000);
});


$('.shipping-calculator-button').live("click", function(){
  $('.shipping-calculator-form').slideToggle('fast');
});


$('.login_here').live("click", function(){
  $('.reg_forms').hide();
  $('.login_forms').fadeIn('fast');
});

$('.reg_here').live("click", function(){
  $('.reg_forms').fadeIn('fast');
  $('.login_forms').hide();
});



$('.cmd_submit_orders').live("click",function(e){
  var validate_input = $('#validate_input').val();
  var self = this;
  $(self).attr('disabled', true).css({'opacity': '0.4'});

  if(validate_input==1){
    if(confirm("Proceed to use this payment method?")){
      $.ajax({
        type : "POST",
        url : site_url + "/submit-details",
        data: $(".checkouts").serialize(),
        cache : false,
        success : function(data){
          if(data.status=="success"){
            $(".err_store").fadeOut('slow');
            $('.first_order_div').hide();
            $('.sucs_div').fadeIn('fast');
            $('.counts1').html(0);
            $('#cart_counts').val(0);
          }else{
            $(".err_store").show().html('<div class="Errormsg">'+data+'</div>');
          }
          $(self).removeAttr('disabled').css({'opacity': '1'});
    
        },error : function(data){
          $(self).removeAttr('disabled').css({'opacity': '1'});
          $(".err_store").show().html('<div class="Errormsg">'+data.message+'</div>');
        }
      });
    }
  }else{
    alert('Please fill the fields in "Billing & Delivery Details" and click on the "Continue" button to continue');
    $('.acc_head_1').click();
  }
});


$('.alert_cart_add').live("click",function(){
  $(this).fadeOut('fast');
});



$('#cmd_submit_details').live("click",function(e){
  e.preventDefault();
  var self = this;
  var results = '';
  $(".err_store").hide();
  $('#validate_input').val(0);

  $(self).attr('disabled', true).css({'opacity': '0.4'});
  
  $.ajax({
    type : "POST",
    url : site_url + "/store-details",
    data: $(".checkouts").serialize(),
    cache : false,
    success : function(data){
      $.each(data.message, function(){
        results += this + '<br>';
      });

      if(data.status == "success"){
        $('#validate_input').val(1);
        $(".err_store").fadeOut('slow');
        $('.acc_head_2').click();

      }else{
        $(".err_store").show().html('<div class="Errormsg">'+results+'</div>');
        setTimeout(function(){
          $(".err_store").hide();
        },3000);
      }
      $(self).removeAttr('disabled').css({'opacity': '1'});

    },error : function(data){
      $(self).removeAttr('disabled').css({'opacity': '1'});
      $(".err_store").show().html('<div class="Errormsg">'+data+'</div>');
    }
  });
});



$('#upd_cart1').live("click",function(){
  var prices = $(this).attr("prices");
  var ids = $(this).attr("ids");
  var qty = $('#txtqty'+ids).val();
  var txtsubtotals = $('#txtsubtotals').val();
  var totl = parseFloat(prices) * parseInt(qty); // 4000 * 2 = 8000
  $("#txttotal1"+ids).val(totl);
  $('.totals'+ids).html("<b style='font-size:19px;'>.....</b>");

  setTimeout(function(){
    $('.totals'+ids).html("&#8358;"+addCommas(totl));
    var total_sum = 0;

    $(".shop_tbl .txttotal1").each(function(){
      var get_textbox_value = $(this).val();
      if ($.isNumeric(get_textbox_value)) {
        total_sum += parseFloat(get_textbox_value);
      }
    });

    var real_sum = parseFloat(total_sum) + 3;
    
    $("#txtsubtotals").val(total_sum);
    $('#txtreattotls').val(real_sum);
    $(".subtotals").html(addCommas(total_sum));
    $('.real_totals').html(addCommas(real_sum));
    $('.final_total').html(addCommas(real_sum));
  },50);
  
  var datastring='product='+ids
  +'&qty='+qty
  +'&_token='+token;

  $.ajax({
    type : "POST",
    url : site_url + "/update-qty",
    data: datastring,
    cache : false,
    success : function(html){
    }
  });
});



function addCommas(nStr){
  nStr += '';
  x = nStr.split('.');
  x1 = x[0];
  x2 = x.length > 1 ? '.' + x[1] : '';
  var rgx = /(\d+)(\d{3})/;
  while (rgx.test(x1)) {
    x1 = x1.replace(rgx, '$1' + ',' + '$2');
  }
  return x1 + x2;
}


$('.dropcat').live("click",function(e){
  e.stopPropagation();
  $('#myDropdown').toggle('fast');
  $("#myDropdown1").fadeOut('fast');
  $("#myDropdown2").fadeOut('fast');
});



$('#cmd_goto_fir').live("click",function(){
  $(".sec_create_form").hide();
  $(".fir_create_form").slideDown('fast');
});



$('#myDropdown a').live("click", function(){
  var value = $(this).attr("value");
  var cats = $(this).attr("ids");
  $('.cats').html(value);
  $("#myDropdown").fadeOut('fast');
  $(".products_div").css('opacity', '0.4');
  $.ajax({
    type : "GET",
    url : `${site_url}/products/?category=${cats}`,
    success : function(data){
      $('.products_div').html(data).css('opacity', 1);
    },error: function(data){
      $('.products_div').html(data).css('opacity', 1);
    }
  });
});


$('.cmd_done').live("click",function(){
  window.location = site_url;
});


$('#cmd_edit_order').live("click",function(){
  window.location = site_url + "/cart/";
});



$('#login').live("click",function(){
  $(".err_login").hide();
  var self = this;
  var results = '';
  $(self).attr('disabled', true).css({'opacity': '0.4'});
  
  $.ajax({
    type : "POST",
    url : site_url + "/login",
    data: $(".checkouts").serialize(),
    dataType: 'json',
    cache : false,
    success : function(data){
      $.each(data.message, function(){
        results += this + '<br>';
      });
      
      if(data.status == "success"){
        $('.login_forms').hide();
        $('.reg_forms').slideDown('fast');
        $('.already_reg').hide();
        $('.passes').hide();

        var fname = data.data['fname'];
        var lname = data.data['lname'];
        var email = data.data['email'];
        var phone = data.data['phone'];
        var countrys = data.data['countrys'];
        var state = data.data['state'];
        var address = data.data['addrs'];
        var user = data.data['id'];

        $('#user').val(user);
        $('#fname').val(fname);
        $('#lname').val(lname);
        $('#phone').val(phone);
        $('#email').val(email);
        $('#txtcountry').val(countrys);
        $('#state').val(state);
        $('#address').val(address);
        

        setTimeout(function(){
          $(".err_login").hide();
        },2500);

      }else{
      $(".err_login").show().html('<div class="Errormsg">'+data.message+'</div>');
      }
      $(self).removeAttr('disabled').css({'opacity': '1'});

    },error : function(data){
      $(self).removeAttr('disabled').css({'opacity': '1'});
      $(".err_login").show().html('<div class="Errormsg">Poor Network Connection!</div>');
    }
  });
});


$('.view_carts').live("click",function(){
  $cart_counts = $('#cart_counts').val();
  if($cart_counts > 0)
    window.location = site_url + "/cart/";
  else
    alert('Cart is empty! Please add to cart.');
});



$('.cmd_checkout').live("click",function(){
  $txtreattotls = $('#txtreattotls').val();
  if($txtreattotls > 0)
    window.location = site_url + "/checkout/";
  else
    alert('Cart is empty! Please add to cart.');
});


$('.remove1').live("click",function(){
  $ids = $(this).attr("ids");
  if($ids == "all"){
    if(confirm("Proceed to clear all items in your cart?")){
      $totalprice = $(this).attr("totalprice");
      $txtsubtotals = $('#txtsubtotals').val();
      $txtflats = $('#txtflats').val();
      $txtreattotls = $('#txtreattotls').val();
      $("#txttotal1"+$ids).val(0);

      $totalprice1 = parseInt($txtsubtotals) - parseInt($totalprice);
      $txtreattotls1 = parseInt($totalprice1) + parseInt($txtflats);
      
      $('.remove_div'+$ids).fadeOut('fast');
      $cart_counts = $('#cart_counts').val();

      $cart_counts1 = $cart_counts - 1;
      $('#cart_counts').val($cart_counts1);
      $('.counts1').html($cart_counts1);

      $('.shop_tbl').hide();
      $('.cart_totals').hide();
      $('.remove1').hide();
      $('.remove_java').show();
      $('.shop_tbl_java').fadeIn('fast');

      var datastring='ids='+$ids
      +'&_token='+token;
      
      $.ajax({
        type : "POST",
        url : site_url + "/remove-item",
        data: datastring,
        cache : false,
        success : function(html){
          
        }
      });
    }

  }else{
    $totalprice = $(this).attr("totalprice");
    $txtsubtotals = $('#txtsubtotals').val();
    $txtflats = $('#txtflats').val();
    $txtreattotls = $('#txtreattotls').val();
    $("#txttotal1"+$ids).val(0);

    $totalprice1 = parseInt($txtsubtotals) - parseInt($totalprice);
    $txtreattotls1 = parseInt($totalprice1) + parseInt($txtflats);
    
    $('.remove_div'+$ids).fadeOut('fast');
    $cart_counts = $('#cart_counts').val();

    $cart_counts1 = $cart_counts - 1;
    $('#cart_counts').val($cart_counts1);
    $('.counts1').html($cart_counts1);

    var datastring='ids='+$ids
    +'&_token='+token;

    $.ajax({
      type : "POST",
      url : site_url + "/remove-item",
      data: datastring,
      cache : false,
      success : function(html){
        
      }
    });
  }

  var total_sum = 0;
  setTimeout(function(){
    $(".shop_tbl .txttotal1").each(function(){
      var get_textbox_value = $(this).val();
      if($.isNumeric(get_textbox_value)) {
        total_sum += parseFloat(get_textbox_value);
      }
    });
  },500);
  

  setTimeout(function(){
    var real_sum = parseFloat(total_sum) + 3;
    $("#txtsubtotals").val(total_sum);
    $('#txtreattotls').val(real_sum);
    $(".subtotals").html(addCommas(total_sum));
    $('.real_totals').html(addCommas(real_sum));
    $('.final_total').html(addCommas(real_sum));
  },800);

});



$('.open_views').live("click",function(){
  $titles = $(this).attr("titles");
  $id = $(this).attr("id");
  window.location = site_url+"/view/"+$id+"/"+$titles+"/";
});


$('.add_to_basket').live("click",function(){
  var ids = $(this).attr("ids");
  $('#add_to_basket'+ids).css('opacity', '0.5');
  $title = $(this).attr("title");
  $price = $(this).attr("price");
  $main_qty = $(this).attr("main_qty");
  $image = $(this).attr("image");
  $qty = $('#txtqty'+ids).val();
  $('.item_name').html($title);
  
  var datastring='product='+ids
  +'&title='+$title
  +'&qty='+$qty
  +'&image='+$image
  +'&price='+$price
  +'&main_qty='+$main_qty
  +'&_token='+token;

  // alert(datastring);
  // return;

  $('.single_add_to_cart_button').html('<span class="fa fa-shopping-cart"></span> Adding...');

  $.ajax({
    type : "POST",
    url : site_url + "/add-cart",
    data: datastring,
    cache : false,
    success : function(data){
      if(data.status == "success"){
        $('.alert_cart_add').fadeIn('fast');

        $('#cart_counts').val(data.data);
        $('.counts1').html(data.data);

        setTimeout(function(){
          $('.alert_cart_add').fadeOut('fast');
        },3000);

      }else{
        alert(data);
      }
      $('.single_add_to_cart_button').html('<span class="fa fa-shopping-cart"></span> Add to cart');
      $('#add_to_basket'+ids).css('opacity', 1);
      // $('#add_to_basket1'+ids).hide();
    },error : function(data){
        $('#add_to_basket'+ids).css('opacity', 1);
        $('.single_add_to_cart_button').html('<span class="fa fa-shopping-cart"></span> Add to cart');
        console.log(data);
    }
  });
});


$('.dropsort').live("click",function(e){
  e.stopPropagation();
  $('#myDropdown1').toggle('fast');
  $("#myDropdown").fadeOut('fast');
  $("#myDropdown2").fadeOut('fast');
});


$('#myDropdown1 a').live("click", function(){
  var value = $(this).attr("value");
  $('.sorts').html(value);
  $("#myDropdown1").fadeOut('fast');
  $(".products_div").css('opacity', '0.4');
  $.ajax({
    type : "GET",
    url : `${site_url}/products/?sort=${value.replace(/\s+/g, '-').toLowerCase()}`,
    success : function(data){
      $('.products_div').html(data).css('opacity', 1);
    },error: function(data){
      $('.products_div').html(data).css('opacity', 1);
    }
  });
});


$('.dropprice').live("click",function(e){
  e.stopPropagation();
  $('#myDropdown2').toggle('fast');
  $("#myDropdown1").fadeOut('fast');
  $("#myDropdown").fadeOut('fast');
});


$('#myDropdown2 a').live("click", function(){
  var value = $(this).attr("value");
  $('.prices').html(value);
  $("#myDropdown2").fadeOut('fast');
  $(".products_div").css('opacity', '0.4');
  $.ajax({
    type : "GET",
    url : `${site_url}/products/?price=${value.replace(/\s+/g, '-').toLowerCase()}`,
    success : function(data){
      $('.products_div').html(data).css('opacity', 1);
    },error: function(data){
      $('.products_div').html(data).css('opacity', 1);
    }
  });
});


$('.closealert').live("click",function(){
  $('.alert_cart_add').fadeOut('fast');
});


$('.thumbs img').live("click",function(e){
  var src1 = $(this).attr("src");
  $('.show_imgs img').fadeOut('fast');
  setTimeout(function(){
    $('.show_imgs img').fadeIn('fast').attr('src', src1);
  },100);
});


$('.btn_delete').live("click",function(e){
  $('#delete_dv').show();
  var for_id = $(this).attr("for_id");
  var for_page = $(this).attr("for_page");
  $('#txtall_id').val(for_id);
  $('#txtall_page').val(for_page);
});



$(document).ready(function(){
  $(".accordion-demo").accordionjs({
    activeIndex : 1,     
    closeAble: false,
    closeOther  : true,  
    slideSpeed: 200
  });
});