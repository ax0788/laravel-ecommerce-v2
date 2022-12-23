@extends('admin.admin_master')
@section('admin-content')
 <!-- Content Wrapper. Contains page content -->
 <div class="container-full">
  <!-- Main content -->
  <section class="content">
   <div class="row">
    {{-- Edit district PAGE --}}
    <div class="col-12">
     <div class="box">
      <div class="box-header with-border">
       <h3 class="box-title">Edit District</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
       <div class="table-responsive">

        <form method="post" action="{{ route('district.update', $district->id) }}">
         @csrf
         <div class="form-group">
          <h5>Select country <span class="text-danger">*</span></h5>
          <div class="controls">
           <select name="country_id" class="form-control">
            <option selected disabled>Select country</option>
            @foreach ($country as $div)
             <option value="{{ $div->id }}" {{ $div->id == $district->country_id ? 'selected' : '' }}>
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
          <h5>Select District <span class="text-danger">*</span></h5>
          <div class="controls">
           <select name="district_id" class="form-control">
            <option selected disabled>Select District</option>
            @foreach ($district as $dis)
             <option value="{{ $dis->id }}" {{ $dis->id == $district->district_id ? 'selected' : '' }}>
              {{ $dis->district_name }}
             </option>
            @endforeach
           </select>
           @error('district_id')
            <span class="text-danger">{{ $message }}</span>
           @enderror
          </div>
         </div>


         <div class="form-group">
          <h5>district Name</h5>
          <div class="controls">
           <input type="text" name="district_name" class="form-control" value="{{ $district->district_name }}">
           @error('district_name')
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
