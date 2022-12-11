<header class="header-v2 box-shadow">
 <!-- Header desktop -->
 <div class="container-menu-desktop trans-03">
  <div class="wrap-menu-desktop">
   <nav class="limiter-menu-desktop">
    <!-- Logo desktop -->
    <a href="{{ route('home') }}" class="logo">
     <img src="{{ asset('frontend/images/icons/Ebso-logo/vector/default-monochrome.svg') }}" alt="IMG-LOGO" />
    </a>

    <!-- Menu desktop -->
    <div class="menu-desktop">
     <ul class="main-menu">
      <li class="active-menu">
       <a href="index.html">Categories</a>
       {{-- GET Category Table Data --}}
       @php
        $categories = App\Models\Category::orderBy('category_name_en', 'ASC')->get();
       @endphp
       <ul class="sub-menu">
        @foreach ($categories as $category)
         <li><a href="index.html">{{ $category->category_name_en }}
          </a>
          {{-- GET SubCategory Table Data --}}
          @php
           $subcategories = App\Models\SubCategory::where('category_id', $category->id)
               ->orderBy('subcategory_name_en', 'ASC')
               ->get();
          @endphp


            <ul class="sub-menu">
               @foreach ($subcategories as $subcategory)
            <li><a href="index.html"> {{ $subcategory->subcategory_name_en }}
             </a></li>
             @endforeach
           </ul>
         </li>
        @endforeach
       </ul>
      </li>

      <li>
       <a href="product.html">Featured</a>
      </li>

      <li>
       <a href="shoping-cart.html">Hot Deals</a>
      </li>

      <li>
       <a href="blog.html">Special Offers</a>
      </li>
     </ul>
    </div>

    <!-- Icon header -->
    <div class="wrap-icon-header flex-w flex-r-m h-full">
     <div class="flex-c-m h-full p-r-15">
      <div class="icon-header-item icon-lg cl2 hov-cl1 trans-04 p-lr-5 js-show-modal-search">
       <i class="zmdi zmdi-search"></i>
      </div>
     </div>

     <div class="flex-c-m h-full p-l-15 p-r-3 bor5">
      <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-5">
       @auth
        <a href="{{ route('profile.index') }}"><i class="fa fa-user m-l-7"></i></a>
        <span class="nav__link">{{ auth()->user()->first_name }}</span>
       @endauth
       @guest
        <a href="{{ route('login') }}"><i class="fa fa-user m-l-10"></i></a>
        <span class="nav__link">Login</span>
       @endguest
      </div>
     </div>
     <div class="flex-c-m h-full p-l-18 p-r-5 bor5">
      <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-4 icon-header-noti js-show-cart">
       <i class="zmdi zmdi-shopping-cart"></i>
       <span class="nav__link">Cart</span>
      </div>
     </div>

     <div class="flex-c-m h-full p-l-18 p-r-5 bor5">
      <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-5 p-r-5 icon-header-noti"
       data-notify="0">
       <i class="zmdi zmdi-favorite-outline"></i>
       <span class="nav__link">Wish</span>
      </a>
     </div>

     <div class="flex-c-m h-full p-lr-19">
      <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-8 js-show-sidebar">
       <i class="fa fa-bars"></i>
      </div>
     </div>
    </div>
   </nav>
  </div>
 </div>

 <!-- Header Mobile -->
 <div class="wrap-header-mobile">
  <!-- Logo moblie -->
  <div class="logo-mobile">
   <a href="index.html"><img src="{{ asset('frontend/images/icons/logo-01.png') }}" alt="IMG-LOGO" /></a>
  </div>

  <!-- Icon header -->
  <div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
   <div class="flex-c-m h-full p-r-5">
    <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-9 js-show-modal-search">
     <i class="zmdi zmdi-search"></i>
    </div>
   </div>

   <i class="fa fa-user"></i>

   <div class="flex-c-m h-full p-lr-5 bor5">
    <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-9 icon-header-noti js-show-cart" data-notify="2">
     <i class="zmdi zmdi-shopping-cart"></i>
    </div>
   </div>

   <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-9 p-r-11 icon-header-noti"
    data-notify="0">
    <i class="zmdi zmdi-favorite-outline"></i>
   </a>
  </div>

  <!-- Button show menu -->
  <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
   <span class="hamburger-box">
    <span class="hamburger-inner"></span>
   </span>
  </div>
 </div>

 <!-- Menu Mobile -->
 <div class="menu-mobile">
  <ul class="main-menu-m">
   <li>
    <a href="index.html">Categories</a>
    <ul class="sub-menu-m">
     <li><a href="index.html">Homepage 1</a></li>
     <li><a href="home-02.html">Homepage 2</a></li>
     <li><a href="home-03.html">Homepage 3</a></li>
    </ul>
    <span class="arrow-main-menu-m">
     <i class="fa fa-angle-right" aria-hidden="true"></i>
    </span>
   </li>

   <li>
    <a href="product.html">Features</a>
   </li>
   <li>
    <a href="product.html">Deals</a>
   </li>

   <li>
    <a href="shoping-cart.html" class="label1 rs1" data-label1="hot">What's New</a>
   </li>
  </ul>
 </div>

 <!-- Modal Search -->
 <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
  <div class="container-search-header">
   <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
    <img src="{{ asset('frontend/images/icons/icon-close2.png') }}" alt="CLOSE" />
   </button>

   <form class="wrap-search-header flex-w p-l-15">
    <button class="flex-c-m trans-04">
     <i class="zmdi zmdi-search"></i>
    </button>
    <input class="plh3" type="text" name="search" placeholder="Search..." />
   </form>
  </div>
 </div>
</header>
