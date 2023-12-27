@extends('partials.feature.layout')
@section('content')
    <main id="main-container">
        <div class="content">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Add Data Inventori</h3>
                </div>
                <div class="block-content">
                    <form action="{{ url('/dashboard/inventori/add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label class="form-label" for="example-text-input">Code</label>
                                    <input type="text" class="form-control" id="example-text-input" name="code" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="example-text-input">Name</label>
                                    <input type="text" class="form-control" id="example-text-input" name="name" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="example-text-input">Price</label>
                                    <input type="number" class="form-control" id="example-text-input" name="price" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="example-text-input">Stock</label>
                                    <input type="number" class="form-control" id="example-text-input" name="stock" required>
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