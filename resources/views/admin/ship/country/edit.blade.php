@extends('admin.admin_master')
@section('admin-content')
 <!-- Content Wrapper. Contains page content -->
 <div class="container-full">
  <!-- Main content -->
  <section class="content">
   <div class="row">
    {{-- EDIT country PAGE --}}
    <div class="col-12">
     <div class="box">
      <div class="box-header with-border">
       <h3 class="box-title">Edit country</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
       <div class="table-responsive">

        <form method="post" action="{{ route('country.update', $countries->id) }}">
         @csrf

         <div class="form-group">
          <h5>country Name</h5>
          <div class="controls">
           <input type="text" name="country_name" class="form-control" value="{{ $countries->country_name }}">
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
