@extends('partials.feature.layout')
@section('content')
    <main id="main-container">
        <div class="content">
            <div class="block block-rounded">
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
                <div class="block-header block-header-default">
                    <h3 class="block-title">Edit Data Inventori</h3>
                </div>
                <div class="block-content">
                    <form action="{{ url('/dashboard/inventori/edit/'.$data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label class="form-label" for="example-text-input">Code</label>
                                    <input type="text" class="form-control" id="example-text-input" name="code" value="{{ $data->code }}"required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="example-text-input">Name</label>
                                    <input type="text" class="form-control" id="example-text-input" name="name" value="{{ $data->name }}" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="example-text-input">Price</label>
                                    <input type="number" class="form-control" id="example-text-input" name="price" value="{{ $data->price }}" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="example-text-input">Stock</label>
                                    <input type="number" class="form-control" id="example-text-input" name="stock" value="{{ $data->stock }}"required>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mb-4">
                            <button type="submit" class="btn btn-lg btn-alt-success">Save Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    
@endsection