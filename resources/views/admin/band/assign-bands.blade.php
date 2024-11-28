@extends('backend-master')

@section('breadCrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Bands</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Band Assign</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
           
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                       

                        <!-- /.card-header -->
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>   {{ session('success') }}  </strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                </div>
                            @endif



                            <form action="{!! url('bands/bandAssignStore') !!}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Choose Customer</label>
                                        <select type="text" class="form-control @error('customer') is-invalid @enderror" value="{{ old('customer') }}"
                                            name="customer" id="customer" placeholder="customer">
                                            <option value="">Select Customer   </option>
                                                @foreach ($customers as $customer)
                                                <option value="{{$customer->id}}"> {{$customer->name}}  </option>
                                                @endforeach
                                         
                                        </select>
                                        @error('customer')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group col-md-6">
                                
                                    <label for="band">Choose Band</label>
                                    <select  class="form-control @error('band') is-invalid @enderror" value="{{ old('band') }}"
                                        name="band" id="band" placeholder="band">
                                        <option value="">Select band   </option>
                                            @foreach ($bands as $band)
                                            <option value="{{$band->id}}"> {{$band->name}}  </option>
                                            @endforeach
                                     
                                    </select>
                                    @error('band')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                  
                                </div>
                              
                                
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                          
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                         
                        </div>
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->

            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->


        <div class="container-fluid">
           
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                      

                        <!-- /.card-header -->
                        <div class="card-body">
                          
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th style="width: 10px">SN</th>
                                        <th>Name</th>
                                        <th>Details</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th style="width: 40px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($assignedCustomers as $assignedCustomer)
                                        <tr>
                                            <td>1</td>
                                            <td>{{ $assignedCustomer->name }}</td>
                                            <td>{{ $assignedCustomer->email }}</td>
                                            <td>{{ $assignedCustomer->brandName }}</td>
                                            <td>{{ $assignedCustomer->contact_email }}</td>
                                            <td>{{ $assignedCustomer->status }}</td>
                                            <td>

                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                      
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                      <li>
                                                        <a class="dropdown-item" href="{{ url('admin/bands/editAssignedCustomer/'.$assignedCustomer->id) }}">Edit</a>
                                                       </li>
                                                   
                                                    </ul>
                                                  </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                              {{ $assignedCustomers->links() }}
                            {{-- <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul> --}}
                        </div>
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->

            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
    <!-- /.content -->
@endsection
