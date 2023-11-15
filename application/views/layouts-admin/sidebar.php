<!-- Page Sidebar Start-->
<div class="sidebar-wrapper" sidebar-layout="stroke-svg">
    <div>
    <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light" src="<?= base_url(); ?>/assets-admin/images/logo/logo.png" alt=""><img class="img-fluid for-dark" src="<?= base_url(); ?>/assets-admin/images/logo/logo_dark.png" alt=""></a>
        <div class="back-btn"><i class="fa fa-angle-left"></i></div>
        <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
    </div>
    <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="<?= base_url(); ?>/assets-admin/images/logo/logo-icon.png" alt=""></a></div>
    <nav class="sidebar-main">
        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
        <div id="sidebar-menu">
        <ul class="sidebar-links" id="simple-bar">
            <li class="back-btn"><a href="index.html"><img class="img-fluid" src="<?= base_url(); ?>/assets-admin/images/logo/logo-icon.png" alt=""></a>
            <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
            </li>
            <li class="pin-title sidebar-main-title">
            <div> 
                <h6>Pinned</h6>
            </div>
            </li>
            <li class="sidebar-main-title">
            <div>
                <h6 class="lan-1">General</h6>
            </div>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="<?= base_url('Administrator')?>">
                <svg class="stroke-icon">
                <use href="<?= base_url(); ?>/assets-admin/svg/icon-sprite.svg#stroke-home"></use>
                </svg>
                <svg class="fill-icon">
                <use href="<?= base_url(); ?>/assets-admin/svg/icon-sprite.svg#fill-home"></use>
                </svg><span>Dashboard</span></a></li>

            <li class="sidebar-main-title">
            <div>
                <h6 class="lan-8">Applications</h6>
            </div>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="<?= base_url('Pengaduan')?>">
                <svg class="stroke-icon">
                <use href="<?= base_url(); ?>/assets-admin/svg/icon-sprite.svg#stroke-table"></use>
                </svg>
                <svg class="fill-icon">
                <use href="<?= base_url(); ?>/assets-admin/svg/icon-sprite.svg#fill-table"></use>
                </svg><span>Pengaduan</span></a></li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="<?= base_url('Administrator/kotak_saran')?>">
                <svg class="stroke-icon">
                <use href="<?= base_url(); ?>/assets-admin/svg/icon-sprite.svg#stroke-email"></use>
                </svg>
                <svg class="fill-icon">
                <use href="<?= base_url(); ?>/assets-admin/svg/icon-sprite.svg#fill-email"></use>
                </svg><span>Kotak Saran</span></a></li>
            <li class="sidebar-main-title">
            <div>
                <h6>User Management</h6>
            </div>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="<?= base_url('Administrator/user_management')?>">
                <svg class="stroke-icon">
                <use href="<?= base_url(); ?>/assets-admin/svg/icon-sprite.svg#stroke-user"></use>
                </svg>
                <svg class="fill-icon">
                <use href="<?= base_url(); ?>/assets-admin/svg/icon-sprite.svg#fill-user"></use>
                </svg><span>User management</span></a>
            </li>
        </ul>
        </div>
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </nav>
    </div>
</div>
<!-- Page Sidebar Ends-->