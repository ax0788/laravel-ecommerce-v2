@extends('user.main')

@section('content')
   <!-- Slider -->
   @include('user.partials.slider')

   <!-- Banner -->
 @include('user.partials.banner')

   <!-- Product Filter-->
  @include('user.partials.products_filter')
@endsection
