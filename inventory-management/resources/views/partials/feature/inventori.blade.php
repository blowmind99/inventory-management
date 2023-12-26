@extends('partials.feature.layout')
@section('content')
    <main id="main-container">
        <div class="content">
            <!-- Header -->
            <div class="block block-rounded bg-gd-dusk">
                <div class="block-content bg-white-5">
                    <div class="py-4 text-center">
                        <h1 class="h2 fw-bold text-white mb-2">Inventori</h1>
                        <h2 class="h5 fw-medium text-white-75">Welcome {{ ucfirst($user->username) }}, create something amazing!</h2>
                    </div>
                </div>
            </div>
            <div class="mb-4 d-flex justify-content-end">
                <button class="btn btn-lg btn-success">Add Data</button>
            </div>
            <!-- Inventori -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Inventori</h3>
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
                                <th style="width: 100px;">Code</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for($i=0; $i<3; $i++)
                                <tr>
                                    <td>
                                    <a class="fw-semibold" href="javascript:void(0)">54874</a>
                                    </td>
                                    <td>
                                    <a class="fw-semibold" href="javascript:void(0)">awdawd</a>
                                    </td>
                                    <td>
                                    <a class="fw-semibold" href="javascript:void(0)">2000</a>
                                    </td>
                                    <td>
                                    <a class="fw-semibold" href="javascript:void(0)">200</a>
                                    </td>
                                    <td>
                                    <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)">
                                        <i class="fa fa-heartbeat text-danger me-1"></i> Medical History
                                    </a>
                                    </td>
                                </tr>
                                @endfor
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