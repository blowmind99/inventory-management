@extends('partials.feature.layout')
@section('content')
    <main id="main-container">
        <div class="content">
            @if(session('message'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <h3 class="alert-heading fs-5 fw-bold mb-1">Success</h3>
                    <p class="mb-0">
                        {{ session('message') }}
                    </p>
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <h3 class="alert-heading fs-5 fw-bold mb-1">Error</h3>
                    <p class="mb-0">
                        {{ session('error') }}
                    </p>
                </div>
            @endif
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Add Data Sales</h3>
                </div>
                <div class="block-content">
                    <form action="{{ url('/dashboard/sales/add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label class="form-label" for="example-text-input">Number</label>
                                    <input type="number" class="form-control" id="example-text-input" name="number" min="1" value="{{ old('number') }}" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="select2Multiple">Item</label>
                                    <select class="form-control" name="inventori_id">
                                        @foreach($inventory as $item)
                                            <option value="{{ $item->id }}" {{ old('inventori_id') == $item->id ? 'selected' : '' }}>{{ $item->code }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="datepicker">Date</label>
                                    <input type="text" class="form-control" id="datepicker" name="date" autocomplete="off" value="{{ old('date') }}" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="example-text-input">Price</label>
                                    <input type="number" class="form-control" id="example-text-input" name="price" value="{{ old('price') }}"required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="example-text-input">Quantity</label>
                                    <input type="number" class="form-control" id="example-text-input" name="qty" value="{{ old('qty') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mb-4">
                            <button type="submit" class="btn btn-lg btn-alt-primary">Add Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    
@endsection