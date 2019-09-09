



<script src="{{ URL::to('frontEnd/assets/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ URL::to('frontEnd/assets/js/popper.min.js') }}"></script>
<script src="{{ URL::to('frontEnd/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::to('frontEnd/assets/js/bootstrap-select.min.js') }}"></script>
<script src="{{ URL::to('frontEnd/assets/js/slick.js') }}"></script>
<script src="{{ URL::to('frontEnd/assets/js/jquery.nicescroll.min.js') }}"></script>
<script src="{{ URL::to('frontEnd/assets/js/parallax.min.js') }}"></script>
<script src="{{ URL::to('frontEnd/assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ URL::to('frontEnd/assets/js/script.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.4/build/alertify.min.js"></script>



<script !src="">
    $(document).ready(function () {


$('a.menu').click(function(){
    alert('active');
    $('a.menu').removeClass("active");
    $(this).addClass("active");
});

        $('#price_stand').change(function(){
            var data= $(this).val();
            // alert(data);
            $('#stand input').val(data);
            document.getElementById("stand").value = data;
            $.ajax({
                type:'get',
                url:'{{url('get/price')}}',
                data:{
                    data:data,
                    {{--_token: "{{ csrf_token() }}"--}}
                },
                success: function( msg ) {
                    console.log(msg);
                    $("#price_sp").val(msg);
                    $('#specil_price').hide();
                    $('#first_prcie').hide();
                    $('#price').html('');
                    $("#price").append("<b > "+msg+ "</b>");
                    console.log(msg)


                }
            });
        });

        $('#size_price').change(function(){
            var data= $(this).val();
            // alert(data);
            $('#size input').val(data);
            document.getElementById("size").value = data;


            $.ajax({
                type:'get',
                url:'{{url('get/price/size')}}',
                data:{
                    data:data,
                },
                success: function( msg ) {
                    console.log(msg);
                    // document.getElementById("price_sp").value =msg.price ;
                    $("#price_sp").val(msg);

                    $('#specil_price').hide();
                    $('#first_prcie').hide();
                    $('#price').html('');
                    $("#price").append("<b> "+msg+ "</b>");


                }
            });
        });


        /**
         * add to fav
         *
         *
         */

        $('#chose_seller').change(function(){
            var data= $(this).val();
            if(data == 5){

                document.getElementById("seller").style.display = "none";
                document.getElementById("seller_above_5").style.display = "block";
                // $("#").show();
            }else if(data == 4){
                document.getElementById("seller").style.display = "none";
                document.getElementById("seller_above_5").style.display = "none";
                document.getElementById("seller_above_4").style.display = "block";
            }else{
                // $("#seller").hide();
                document.getElementById("seller").style.display = "none";
                document.getElementById("seller_above_5").style.display = "none";
                document.getElementById("seller_above_4").style.display = "none";
                document.getElementById("seller_above_3").style.display = "block";

            }
            // alert(data);
        });

        /**
         * add to fav
         *
         *
         */
        $('.aaf').on("click",function(){
            var product_id =  $(this).attr("data-id");
            // alert(""+product_id);
            var id = "{{ @Auth::user()->id }}";
            if ( id == "") {
                // alert((id));btn_style2
                alertify.error("You Need to Login !");
                window.location.href = '{{url('login/we')}}';
            }else

            $.ajax({
                type:'POST',
                url:'{{url('fav')}}'+"/"+ product_id,
                data:{_token: "{{ csrf_token() }}"
                },
                success: function( msg ) {
               console.log(msg.data);
                    alertify.success(msg.ok);
                    location.reload(true);

                }
            });
            //post code
        });

        /**
         * check  promocode
         *
         *
         */
        $('#check').on("click",function(){
            var promocode = $("#promocode").val();
            var product_id = $("#data_product").val();
            var standard_gold_id = $("#standard_gold_id").val();
            var size_id = $("#size_id").val();

            // alert(promocode);
            $.ajax({
                type:'POST',
                url:'{{url('check/promo')}}',
                data:{
                    product_id:product_id,
                    size_id:size_id,
                    standard_gold_id:standard_gold_id,
                    promocode:promocode,
                    _token: "{{ csrf_token() }}"
                },
                success: function( msg ) {
               console.log(msg.status);
               if(msg.status == "Success"){
                   alertify.success(msg.ok);

               }else {
                   alertify.error(msg.ok)
               }

                }
            });
            //post code
        });



        /**
         * add to cart
         *
         *
         */


        $('.add_to_cart').on("click",function(){
            var product_id =  $(this).attr("data_id");
            var stand =  $(this).attr("data_stand");
            var size =  $(this).attr("data_size");
            var id = "{{ @Auth::user()->id }}";
            var price_sp = $("#price_sp").val();

            if ( id == "") {
                // alert((id));
                alertify.error("You Need to Login !");
                window.location.href = '{{url('login/we')}}';
            }else

                $.ajax({
                type:'get',
                url:'{{url('cart')}}',
                data:{
                    stand: stand,
                    price_sp: price_sp,
                    product_id: product_id,
                    size :size,
                    _token: "{{ csrf_token() }}"

                },
                success: function( msg ) {
                    console.log(msg.data);
                    alertify.success(msg.ok);
                    location.reload(true);

                }
            });
            //post code
        });

        /**
         * add to cart
         *
         *
         */


        $('.btn_cart_add').on("click",function(){
            var price_sp = $("#price_sp").val();
            if (price_sp == 'undefined') {
                price_sp= 0;
            }
            // alert(price_sp);
            var product_id =  $(this).attr("data_id");
            var stand = document.getElementById("stand").value;
            var cart_stand = document.getElementById("cart_stand").value;
            var cart_size = document.getElementById("cart_size").value;
            var size = document.getElementById("size").value;

            // alert(price_sp);

            // alert(""+product_id);
            var id = "{{ @Auth::user()->id }}";

            if ( id == "") {
                // alert((id));
                alertify.error("You Need to Login !");
                window.location.href = '{{url('login/we')}}';
            }else

                $.ajax({
                type:'get',
                url:'{{url('cart')}}',
                data:{
                    stand: stand,
                    price_sp: price_sp,
                    product_id: product_id,
                    cart_stand: cart_stand,
                    size :size,
                    cart_size :cart_size,
                    _token: "{{ csrf_token() }}"
                },
                success: function( msg ) {
                    console.log(msg.data);
                    alertify.success(msg.ok);
                    location.reload(true);

                }
            });
            //post code
        });

        /**
         * remove to cart
         *
         *
         */


        $('.trash').on("click",function(){
            var product_id =  $(this).attr("dataid");
            var data_stand =  $(this).attr("data_stand");
            var data_size =  $(this).attr("data_size");

            // alert(""+product_id);
            var id = "{{ @Auth::user()->id }}";

            if ( id == "") {
                // alert((id));
                alertify.error("You Need to Login !");
                window.location.href = '{{url('login/we')}}';
            }else

                $.ajax({
                type:'POST',
                url:'{{url('remove/cart')}}'+"/"+ product_id,
                data:{
                    data_stand:data_stand,
                    data_size:data_size,
                    _token: "{{ csrf_token() }}"
                },
                success: function( msg ) {
                    console.log(msg.data);
                    alertify.success(msg.ok);
                    location.reload(true);

                }
            });
            //post code
        });


        /**
         * min to cart
         *
         *
         */
        $('.minus').on("click",function(){
            var product_id =  $(this).attr("dataid_min");
            var data_stand =  $(this).attr("data_stand");
            var data_size =  $(this).attr("data_size");
            // alert(""+product_id);
            var id = "{{ @Auth::user()->id }}";

            if ( id == "") {
                // alert((id));
                alertify.error("You Need to Login !");
                window.location.href = '{{url('login/we')}}';
            }else

                $.ajax({
                type:'POST',
                url:'{{url('min/cart')}}'+"/"+ product_id,
                data:{
                    data_stand:data_stand,
                    data_size:data_size,
                    _token: "{{ csrf_token() }}"
                },
                success: function( msg ) {
                    console.log(msg.data);
                    alertify.success(msg.ok);
                    location.reload(true);

                }
            });
            //post code
        });

        /**
         * max to cart
         *
         *
         */
        $('.plus').on("click",function(){
            var product_id =  $(this).attr("dataid_plus");
            var data_stand =  $(this).attr("data_stand");
            var data_size =  $(this).attr("data_size");

            // alert(""+product_id);
            var id = "{{ @Auth::user()->id }}";
            if ( id == "") {
                // alert((id));
                alertify.error("You Need to Login !");
                window.location.href = '{{url('login/we')}}';
            }else

                $.ajax({
                type:'POST',
                url:'{{url('plus/cart')}}'+"/"+ product_id,
                data:{
                    data_stand:data_stand,
                    data_size:data_size,
                    _token: "{{ csrf_token() }}"
                },
                success: function( msg ) {
                    console.log(msg.data);
                    alertify.success(msg.ok);
                    location.reload(true);

                }
            });
        });
 /**
         * max to cart
         *
         *
         */
        $('#rang_price').on("click",function(){
            var price =  $(this).val();
            var product_id =  $(this).attr("data_id");
            var max =  $(this).attr("max");

            // alert(""+max);
            window.location.href = '{{url("products")}}'+'/'+product_id+'/'+'type='+'/'+'stand'+'/'+'style'+'/'+price+'/'+max;

        });


        /**
         * subscribe
         *
         *
         */
        $('.btn_style2').on("click",function(){
            var email =  $(".input_subscribe").val();

            $.ajax({
                type:'POST',
                url:'{{url('subscribe/send')}}',
                data:{
                    email:email,
                    _token: "{{ csrf_token() }}"
                },
                success: function( msg ) {
                        alertify.success(msg.ok);
                        $(this).val('');



                }
            });
        });


        /**
         * star5
         *
         *
         */
        $('#star5').on("click",function(){
            var star =  $("#star5").val();
            var order_id =  $(this).attr("data_id");
            $.ajax({
                type:'POST',
                url:'{{url('rate/create')}}',
                data:{
                    star:star,
                    order_id:order_id,
                    _token: "{{ csrf_token() }}",
                },
                success: function( msg ) {
                    console.log(msg);
                        alertify.success(msg.ok);
                    location.reload(true);

                }
            });
        });
        /**
         * star4
         *
         *
         */
        $('#star4').on("click",function(){
            var star =  $("#star4").val();
            var order_id =  $(this).attr("data_id");
            $.ajax({
                type:'POST',
                url:'{{url('rate/create')}}',
                data:{
                    star:star,
                    order_id:order_id,
                    _token: "{{ csrf_token() }}",
                },
                success: function( msg ) {
                    console.log(msg);
                        alertify.success(msg.ok);
                    location.reload(true);

                }
            });
        });
        /**
         * star3
         *
         *
         */
        $('#star3').on("click",function(){
            var star =  $("#star3").val();
            var order_id =  $(this).attr("data_id");
            $.ajax({
                type:'POST',
                url:'{{url('rate/create')}}',
                data:{
                    star:star,
                    order_id:order_id,
                    _token: "{{ csrf_token() }}",
                },
                success: function( msg ) {
                    console.log(msg);
                        alertify.success(msg.ok);
                    location.reload(true);

                }
            });
        });
        /**
         * star2
         *
         *
         */
        $('#star2').on("click",function(){
            var star =  $("#star2").val();
            var order_id =  $(this).attr("data_id");
            $.ajax({
                type:'POST',
                url:'{{url('rate/create')}}',
                data:{
                    star:star,
                    order_id:order_id,
                    _token: "{{ csrf_token() }}",
                },
                success: function( msg ) {
                    console.log(msg);
                        alertify.success(msg.ok);
                    location.reload(true);

                }
            });
        });

        /**
         * star1
         *
         *
         */
        $('#star1').on("click",function(){
            var star =  $("#star1").val();
            var order_id =  $(this).attr("data_id");
            $.ajax({
                type:'POST',
                url:'{{url('rate/create')}}',
                data:{
                    star:star,
                    order_id:order_id,
                    _token: "{{ csrf_token() }}",
                },
                success: function( msg ) {
                    console.log(msg);
                        alertify.success(msg.ok);
                    location.reload(true);

                }
            });
        });

        /**
         * action_delete
         *
         *
         */
        $('.action_del').on("click",function(){
            var order_id =  $(this).attr("order_id");
            // alert(order_id);
            $.ajax({
                type:'POST',
                url:'{{url('delete/order')}}',
                data:{
                    order_id:order_id,
                    _token: "{{ csrf_token() }}",
                },
                success: function( msg ) {
                    console.log(msg);
                        alertify.success(msg.ok);
                }
            });
        });




    });

</script>
