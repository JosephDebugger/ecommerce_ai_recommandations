@extends('backend-master')

@section('breadCrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
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
      @session('success')
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>{{ $value }}
              <button type="button" class="btn-close" data-bs-dismiss="alert"
                  aria-label="Close"></button>
      </div>
  @endsession
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Company Information</h3>
                        </div>

                        <!-- /.card-header -->
                       
                         
                            <section class="mt-3">
                              <div class="container ">
                                <div class="row justify-content-center align-items-center ">
                                  <div class="col-12 col-lg-9 col-xl-7">
                                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                                      <div class="card-body p-4 p-md-5">
                                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Company Setting </h3>
                                        <form action="{!! route('updateSettings',['id'=>  $company->id]) !!}" method="POST" enctype="multipart/form-data">
                            
                                          <div class="row">
                                            <div class="col-md-12 mb-2">
                            
                                              <div data-mdb-input-init class="form-outline">
                                                <label class="form-label" for="company_name">Company Name</label>
                                                <input type="text" id="company_name" name="company_name" class="form-control " value="{{ old('company_name', $company->company_name) }}" />

                                              </div>
                            
                                            </div>
                                           
                                          </div>
                            
                                          <div class="row">
                                            <div class="col-md-6 mb-3 d-flex align-items-center">
                            
                                              <div data-mdb-input-init class="form-outline datepicker w-100">
                                                <label for="phone" class="form-label">Phone</label>
                                                <input type="text" class="form-control " id="phone" name="phone"  value="{{ old('phone', $company->phone) }}"/>
                                                
                                              </div>
                            
                                            </div>
                                            <div class="col-md-6 mb-3 d-flex align-items-center">
                            
                                              <div data-mdb-input-init class="form-outline datepicker w-100">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control " id="email" name="email" value="{{ old('email', $company->email) }}"/>
                                              
                                              </div>
                            
                                            </div>
                                   
                                          </div>
                                          <div class="row">
                                            <div class="col-md-12 mb-3">
                                              <div data-mdb-input-init class="form-outline">
                                                <label class="form-label" for="address">Company Address</label>
                                                <textarea  id="address" name="address" class="form-control " />{{ old('address', $company->address) }}</textarea>
                                          
                                              </div>
                                            </div>
                                          </div>
                            
                                          <div class="row">
                                            <div class="col-md-6 mb-3 ">
                                              <div data-mdb-input-init class="form-outline">
                                                <label class="form-label" for="logo">Logo</label>
                                                <input type="file" id="logo" class="form-control" value="{{ old('logo', $company->logo) }}"/>
                                              
                                              </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-12 mb-3">
                                              <div data-mdb-input-init class="form-outline">
                                                <label class="form-label" for="description">Description</label>
                                                <textarea  id="description" class="form-control " />{{ old('name', $company->description) }}</textarea>
                                               
                                              </div>
                            
                                            </div>
                                           
                                          </div>
                                         
                                          <div class=" ">
                                            <input data-mdb-ripple-init class="btn btn-primary btn-lg" type="submit" value="Submit" />
                                          </div>
                            
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </section>
                      
                        <!-- /.card-body -->
                       
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->

            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
