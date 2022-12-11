<!DOCTYPE html>
<html lang="en">

<head>
 <title>Ebso Shop</title>
 <meta charset="UTF-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1" />
 <meta name="csrf-token" content="{{ csrf_token() }}">

 <!--===============================================================================================-->
 <link rel="icon" type="image/png"
  href="{{ asset('frontend/images/icons/Ebso-logo/vector/default-monochrome.svg') }}" />
 <!--===============================================================================================-->
 <link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}" />
 <!--===============================================================================================-->
 <link rel="stylesheet" type="text/css"
  href="{{ asset('frontend/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}" />
 <!--===============================================================================================-->
 <link rel="stylesheet" type="text/css"
  href="{{ asset('frontend/fonts/iconic/css/material-design-iconic-font.min.css') }}" />
 <!--===============================================================================================-->
 <link rel="stylesheet" type="text/css" href="{{ asset('frontend/fonts/linearicons-v1.0.0/icon-font.min.css') }}" />
 <!--===============================================================================================-->
 <link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/animate/animate.css') }}" />
 <!--===============================================================================================-->
 <link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/css-hamburgers/hamburgers.min.css') }}" />
 <!--===============================================================================================-->
 <link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/animsition/css/animsition.min.css') }}" />
 <!--===============================================================================================-->
 <link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/select2/select2.min.css') }}" />
 <!--===============================================================================================-->
 <link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/daterangepicker/daterangepicker.css') }}" />
 <!--===============================================================================================-->
 <link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/slick/slick.css') }}" />
 <!--===============================================================================================-->
 <link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/MagnificPopup/magnific-popup.css') }}" />
 <!--===============================================================================================-->
 <link rel="stylesheet" type="text/css"
  href="{{ asset('frontend/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" />
 <!--===============================================================================================-->
 <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/util.css') }}" />
 <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/main.css') }}" />
 <!--===============================================================================================-->

 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">


 <link rel="stylesheet" type="text/css"
  href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.15/sweetalert2.css
    ">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.15/sweetalert2.min.js"></script>
</head>


