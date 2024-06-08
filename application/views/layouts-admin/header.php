<!-- Page Header Start-->
<div class="page-header">
    <div class="header-wrapper row m-0">
        <form class="form-inline search-full col" action="#" method="get">
        <div class="form-group w-100">
            <div class="Typeahead Typeahead--twitterUsers">
            <div class="u-posRelative">
                <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Cuba .." name="q" title="" autofocus>
                <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
            </div>
            <div class="Typeahead-menu"></div>
            </div>
        </div>
        </form>
        <div class="header-logo-wrapper col-auto p-0">
        <div class="logo-wrapper"><a href="index.html"><img class="img-fluid" src="<?= base_url(); ?>/assets-admin/images/logo/logo.png" alt=""></a></div>
        <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
        </div>
        <div class="nav-right col-xxl-7 col-xl-6 col-md-7 col-8 pull-right right-header p-0 ms-auto">
        <ul class="nav-menus">
            <li>
            <div class="mode">
                <svg>
                <use href="<?= base_url(); ?>/assets-admin/svg/icon-sprite.svg#moon"></use>
                </svg>
            </div>
            </li>
            <?php if($this->session->userdata('id_role') == 3) { ?>
                <li class="onhover-dropdown">
                    <div class="notification-box">
                        <svg>
                            <use href="<?= base_url(); ?>/assets-admin/svg/icon-sprite.svg#notification"></use>
                            </svg><?php if(count($notifikasi) > 0) { ?><span class="badge rounded-pill badge-secondary"><?= count($notifikasi); ?> </span><?php } ?>
                        </div>
                        <div class="onhover-show-div notification-dropdown">
                            <h6 class="f-18 mb-0 dropdown-title">Notitications                               </h6>
                            <ul>
                                <?php if(!empty($notifikasi)){
                                    foreach ($notifikasi as $n) { ?>
                                        <?php if($n['type'] == 'pengaduan') : ?>
                                            <a class="mb-2 " href="<?= base_url("Pengaduan/detail_pengaduan/{$n['id_ref']}")?>?notif=<?= $n['id_notifikasi']; ?>">
                                                <?php else: ?>
                                                    <a class="mb-2 " href="<?= base_url("Reservasi/detail_reservasi/{$n['id_ref']}")?>?notif=<?= $n['id_notifikasi']; ?>">
                                                    <?php endif; ?>
                                                    <li class="b-l-<?= $n['color']; ?> border-4 text-start mb-2">
                                                        <p class="font-dark"><?= $n['pesan']; ?></p>
                                                        <p class="font-<?= $n['color']; ?>">
                                                            <?php if($n['jam'] > 0){ ?>

                                                                <?= $n['jam']; ?> jam

                                                            <?php }else{ ?>
                                                                <?php if($n['menit'] > 0){ ?>
                                                                    <?= $n['menit']; ?> menit
                                                                <?php }else{ ?>
                                                                    Baru saja
                                                                <?php } ?>
                                                            <?php } ?>

                                                        </p>
                                                    </li>
                                                </a>
                                            <?php }}else{ ?>
                                                <p class="text-center">Belum ada notifikasi</p>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </li>
                            <?php } ?>
        
            <li class="profile-nav onhover-dropdown pe-0 py-0">
            <div class="media profile-media"><img class="img-40 rounded-circle" src="<?= base_url('upload-profile/'. $profile['foto_profile'])?>" alt="">
                <div class="media-body"><span><?= $profile['nama'] ? $profile['nama'] : '-'; ?></span>
                    <p class="mb-0"><?= $this->session->userdata('role') ? $this->session->userdata('role') : ''; ?> <i class="middle fa fa-angle-down"></i></p>
                </div>
            </div>
            <ul style="margin-top: -25px" class="profile-dropdown onhover-show-div">
                <?php if($this->session->userdata('role') == 'Mahasiswa') : ?>
                    <li><a href="<?= base_url('User/Profile/' . $this->session->userdata('id')); ?>"><i data-feather="user"> </i><span>Profile</span></a></li>
                <?php endif;?>
                <li><a href="<?= base_url('Auth/logout'); ?>"><i data-feather="log-in"> </i><span>Log out</span></a></li>
            </ul>
            </li>
        </ul>
        </div>
        <script class="result-template" type="text/x-handlebars-template">
        <div class="ProfileCard u-cf">                        
        <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
        <div class="ProfileCard-details">
        <div class="ProfileCard-realName">{{name}}</div>
        </div>
        </div>
        </script>
        <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
    </div>
</div>
<!-- Page Header Ends -->