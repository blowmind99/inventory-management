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
                          <th style="width: 100px;">Number</th>
                          <th>Date</th>
                          <th>Sell By</th>
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
                              <span class="text-muted">3 days ago</span>
                            </td>
                            <td>
                              <strong>Rose</strong>
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
                          <th style="width: 100px;">Number</th>
                          <th>Date</th>
                          <th>Purchase By</th>
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
                              <span class="text-muted">3 days ago</span>
                            </td>
                            <td>
                              <strong>Rose</strong>
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

                <div class="block-content block-content-full">
                  <div class="table-responsive">
                    <table class="table table-borderless table-hover table-striped table-vcenter mb-0">
                      <thead>
                        <tr>
                          <th style="width: 100px;">Number</th>
                          <th>Date</th>
                          <th>Sell By</th>
                        </tr>
                      </thead>
                      <tbody>
                        @for($i=0; $i<3; $i++)
                          <tr>
                            <td>
                              <a class="fw-semibold" href="javascript:void(0)">54874</a>
                            </td>
                            <td>
                              <span class="text-muted">3 days ago</span>
                            </td>
                            <td>
                              <strong>Rose</strong>
                            </td>
                          </tr>
                        @endfor
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
                          <th style="width: 100px;">Number</th>
                          <th>Date</th>
                          <th>Purchase By</th>
                        </tr>
                      </thead>
                      <tbody>
                        @for($i=0; $i<3; $i++)
                          <tr>
                            <td>
                              <a class="fw-semibold" href="javascript:void(0)">54874</a>
                            </td>
                            <td>
                              <span class="text-muted">3 days ago</span>
                            </td>
                            <td>
                              <strong>Rose</strong>
                            </td>
                          </tr>
                        @endfor
                      </tbody>
                    </table>
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
  
                  <div class="block-content block-content-full">
                    <div class="table-responsive">
                      <table class="table table-borderless table-hover table-striped table-vcenter mb-0">
                        <thead>
                          <tr>
                            <th style="width: 100px;">Number</th>
                            <th>Date</th>
                            <th>Sell By</th>
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
                                <span class="text-muted">3 days ago</span>
                              </td>
                              <td>
                                <strong>Rose</strong>
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
                          @for($i=0; $i<3; $i++)
                            <tr>
                              <td>
                                <a class="fw-semibold" href="javascript:void(0)">54874</a>
                              </td>
                              <td>
                                <span class="text-muted">3 days ago</span>
                              </td>
                              <td>
                                <strong>Rose</strong>
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
              <!-- END Purchase -->
            @endif
        </div>
      </main>
      
      <!-- Footer -->
      <footer id="page-footer">
        <div class="content py-3">
          <div class="row fs-sm">
            <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
              Crafted with <i class="fa fa-heart text-danger"></i> by <a class="fw-semibold" href="https://pixelcave.com" target="_blank">pixelcave</a>
            </div>
            <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
              <a class="fw-semibold" href="https://pixelcave.com/products/codebase" target="_blank">Codebase 5.7</a> &copy; <span data-toggle="year-copy"></span>
            </div>
          </div>
        </div>
      </footer>
      <!-- END Footer -->

    </div>
    
    <script src="{{ asset('/frontend/assets/js/codebase.app.min.js') }}"></script>
  </body>
</html>