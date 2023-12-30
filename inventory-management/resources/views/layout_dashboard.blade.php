<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>Inventory Management</title>

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Codebase - Bootstrap 5 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Codebase">
    <meta property="og:description" content="Codebase - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('/frontend/assets/media/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('/frontend/assets/media/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/frontend/assets/media/apple-touch-icon-180x180.png') }}">
    <!-- END Icons -->

    <!-- Stylesheets -->

    <!-- Codebase framework -->
    <link rel="stylesheet" id="css-main" href="{{ asset('/frontend/assets/css/codebase.min.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  </head>

  <body>
    <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content-boxed">
      @include('partials.aside')
      @include('partials.sidebar')
      @include('partials.header')
      
      <main id="main-container">
        <div class="content">
            <!-- Header -->
            <div class="block block-rounded bg-gd-dusk">
              <div class="block-content bg-white-5">
                  <div class="py-4 text-center">
                      <h1 class="h2 fw-bold text-white mb-2">Dashboard</h1>
                      <h2 class="h5 fw-medium text-white-75">Welcome {{ ucfirst($user->username) }}, create something amazing!</h2>
                  </div>
              </div>
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
            <!-- END Header -->
            @if($user->role == 'superadmin')
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
                          <th>Latest Stock</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($inventori as $inv)
                          <?php
                            $price = $inv->price;
                            $formattedPrice = 'Rp. ' . number_format(floatval($price), 0, ',', '.');
                          ?>
                          <tr>
                              <td>
                                  <a class="fw-semibold" href="javascript:void(0)">{{ $inv->code }}</a>
                              </td>
                              <td>
                                  <a class="fw-semibold" href="javascript:void(0)">{{ $inv->name }}</a>
                              </td>
                              <td>
                                  <a class="fw-semibold" href="javascript:void(0)">{{ $formattedPrice }}</a>
                              </td>
                              <td>
                                  <a class="fw-semibold" href="javascript:void(0)">{{ $inv->stock }}</a>
                              </td>
                              @if($inv->latest_stock == null )
                                <td>
                                  <a class="fw-semibold" href="javascript:void(0)">{{ $inv->stock }}</a>
                                </td>
                              @else
                                <td>
                                    <a class="fw-semibold" href="javascript:void(0)">{{ $inv->latest_stock }}</a>
                                </td>
                              @endif
                              <td>
                                  <a class="btn btn-sm btn-alt-secondary" href="{{ url('/dashboard/inventori/edit/'.encrypt($inv->id)) }}">
                                      <i class="fa fa-pencil text-success me-1"></i> Edit
                                  </a>
                                  <a type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="modal" data-bs-target="#modal-fadeinshow{{ $inv->id }}">
                                      <i class="fa fa-eye text-primary me-1"></i> Show
                                  </a>
                                  <a type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="modal" data-bs-target="#modal-fadein{{ $inv->id }}">
                                      <i class="fa fa-trash text-danger me-1"></i> Delete
                                  </a>
                              
                              </td>
                          </tr>
                          <!--- Modal Delete -->
                            <div class="modal fade" id="modal-fadein{{ $inv->id }}" tabindex="-1" aria-labelledby="modal-fadein" style="display: none;" aria-modal="true" role="dialog">
                              <div class="modal-dialog" role="document" >
                                  <div class="modal-content">
                                      <form action="{{ url('/dashboard/inventori/delete/'.$inv->id) }}" enctype="multipart/form-data" method="post">
                                          @csrf
                                          <div class="block block-rounded shadow-none mb-0">
                                              <div class="block-header block-header-default">
                                                  <h3 class="block-title">Delete  Data {{ $inv->id }}</h3>
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
                            <div class="modal fade" id="modal-fadeinshow{{ $inv->id }}" tabindex="-1" aria-labelledby="modal-fadein" style="display: none;" aria-modal="true" role="dialog">
                              <div class="modal-dialog" role="document" >
                                  <div class="modal-content">
                                    <div class="block block-rounded shadow-none mb-0">
                                        <div class="block-header block-header-default">
                                            <h3 class="block-title">Show Data {{ $inv->id }}</h3>
                                            <div class="block-options">
                                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-times"></i>
                                            </button>
                                            </div>
                                        </div>
                                        @php
                                          $data = App\Models\Inventori::find($inv->id);
                                        @endphp
                                        <div class="block-content fs-sm">
                                          <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-4">
                                                    <label class="form-label" for="example-text-input">Code</label>
                                                    <input type="text" class="form-control" id="example-text-input" name="code" value="{{ $data->code }}"readonly>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label" for="example-text-input">Name</label>
                                                    <input type="text" class="form-control" id="example-text-input" name="name" value="{{ $data->name }}" readonly>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label" for="example-text-input">Price</label>
                                                    <input type="number" class="form-control" id="example-text-input" name="price" value="{{ $data->price }}" readonly>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label" for="example-text-input">Stock</label>
                                                    <input type="number" class="form-control" id="example-text-input" name="stock" value="{{ $data->stock }}"readonly>
                                                </div>
                                                @if($data->latest_stock == null)
                                                  <div class="mb-4">
                                                    <label class="form-label" for="example-text-input">Latest Stock</label>
                                                    <input type="number" class="form-control" id="example-text-input" name="stock" value="{{ $data->stock }}"readonly>
                                                  </div>
                                                @else
                                                  <div class="mb-4">
                                                    <label class="form-label" for="example-text-input">Latest Stock</label>
                                                    <input type="number" class="form-control" id="example-text-input" name="stock" value="{{ $data->latest_stock }}"readonly>
                                                  </div>
                                                @endif
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

              <!-- Sales -->
              <div class="block block-rounded">
                <div class="block-header block-header-default">
                  <h3 class="block-title">Sales</h3>
                  
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
                          <th>Number</th>
                          <th>Date</th>
                          <th>Sales By</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($sales as $sls)
                          <tr>
                              <td>
                                  <a class="fw-semibold" href="javascript:void(0)">{{ $sls->number }}</a>
                              </td>
                              <td>
                                  <a class="fw-semibold" href="javascript:void(0)">{{ $sls->date }}</a>
                              </td>
                              <td>
                                  <a class="fw-semibold" href="javascript:void(0)">{{ $sls->users_id }}</a>
                              </td>
                              <td>
                                  <a class="btn btn-sm btn-alt-secondary" href="{{ url('/dashboard/sales/edit/'.encrypt($sls->id)) }}">
                                      <i class="fa fa-pencil text-success me-1"></i> Edit
                                  </a>
                                  <a type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="modal" data-bs-target="#modal-fadeinshowsl{{ $sls->id }}">
                                      <i class="fa fa-eye text-primary me-1"></i> Show
                                  </a>
                                  <a type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="modal" data-bs-target="#modal-fadeinsl{{ $sls->id }}">
                                      <i class="fa fa-trash text-danger me-1"></i> Delete
                                  </a>
                              
                              </td>
                          </tr>
                            <!--- Modal Delete -->
                            <div class="modal fade" id="modal-fadeinsl{{ $sls->id }}" tabindex="-1" aria-labelledby="modal-fadein" style="display: none;" aria-modal="true" role="dialog">
                              <div class="modal-dialog" role="document" >
                                  <div class="modal-content">
                                      <form action="{{ url('/dashboard/sales/delete/'.$sls->id) }}" enctype="multipart/form-data" method="post">
                                          @csrf
                                          <div class="block block-rounded shadow-none mb-0">
                                              <div class="block-header block-header-default">
                                                  <h3 class="block-title">Delete  Data {{ $sls->id }}</h3>
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
                            <div class="modal fade" id="modal-fadeinshowsl{{ $sls->id }}" tabindex="-1" aria-labelledby="modal-fadein" style="display: none;" aria-modal="true" role="dialog">
                              <div class="modal-dialog" role="document" >
                                  <div class="modal-content">
                                    <div class="block block-rounded shadow-none mb-0">
                                        <div class="block-header block-header-default">
                                            <h3 class="block-title">Show Data {{ $sls->id }}</h3>
                                            <div class="block-options">
                                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-times"></i>
                                            </button>
                                            </div>
                                        </div>
                                        @php
                                          $data = App\Models\Sales::find($sls->id)->first();
                                          $details = App\Models\SalesDetail::where('sales_id', $sls->id)->first();
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
              <!-- END Sales -->

              <!-- Purchase -->
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
                          <th>Number</th>
                          <th>Date</th>
                          <th>Purchase By</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($purchase as $prchs)
                          <tr>
                              <td>
                                  <a class="fw-semibold" href="javascript:void(0)">{{ $prchs->number }}</a>
                              </td>
                              <td>
                                  <a class="fw-semibold" href="javascript:void(0)">{{ $prchs->date }}</a>
                              </td>
                              <td>
                                  <a class="fw-semibold" href="javascript:void(0)">{{ $prchs->users_id }}</a>
                              </td>
                              <td>
                                  <a class="btn btn-sm btn-alt-secondary" href="{{ url('/dashboard/purchase/edit/'.encrypt($prchs->id)) }}">
                                      <i class="fa fa-pencil text-success me-1"></i> Edit
                                  </a>
                                  <a type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="modal" data-bs-target="#modal-fadeinps{{ $prchs->id }}">
                                      <i class="fa fa-eye text-primary me-1"></i> Show
                                  </a>
                                  <a type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="modal" data-bs-target="#modal-fadeinp{{ $prchs->id }}">
                                      <i class="fa fa-trash text-danger me-1"></i> Delete
                                  </a>
                              
                              </td>
                          </tr>
                          <!--- Modal Delete -->
                          <div class="modal fade" id="modal-fadeinp{{ $prchs->id }}" tabindex="-1" aria-labelledby="modal-fadein" style="display: none;" aria-modal="true" role="dialog">
                            <div class="modal-dialog" role="document" >
                                <div class="modal-content">
                                    <form action="{{ url('/dashboard/purchase/delete/'.$prchs->id) }}" enctype="multipart/form-data" method="post">
                                        @csrf
                                        <div class="block block-rounded shadow-none mb-0">
                                            <div class="block-header block-header-default">
                                                <h3 class="block-title">Delete  Data {{ $prchs->id }}</h3>
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
                          <div class="modal fade" id="modal-fadeinps{{ $prchs->id }}" tabindex="-1" aria-labelledby="modal-fadein" style="display: none;" aria-modal="true" role="dialog">
                            <div class="modal-dialog" role="document" >
                                <div class="modal-content">
                                  <div class="block block-rounded shadow-none mb-0">
                                      <div class="block-header block-header-default">
                                          <h3 class="block-title">Show Data {{ $prchs->id }}</h3>
                                          <div class="block-options">
                                          <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                              <i class="fa fa-times"></i>
                                          </button>
                                          </div>
                                      </div>
                                      @php
                                        $data = App\Models\Purchase::find($prchs->id)->first();
                                        $details = App\Models\PurchaseDetail::where('purchase_id', $prchs->id)->first();
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
              <!-- END Purchase -->
              
            @elseif($user->role == 'manager')

              <!-- Sales -->
              <div class="block block-rounded">
                <div class="block-header block-header-default">
                  <h3 class="block-title">Sales</h3>
                  
                  <div class="d-flex">
                    <button class="btn btn-success btn-m" style="margin-right: 0.5rem">Excel</button>
                    <button class="btn btn-danger btn-m" style="margin-right: 0.5rem">PDF</button>
                    <button class="btn btn-warning btn-m">CSV</button>
                  </div>
                </div>


              </div>
              <!-- END Sales -->

              <!-- Purchase -->
              <div class="block block-rounded">
                <div class="block-header block-header-default">
                  <h3 class="block-title">Purchase</h3>
                  
                  <div class="d-flex">
                    <button class="btn btn-success btn-m" style="margin-right: 0.5rem">Excel</button>
                    <button class="btn btn-danger btn-m" style="margin-right: 0.5rem">PDF</button>
                    <button class="btn btn-warning btn-m">CSV</button>
                  </div>
                </div>

                

              </div>
              <!-- END Purchase -->
            @elseif($user->role == 'sales')
                <!-- Sales -->
                <div class="block block-rounded">
                  <div class="block-header block-header-default">
                    <h3 class="block-title">Sales</h3>
                    
                    <div class="d-flex">
                      <button class="btn btn-success btn-m" style="margin-right: 0.5rem">Excel</button>
                      <button class="btn btn-danger btn-m" style="margin-right: 0.5rem">PDF</button>
                      <button class="btn btn-warning btn-m">CSV</button>
                    </div>
                  </div>
  
                  
  
                </div>

                </div>
                <!-- END Sales -->
            @elseif($user->role == 'purchase')
                <!-- Purchase -->
                <div class="block block-rounded">
                  <div class="block-header block-header-default">
                    <h3 class="block-title">Purchase</h3>
                    
                    <div class="d-flex">
                      <button class="btn btn-success btn-m" style="margin-right: 0.5rem">Excel</button>
                      <button class="btn btn-danger btn-m" style="margin-right: 0.5rem">PDF</button>
                      <button class="btn btn-warning btn-m">CSV</button>
                    </div>
                  </div>
  
                  
  
                </div>
              <!-- END Purchase -->
            @endif
        </div>
      </main>
      
      <!-- Footer -->
      <footer id="page-footer">
        <div class="content py-3">
          <div class="row fs-sm">
            <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
              Crafted with <i class="fa fa-heart text-danger"></i> by <a class="fw-semibold" href="https://www.linkedin.com/in/rifqifauzi158/" target="_blank">Rifqi</a>
            </div>
            <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
              <a class="fw-semibold" href="https://www.linkedin.com/in/rifqifauzi158/" target="_blank">Rifqi</a> &copy; <span data-toggle="year-copy"></span>
            </div>
          </div>
        </div>
      </footer>
      <!-- END Footer -->

    </div>
    
    <script src="{{ asset('/frontend/assets/js/codebase.app.min.js') }}"></script>
  </body>
</html>