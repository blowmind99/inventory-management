@extends('partials.feature.layout')
@section('content')
    <main id="main-container">
        <div class="content">
            <!-- Header -->
            <div class="block block-rounded bg-gd-dusk">
                <div class="block-content bg-white-5">
                    <div class="py-4 text-center">
                        <h1 class="h2 fw-bold text-white mb-2">Purchase</h1>
                        <h2 class="h5 fw-medium text-white-75">Welcome {{ ucfirst($user->username) }}, create something amazing!</h2>
                    </div>
                </div>
            </div>
            <div class="mb-4 d-flex justify-content-end">
                <a class="btn btn-lg btn-success" href="{{ url('/dashboard/purchase/create') }}">Add Data</a>
            </div>
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
            <!-- Inventori -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Purchase</h3>
                    <div class="d-flex">
                    <button class="btn btn-success btn-m" style="margin-right: 0.5rem">Excel</button>
                    <button class="btn btn-danger btn-m" style="margin-right: 0.5rem">PDF</button>
                    <button class="btn btn-warning btn-m">CSV</button>
                    </div>
                </div>

                <div class="block-content block-content-full">
                    <div class="table-responsive">
                        <table class="table table-borderless table-hover table-striped table-vcenter mb-0">
                            <thead>
                            <tr>
                                <th style="width: 100px;">Number</th>
                                <th>Date</th>
                                <th>Purchase By</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($purchase as $item)
                                <tr>
                                    <td>
                                        <a class="fw-semibold" href="javascript:void(0)">{{ $item->number }}</a>
                                    </td>
                                    <td>
                                        <a class="fw-semibold" href="javascript:void(0)">{{ $item->date }}</a>
                                    </td>
                                    <td>
                                        <a class="fw-semibold" href="javascript:void(0)">{{ $item->user->username }}</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-alt-secondary" href="{{ url('/dashboard/purchase/edit/'.encrypt($item->id)) }}">
                                            <i class="fa fa-pencil text-success me-1"></i> Edit
                                        </a>
                                        <a type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="modal" data-bs-target="#modal-fadeinshow{{ $item->id }}">
                                            <i class="fa fa-eye text-primary me-1"></i> Show
                                        </a>
                                        <a type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="modal" data-bs-target="#modal-fadein{{ $item->id }}">
                                            <i class="fa fa-trash text-danger me-1"></i> Delete
                                        </a>
                                    
                                    </td>
                                </tr>
                                <!--- Modal Delete -->
                                    <div class="modal fade" id="modal-fadein{{ $item->id }}" tabindex="-1" aria-labelledby="modal-fadein" style="display: none;" aria-modal="true" role="dialog">
                                        <div class="modal-dialog" role="document" >
                                            <div class="modal-content">
                                                <form action="{{ url('/dashboard/purchase/delete/'.$item->id) }}" enctype="multipart/form-data" method="post">
                                                    @csrf
                                                    <div class="block block-rounded shadow-none mb-0">
                                                        <div class="block-header block-header-default">
                                                            <h3 class="block-title">Delete  Data {{ $item->id }}</h3>
                                                            <div class="block-options">
                                                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                            </div>
                                                        </div>
                                                        <div class="block-content fs-sm">
                                                            <div class="text-center">
                                                                <img src="{{ asset('frontend/assets/media/sure.gif') }}" alt="" class="text-center mb-4">
                                                                <p class="text-info-emphasis fw-semibold">Are You Sure?</p>

                                                            </div>
                                                        </div>
                                                        <div class="block-content block-content-full block-content-sm text-end border-top">
                                                            <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                                                            Close
                                                            </button>
                                                            <button type="submit" class="btn btn-alt-primary" data-bs-dismiss="modal">
                                                            Done
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <!--- End Modal -->

                                <!--- Modal show -->
                                    <div class="modal fade" id="modal-fadeinshow{{ $item->id }}" tabindex="-1" aria-labelledby="modal-fadein" style="display: none;" aria-modal="true" role="dialog">
                                        <div class="modal-dialog" role="document" >
                                            <div class="modal-content">
                                            <div class="block block-rounded shadow-none mb-0">
                                                <div class="block-header block-header-default">
                                                    <h3 class="block-title">Show Data {{ $item->id }}</h3>
                                                    <div class="block-options">
                                                    <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                    </div>
                                                </div>
                                                @php
                                                    $data = App\Models\Purchase::find($item->id)->first();
                                                    $details = App\Models\PurchaseDetail::where('purchase_id', $item->id)->first();
                                                @endphp
                                                <div class="block-content fs-sm">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="mb-4">
                                                                <label class="form-label" for="example-text-input">Number</label>
                                                                <input type="text" class="form-control" id="example-text-input" name="code" value="{{ $data->number }}"readonly>
                                                            </div>
                                                            <div class="mb-4">
                                                                <label class="form-label" for="example-text-input">Date</label>
                                                                <input type="text" class="form-control" id="example-text-input" name="name" value="{{ $data->date }}" readonly>
                                                            </div>
                                                            <div class="mb-4">
                                                                <label class="form-label" for="example-text-input">Item</label>
                                                                    <input type="text" class="form-control" id="example-text-input" name="price" value="{{ $details->inventori->code }}" readonly>
                                                            </div>
                                                            <div class="mb-4">
                                                                <label class="form-label" for="example-text-input">Quantity</label>
                                                                <input type="number" class="form-control" id="example-text-input" name="stock" value="{{ $details->qty }}"readonly>
                                                            </div>
                                                            <div class="mb-4">
                                                                <label class="form-label" for="example-text-input">Price</label>
                                                                <input type="text" class="form-control" id="example-text-input" name="stock" value="Rp. {{ number_format(floatval($details->price), 0, ',', '.') }}"readonly>
                                                            </div>
                                                            <div class="mb-4">
                                                                <label class="form-label" for="example-text-input">Sell By</label>
                                                                <input type="text" class="form-control" id="example-text-input" name="stock" value="{{ $data->user->username }}"readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="block-content block-content-full block-content-sm text-end border-top">
                                                    <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                                                    Close
                                                    </button>
                                                    <button type="button" class="btn btn-alt-primary" data-bs-dismiss="modal">
                                                    Done
                                                    </button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                <!--- End Modal -->
                            @empty
                                <tr>
                                    <td colspan="5" class="fw-semibold text-muted text-center">Data Not Available</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <!-- END Inventori -->
            <!-- END Header -->
        </div>
    </main>
@endsection