<body>
 <!-- Header -->
 @include('user.partials.header')

 <!-- Sidebar -->
 @include('user.partials.sidebar')

 <!-- Cart -->
 @include('user.partials.cart')

 {{-- Content --}}
 @yield('content')




 <!-- Footer -->
 @include('user.partials.footer')

 <!-- Back to top -->
 <div class="btn-back-to-top" id="myBtn">
  <span class="symbol-btn-back-to-top">
   <i class="zmdi zmdi-chevron-up"></i>
  </span>
 </div>

 <!-- Modal1 -->
 @include('user.partials.modal')

 <!--===============================================================================================-->
 <script src="{{ asset('frontend/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
 <!--===============================================================================================-->
 <script src="{{ asset('frontend/vendor/animsition/js/animsition.min.js') }}"></script>
 <!--===============================================================================================-->
 <script src="{{ asset('frontend/vendor/bootstrap/js/popper.js') }}"></script>
 <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
 <!--===============================================================================================-->
 <script src="{{ asset('frontend/vendor/select2/select2.min.js') }}"></script>
 <script>
  $(".js-select2").each(function() {
   $(this).select2({
    minimumResultsForSearch: 20,
    dropdownParent: $(this).next(".dropDownSelect2"),
   });
  });
 </script>
 <!--===============================================================================================-->
 <script src="{{ asset('frontend/vendor/daterangepicker/moment.min.js') }}"></script>
 <script src="{{ asset('frontend/vendor/daterangepicker/daterangepicker.js') }}"></script>
 <!--===============================================================================================-->
 <script src="{{ asset('frontend/vendor/slick/slick.min.js') }}"></script>
 <script src="{{ asset('frontend/js/slick-custom.js') }}"></script>
 <!--===============================================================================================-->
 <script src="{{ asset('frontend/vendor/parallax100/parallax100.js') }}"></script>
 <script>
  $(".parallax100").parallax100();
 </script>
 <!--===============================================================================================-->
 <script src="{{ asset('frontend/vendor/MagnificPopup/jquery.magnific-popup.min.js') }}"></script>
 <script>
  $(".gallery-lb").each(function() {
   // the containers for all your galleries
   $(this).magnificPopup({
    delegate: "a", // the selector for gallery item
    type: "image",
    gallery: {
     enabled: true,
    },
    mainClass: "mfp-fade",
   });
  });
 </script>
 <!--===============================================================================================-->
 <script src="{{ asset('frontend/vendor/isotope/isotope.pkgd.min.js') }}"></script>
 <!--===============================================================================================-->





 <script src="{{ asset('frontend/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
 <script>
  $(".js-pscroll").each(function() {
   $(this).css("position", "relative");
   $(this).css("overflow", "hidden");
   var ps = new PerfectScrollbar(this, {
    wheelSpeed: 1,
    scrollingThreshold: 1000,
    wheelPropagation: false,
   });

   $(window).on("resize", function() {
    ps.update();
   });
  });
 </script>
 <!--===============================================================================================-->
 <script src="{{ asset('frontend/js/main.js') }}"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
 <script>
  @if (Session::has('message'))
   var type = "{{ Session::get('alert-type', 'info') }}"
   switch (type) {
    case 'info':
     toastr.info(" {{ Session::get('message') }} ");
     break;

    case 'success':
     toastr.success(" {{ Session::get('message') }} ");
     break;

    case 'warning':
     toastr.warning(" {{ Session::get('message') }} ");
     break;

    case 'error':
     toastr.error(" {{ Session::get('message') }} ");
     break;
   }
  @endif
 </script>







 <script>
  $.ajaxSetup({
   headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
  })

  //   Start Product View with Modal
  function productView(id) {

   $.ajax({
    type: 'GET',
    url: '/product/view/modal/' + id,
    dataType: 'json',
    success: function(data) {
     /* $('#multiImage').attr('src', '/' + data.multiImage[0].photo_name); */
     $('#pname').text(data.product.product_name_en);
     $('#price').text(data.product.selling_price);
     $('#short_descp').text(data.product.short_descp);
     $('#code').text(data.product.product_code);
     $('#category').text(data.product.category.category_name_en);
     $('#brand').text(data.product.brand.brand_name_en);
     $('#image').attr('src', '/' + data.product.product_thumbnail);

     $('#product_id').val(id);
     $('#qty').val(1);

     //  Product Price
     if (data.product.discount_price == null) {
      $('#pprice').text('');
      $('#oldprice').text('');
      $('#pprice').text(data.product.selling_price);
     } else {
      $('#pprice').text(data.product.discount_price);
      $('#oldprice').text(data.product.selling_price);
     } //End Product Price

     //  Stock Option
     if (data.product.product_qty > 0) {
      $('#available').text('');
      $('#stockout').text('');
      $('#available').text('available');
     } else {
      $('#available').text('');
      $('#stockout').text('');
      $('#stockout').text('stockout');
     } //End Stock Option



     //  Color
     $('select[name="color"]').empty();
     $.each(data.color, function(key, value) {
      $('select[name = "color"]').append('<option value=" ' + value + ' "> ' + value + ' </option>')
     })
     //  Size
     $('select[name="size"]').empty();
     $.each(data.size, function(key, value) {
      $('select[name = "size"]').append('<option value=" ' + value + ' "> ' + value + ' </option>');

      if (data.size == "") {
       $('#sizeArea').hide();
      } else {
       $('#sizeArea').show();

      }
     })
    }
   })
  }
  //End Product Modal View

  //START Add to Cart
  function addToCart() {
   const product_name = $('#pname').text();
   const id = $('#product_id').val();
   const color = $('#color option:selected').text();
   const size = $('#size option:selected').text();
   const quantity = $('#qty').val();
   $.ajax({
    type: "POST",
    dataType: 'json',
    data: {
     product_name: product_name,
     color: color,
     size: size,
     quantity: quantity,
    },
    url: "/cart/data/store/" + id,
    success: function(data) {
     $('#closeModal').click();
     miniCart();

     // Start Message
     const Toast = Swal.mixin({
      toast: true,
      position: 'bottom-end',
      background: '#000',
      color: '#fff',
      icon: 'success',
      showConfirmButton: false,
      timer: 4000,
     })
     if ($.isEmptyObject(data.error)) {
      Toast.fire({
       type: 'success',
       title: data.success,
      })
     } else {
      Toast.fire({
       type: 'error',
       title: data.error,
      })

     }
     //End Message
    }
   })
  }
  //END Add to Cart
 </script>

 {{-- START ADD TO MINI CART --}}
 <script>
  function miniCart() {
   $.ajax({
    type: "GET",
    dataType: 'json',
    url: "/product/mini/cart",
    success: function(response) {
     let miniCart = "";
     $.each(response.cartData, function(key, value) {
      $('span[id="cartSubTotal"]').text(response.cartTotal);
      $('#cartQty').text(response.cartQty);

      miniCart +=
       `     <li class="header-cart-item flex-w flex-t m-b-12">
                <div class="row align-items-center">
                  <div class="col">

                    <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)" class="text-danger"><i class="fa fa-trash fa-2x"></i></button>

                    </div>
                  <div class="col">

                    <div class="header-cart-item-img" >
              <img src="/${value.options.image}" alt="IMG" />
                     </div>

                    </div>


                    </div>


            <div class="header-cart-item-txt p-t-8">
              <a
                href="#"
                class="header-cart-item-name m-b-18 hov-cl1 trans-04"
              >
              ${value.name}
              </a>

              <span class="header-cart-item-info"> ${value.price} * ${value.qty} </span>


            </div>
          </li>
          `
     });
     $('#miniCart').html(miniCart);
    }
   })

  }
  miniCart();
  // End Add to MiniCart

  //Start  MiniCart Remove
  function miniCartRemove(rowId) {
   $.ajax({
    type: 'GET',
    url: '/product/minicart/remove/' + rowId,
    dataType: 'json',
    success: function(data) {
     miniCart();
     // Start Message
     const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      icon: 'success',
      showConfirmButton: false,
      timer: 3000
     })
     if ($.isEmptyObject(data.error)) {
      Toast.fire({
       type: 'success',
       title: data.success
      })
     } else {
      Toast.fire({
       type: 'error',
       title: data.error
      })
     }
     // End Message
    }
   });
   miniCart();
  }

  //   END MiniCart Remove
 </script>

  {{-- START  Add To WISHLIST --}}
  <script>
    function addToWishList(product_id) {
     $.ajax({
      type: 'POST',
      dataType: 'json',
      url: '/add-to-wishlist/' + product_id,
      success: function(data) {
       // Start Message
       const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
       })
       if ($.isEmptyObject(data.error)) {
        Toast.fire({
         type: 'success',
         icon: 'success',
         title: data.success
        })
       } else {
        Toast.fire({
         type: 'error',
         icon: 'error',
         title: data.error
        })
       }
       // End Message
      }
     });
    }
   </script>
   {{-- END Add To WISHLIST --}}

    {{-- START WISHLIST PAGE DATA --}}
 <script>
    function wishlist() {
     $.ajax({
      type: "GET",
      dataType: 'json',
      url: '/user/get-wishlist-product',
      success: function(response) {
       let rows = "";
       $.each(response, function(key, value) {
        rows +=
         `  <tr>
            <td class="col-md-2"><img src="/${value.product.product_thumbnail} " alt="imga"></td>
            <td class="col-md-7">
             <div class="product-name"><a href="#">${value.product.product_name_en}</a></div>
             <div class="price">
              ${value.product.discount_price == null
              ? `${value.product.selling_price}`
                  : `${value.product.discount_price} <span>${value.product.selling_price}</span>
                                                                                                                                                                                                                                                        `
              }
             </div>
            </td>
            <td class="col-md-2">
              <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal"
                  data-target="#exampleModal" id="${value.product_id}" onclick="productView(this.id)">Add to Cart</button>
            </td>
            <td class="col-md-1 close-btn">
             <button type="submit" id="${value.id}" onclick="wishlistRemove(this.id)" class="text-danger"><i class="fa fa-times"></i></button>
            </td>
           </tr>
            `
       });
       $('#wishlist').html(rows);
      }
     })

    }
    wishlist();
    /*   {{-- END WISHLIST PAGE DATA --}}
     */
    //Start  Wishlist Remove
    function wishlistRemove(id) {
     $.ajax({
      type: 'GET',
      url: '/user/wishlist-remove/' + id,
      dataType: 'json',
      success: function(data) {
       wishlist();
       // Start Message
       const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
       })
       if ($.isEmptyObject(data.error)) {
        Toast.fire({
         type: 'success',
         icon: 'success',
         title: data.success
        })
       } else {
        Toast.fire({
         type: 'error',
         icon: 'error',
         title: data.error
        })
       }
       // End Message
      }
     });
    }
   </script>
   {{-- //   END Wishlist Remove --}}

</body>

</html>
