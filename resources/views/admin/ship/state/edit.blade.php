@extends('admin.admin_master')
@section('admin-content')
 <!-- Content Wrapper. Contains page content -->
 <div class="container-full">
  <!-- Main content -->
  <section class="content">
   <div class="row">
    {{-- ADD country PAGE --}}
    <div class="col-12">
     <div class="box">
      <div class="box-header with-border">
       <h3 class="box-title">Edit Country</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
       <div class="table-responsive">

        <form method="post" action="{{ route('country.update', $country->id) }}">
         @csrf

         <div class="form-group">
          <h5>Country<span class="text-danger">*</span></h5>
          <div class="controls">
           <select name="country_id" class="form-control">
            <option selected disabled>Select Country</option>
            @foreach ($country as $div)
             <option value="{{ $div->id }}" {{ $div->id == $country->country_id ? 'selected' : '' }}>
              {{ $div->country_name }}
             </option>
            @endforeach
           </select>
           @error('country_id')
            <span class="text-danger">{{ $message }}</span>
           @enderror
          </div>
         </div>


         <div class="form-group">
          <h5>Country Name</h5>
          <div class="controls">
           <input type="text" name="country_name" class="form-control" value="{{ $country->country_name }}">
           @error('country_name')
            <span class="text-danger">{{ $message }}</span>
           @enderror
          </div>
         </div>
         <div class="text-xs-right">
          <input type="submit" class="btn btn-rounded btn-info" value="Update">
         </div>
        </form>
       </div>
      </div>
      <!-- /.box-body -->
     </div>
     <!-- /.box -->
    </div>
   </div>
   <!-- /.row -->
  </section>
  <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
@endsection
