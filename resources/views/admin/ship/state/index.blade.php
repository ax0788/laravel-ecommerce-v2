@extends('admin.admin_master')
@section('admin-content')
 <!-- Content Wrapper. Contains page content -->
 <div class="container-full">
  <!-- Main content -->
  <section class="content">
   <div class="row">
    <div class="col-8">
     <div class="box">
      <div class="box-header with-border">
       <h3 class="box-title">States List</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
       <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped">
         <thead>
          <tr>
           <th>Country Name</th>
           <th>State Name</th>
           <th>Action</th>
          </tr>
         </thead>
         <tbody>
          @foreach ($state as $item)
           <tr>
            <td>{{ $item->country->country_name }}</td>
            <td>{{ $item->state_name }}</td>
            <td width="40%">
             <a href="{{ route('state.edit', $item->id) }}" class="btn btn-info" title="Edit"><i
               class="fa fa-pencil"></i></a>
             <a href="{{ route('state.delete', $item->id) }}" class="btn btn-danger" id="delete"
              title="Delete"><i class="fa fa-trash"></i></a>
            </td>
           </tr>
          @endforeach
         </tbody>
        </table>
       </div>
      </div>
      <!-- /.box-body -->
     </div>
     <!-- /.box -->
    </div>
    <!-- /.col -->


    {{-- ADD state PAGE --}}
    <div class="col-4">
     <div class="box">
      <div class="box-header with-border">
       <h3 class="box-title">Add New State</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
       <div class="table-responsive">

        <form method="post" action="{{ route('state.store') }}">
         @csrf

         <div class="form-group">
          <h5>country Select <span class="text-danger">*</span></h5>
          <div class="controls">
           <select name="country_id" class="form-control">
            <option selected disabled>Select country</option>
            @foreach ($countries as $div)
             <option value="{{ $div->id }}">{{ $div->country_name }}
             </option>
            @endforeach
           </select>
           @error('country_id')
            <span class="text-danger">{{ $message }}</span>
           @enderror
          </div>
         </div>


         <div class="form-group">
          <h5>State Name</h5>
          <div class="controls">
           <input type="text" name="state_name" class="form-control">
           @error('state_name')
            <span class="text-danger">{{ $message }}</span>
           @enderror
          </div>
         </div>
         <div class="text-xs-right">
          <input type="submit" class="btn btn-rounded btn-info" value="Add state">
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
