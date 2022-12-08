 <!-- Sidebar -->
 <aside class="wrap-sidebar js-sidebar">
    <div class="s-full js-hide-sidebar"></div>

    <div class="sidebar flex-col-l p-t-22 p-b-25">
      <div class="flex-r w-full p-b-30 p-r-27">
        <div
          class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-sidebar"
        >
          <i class="zmdi zmdi-close"></i>
        </div>
      </div>

      <div class="sidebar-content flex-w w-full p-lr-65 js-pscroll">
        <ul class="sidebar-link w-full">


          <li class="p-b-13">
            <a href="#" class="stext-102 cl2 hov-cl1 trans-04">
               Account
            </a>
          </li>

          <li class="p-b-13">
            <a href="#" class="stext-102 cl2 hov-cl1 trans-04">
               Wishlist
            </a>
          </li>

          <li class="p-b-13">
            <a href="#" class="stext-102 cl2 hov-cl1 trans-04"> Orders </a>
          </li>

          <li class="p-b-13">
            <a href="{{ route('logout') }}"  onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" class="stext-102 cl2 hov-cl1 trans-04"> Sign Out </a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
               </form>
          </li>
        </ul>
      </div>
    </div>
  </aside>