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
                        <li class="breadcrumb-item active">Bands</li>
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
            <a href="{{ url('bands') }}"><button class="btn btn-primary">
                    Back
                </button></a>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Assigned Band</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{!! url('bands/UpdateAssignedCustomer') !!}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Choose Customer</label>
                                        <select type="text" class="form-control @error('customer') is-invalid @enderror"
                                            value="{{ old('customer') }}" name="customer" id="customer"
                                            placeholder="customer">
                                            <option value="">Select Customer </option>
                                            @foreach ($customers as $customer)
                                                @if ($customerInfo->id == $customer->id)
                                                    <option value="{{ $customer->id }}" selected> {{ $customer->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $customer->id }}"> {{ $customer->name }} </option>
                                                @endif
                                            @endforeach

                                        </select>
                                        @error('customer')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group col-md-6">

                                    <label for="band">Choose Band</label>
                                    <select class="form-control @error('band') is-invalid @enderror"
                                        value="{{ old('band') }}" name="band" id="band" placeholder="band">
                                        <option value="">Select band </option>
                                        @foreach ($bands as $band)
                                            @if ($customerInfo->band_id == $band->id)
                                                <option value="{{ $band->id }}" selected> {{ $band->name }} </option>
                                            @else
                                                <option value="{{ $band->id }}"> {{ $band->name }} </option>
                                            @endif
                                        @endforeach

                                    </select>
                                    @error('band')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror

                                </div>


                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->

            </div>
            <!-- /.row -->




            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
