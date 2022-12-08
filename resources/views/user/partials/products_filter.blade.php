<section class="sec-product bg0 p-t-100 p-b-50">
 <div class="container">
  <div class="p-b-32">
   <h3 class="ltext-105 cl5 txt-center respon1">New Products</h3>
  </div>

  <!-- Tab01 -->
  <div class="tab01 mb-39">
   <!-- Nav tabs -->
   <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item p-b-10">
     <a class="nav-link active" data-toggle="tab" href="#all" role="tab">All</a>
    </li>

    @foreach ($categories as $category)
     <li class="nav-item p-b-10">
      <a class="nav-link" data-toggle="tab" href="#category{{ $category->id }}"
       role="tab">{{ $category->category_name_en }}</a>
     </li>
    @endforeach
   </ul>

   <!-- Tab panes -->
   <div class="tab-content p-t-50">


    <!-- All  Products -->
    <div class="tab-pane fade show active" id="all" role="tabpanel">
     <!-- Slide2 -->
     <div class="wrap-slick2">
      <div class="slick2">

       @foreach ($products as $product)
        @php
         $amount = $product->selling_price - $product->discount_price;
         $discount = ($amount / $product->selling_price) * 100;
        @endphp
        <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
         <!-- Block2 -->
         <div class="block2">
          <div class="block2-pic hov-img0">
           <img src="{{ asset($product->product_thumbnail) }}" alt="IMG-PRODUCT" />
     <button class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1"  id="{{ $product->id }}" onclick="productView(this.id)">

          Quick View

     </button>
           @if ($product->discount_price == null)
            <div class="tag new"><span>new</span></div>
           @else
            <div class="tag hot"><span>{{ round($discount) }}%</span></div>
           @endif
          </div>

          <div class="block2-txt flex-w flex-t p-t-14">
           <div class="block2-txt-child1 flex-col-l">
            <a href="{{ route('product.details',['id'=>$product->id, 'slug'=>$product->product_slug_en]) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
             {{ $product->product_name_en }} </a>
            <div class="product-price">
                @if ($product->discount_price == null)
                <span class="stext-105 cl3 price"> ${{ $product->selling_price }}
                </span>
                @else
                <span class="stext-105 cl3 price"> ${{ $product->discount_price }}
              </span>
                <span class="stext-105 cl3 price-before-discount">
                 ${{ $product->selling_price }}
                </span>
                 @endif

            </div>
           </div>

           <div class="block2-txt-child2 flex-r p-t-3">
            <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
             <i class="fa fa-heart"></i>
            </a>
           </div>
          </div>
         </div>
        </div>
       @endforeach


      </div>
     </div>
    </div>



    @foreach ($categories as $category)
     <!-- Featured Products -->
     <div class="tab-pane fade show" id="category{{ $category->id }}" role="tabpanel">
      <!-- Slide2 -->
      <div class="wrap-slick2">
       <div class="slick2">

        @php
         $catwiseProduct = App\Models\Product::where('category_id', $category->id)
             ->orderBy('id', 'DESC')
             ->get();
        @endphp

        @forelse ($catwiseProduct as $product)
         @php
          $amount = $product->selling_price - $product->discount_price;
          $discount = ($amount / $product->selling_price) * 100;
         @endphp

         <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
          <!-- Block2 -->
          <div class="block2">
           <div class="block2-pic hov-img0">
            <img src="{{ asset($product->product_thumbnail) }}" alt="IMG-PRODUCT" />

            <a href="#"
             class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" id="{{ $product->id }}" onclick="productView(this.id)">
             Quick View
            </a>

            @if ($product->discount_price == null)
             <div class="tag new"><span>new</span></div>
            @else
             <div class="tag hot"><span>{{ round($discount) }}%</span></div>
            @endif
           </div>

           <div class="block2-txt flex-w flex-t p-t-14">
            <div class="block2-txt-child1 flex-col-l">
             <a href="{{ route('product.details',['id'=>$product->id, 'slug'=>$product->product_slug_en]) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
              {{ $product->product_name_en }} </a>
             <div class="product-price">
                @if ($product->discount_price == null)
              <span class="stext-105 cl3 price"> ${{ $product->selling_price }}
              </span>
              @else
              <span class="stext-105 cl3 price"> ${{ $product->discount_price }}
            </span>
              <span class="stext-105 cl3 price-before-discount">
               ${{ $product->selling_price }}
              </span>
               @endif
             </div>
            </div>

            <div class="block2-txt-child2 flex-r p-t-3">
             <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
              <i class="fa fa-heart"></i>
             </a>
            </div>
           </div>
          </div>
         </div> <!--/.item-->
         @empty
         <h5 class="text-danger">
           NO PRODUCT FOUND.
         </h5>
        @endforelse
       </div>
      </div>
     </div>
    @endforeach
   </div>

  </div>


{{-- ////////////////////  FEATURED PRODUCTS   ///////////////////// --}}


<div class="p-b-32 mt-30">
    <h3 class="ltext-105 cl5 txt-center respon1">Featured Products</h3>
   </div>


    <!-- Tab panes -->
      <!-- Slide2 -->
      <div class="wrap-slick2">
       <div class="slick2">

        @foreach ($featured as $product)
         @php
          $amount = $product->selling_price - $product->discount_price;
          $discount = ($amount / $product->selling_price) * 100;
         @endphp
         <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
          <!-- Block2 -->
          <div class="block2">
           <div class="block2-pic hov-img0">
            <img src="{{ asset($product->product_thumbnail) }}" alt="IMG-PRODUCT" />

            <a href="#"
             class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" id="{{ $product->id }}" onclick="productView(this.id)">
             Quick View
            </a>
            @if ($product->discount_price == null)
             <div class="tag new"><span>new</span></div>
            @else
             <div class="tag hot"><span>{{ round($discount) }}%</span></div>
            @endif
           </div>

           <div class="block2-txt flex-w flex-t p-t-14">
            <div class="block2-txt-child1 flex-col-l">
             <a href="{{ route('product.details',['id'=>$product->id, 'slug'=>$product->product_slug_en]) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
              {{ $product->product_name_en }} </a>
             <div class="product-price">

                @if ($product->discount_price == null)
                <span class="stext-105 cl3 price"> ${{ $product->selling_price }}
                </span>
                @else
                <span class="stext-105 cl3 price"> ${{ $product->discount_price }}
              </span>
                <span class="stext-105 cl3 price-before-discount">
                 ${{ $product->selling_price }}
                </span>
                @endif

             </div>
            </div>

            <div class="block2-txt-child2 flex-r p-t-3">
             <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
              <i class="fa fa-heart"></i>
             </a>
            </div>
           </div>
          </div>
         </div>
        @endforeach

       </div>
      </div>

 </div>







 </div>
</section>
