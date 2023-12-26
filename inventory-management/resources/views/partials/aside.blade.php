<!-- Side Overlay-->
@section('content')
    <aside id="side-overlay">
        <!-- Side Header -->
        <div class="content-header bg-primary-dark">
        <!-- User Avatar -->
        <a class="img-link me-2" href="be_pages_generic_profile.html">
            <img class="img-avatar img-avatar32" src="assets/media/avatars/avatar11.jpg" alt="">
        </a>
        <!-- END User Avatar -->

        <!-- User Info -->
        <a class="link-fx text-white fw-semibold fs-sm" href="be_pages_generic_profile.html">
            Admin
        </a>
        <!-- END User Info -->

        <!-- Close Side Overlay -->
        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
        <button type="button" class="btn btn-sm btn-alt-danger ms-auto" data-toggle="layout" data-action="side_overlay_close">
            <i class="fa fa-fw fa-times"></i>
        </button>
        <!-- END Close Side Overlay -->
        </div>
        <!-- END Side Header -->

        <!-- Side Content -->
        <div class="content-side">
        <!-- Mini Stats -->
        <div class="block pull-t pull-x mb-0">
            <div class="block-content block-content-full block-content-sm bg-gd-dusk">
            <div class="row text-center">
                <div class="col-4">
                <div class="fs-sm fw-semibold text-uppercase text-white-75">Sales</div>
                <div class="fs-4 text-white">985</div>
                </div>
                <div class="col-4">
                <div class="fs-sm fw-semibold text-uppercase text-white-75">Tickets</div>
                <div class="fs-4 text-white">251</div>
                </div>
                <div class="col-4">
                <div class="fs-sm fw-semibold text-uppercase text-white-75">Projects</div>
                <div class="fs-4 text-white">39</div>
                </div>
            </div>
            </div>
        </div>
        <!-- END Mini Stats -->

        <!-- Upgrade Plan -->
        <div class="block pull-x">
            <div class="block-content block-content-full bg-danger-light">
            <p class="mb-1 d-flex justify-content-between">
                <a class="text-danger fw-medium fs-sm" href="javascript:void(0)">
                <i class="fa fa-arrow-circle-up opacity-50"></i> Upgrade
                </a>
                <span class="fs-sm text-danger">
                1.9GB from <strong>2TB</strong>
                </span>
            </p>
            <div class="progress mb-0" style="height: 5px;" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar bg-danger" style="width: 95%;">
                <span class="progress-bar-label"></span>
                </div>
            </div>
            </div>
        </div>
        <!-- END Upgrade Plan -->

        <!-- Search -->
        <div class="block pull-x">
            <div class="block-content block-content-full block-content-sm bg-body-light">
            <form>
                <div class="input-group">
                <input type="text" class="form-control" id="side-overlay-search" name="side-overlay-search" placeholder="Search..">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-fw fa-search"></i>
                </button>
                </div>
            </form>
            </div>
        </div>
        <!-- END Search -->

        <!-- Notifications -->
        <div class="block pull-x">
            <div class="block-header bg-body-light">
            <h3 class="block-title">Notifications</h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                <i class="si si-refresh"></i>
                </button>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
            </div>
            </div>
            <div class="block-content">
            <ul class="list list-activity mb-0">
                <li>
                <i class="si si-wallet text-success"></i>
                <div class="fs-sm fw-semibold">+$29 New sale</div>
                <div class="fs-sm">
                    <a href="javascript:void(0)">Admin Template</a>
                </div>
                <div class="fs-xs text-muted">5 min ago</div>
                </li>
                <li>
                <i class="si si-close text-danger"></i>
                <div class="fs-sm fw-semibold">Project removed</div>
                <div class="fs-sm">
                    <a href="javascript:void(0)">Best Icon Set</a>
                </div>
                <div class="fs-xs text-muted">26 min ago</div>
                </li>
                <li>
                <i class="si si-pencil text-info"></i>
                <div class="fs-sm fw-semibold">You edited the file</div>
                <div class="fs-sm">
                    <a href="javascript:void(0)">
                    <i class="fa fa-file-alt"></i> Docs.doc
                    </a>
                </div>
                <div class="fs-xs text-muted">3 hours ago</div>
                </li>
                <li>
                <i class="si si-plus text-success"></i>
                <div class="fs-sm fw-semibold">New user</div>
                <div class="fs-sm">
                    <a href="javascript:void(0)">StudioWeb - View Profile</a>
                </div>
                <div class="fs-xs text-muted">5 hours ago</div>
                </li>
                <li>
                <i class="si si-wrench text-warning"></i>
                <div class="fs-sm fw-semibold">App v5.5 is available</div>
                <div class="fs-sm">
                    <a href="javascript:void(0)">Update now</a>
                </div>
                <div class="fs-xs text-muted">8 hours ago</div>
                </li>
                <li>
                <i class="si si-user-follow text-pulse"></i>
                <div class="fs-sm fw-semibold">+1 Friend Request</div>
                <div class="fs-sm">
                    <a href="javascript:void(0)">Accept</a>
                </div>
                <div class="fs-xs text-muted">1 day ago</div>
                </li>
            </ul>
            </div>
        </div>
        <!-- END Notifications -->
        </div>
        <!-- END Side Content -->
    </aside>
@endsection
<!-- END Side Overlay -->