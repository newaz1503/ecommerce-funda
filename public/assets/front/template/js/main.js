
$(document).ready(function(){
    cartItemCount();
    //add to cart
    $(document).on('click', '.addToCart', function(){
        let product_id = $(this).closest('.product_details_box').find('.product_id').val();
        let product_qty = $(this).closest('.product_details_box').find('.qty').val();
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        $.ajax({
            type: "POST",
            url: "/add-to-cart",
            data: {
                'product_id': product_id,
                'product_qty': product_qty
            },
            success: function (response) {
                Toast.fire({
                    icon: 'success',
                    title: response.status
                })
                cartItemCount();
            }
        });
    });
    //cart items count
    function cartItemCount(){
        $.ajax({
            type: "GET",
            url: "/cart-item-count",
            success: function (response) {
                $('.cart_count').html('')
                $('.cart_count').html(response.count ?? 0)

            }
        });
    }
    //cart quantity increment
    $(document).on('click', '.cart_increment_btn', function(e){
        e.preventDefault();

        let inputValue = $(this).closest('.cart_wrap').find('.cart_qty_input').val();
        let parseValue = parseInt(inputValue, 10)
        let value = isNaN(parseValue) ? 0 : parseValue;
        if(value){
            value++;
            $(this).closest('.cart_wrap').find('.cart_qty_input').val(value);

        }
    })
    //cart quantity decrement
        $(document).on('click', '.cart_decrement_btn', function(e){
        e.preventDefault();

        let inputValue = $(this).closest('.cart_wrap').find('.cart_qty_input').val();
        let parseValue = parseInt(inputValue, 10)
        let value = isNaN(parseValue) ? 0 : parseValue;
        if(value > 1){
            value--;
            $(this).closest('.cart_wrap').find('.cart_qty_input').val(value);

        }
    })
    //cart quantity update
    $(document).on('click', '.changeQty', function(e){
        e.preventDefault();
        var pro_id = $(this).closest('.cart_wrap').find('.pro_id').val();
        var cartQty = $(this).closest('.cart_wrap').find('.cart_qty_input').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "cart-qty-update",
            data: {
                'product_id':pro_id,
                'cartQty':cartQty,
            },
            success: function (response) {
                Toast.fire({
                    icon: 'success',
                    title: response.status
                  })
                  $(".cart_item_div").load( location.href + ' .cart_item_div' );
                // window.location.reload();

            }
        });
    })

});

