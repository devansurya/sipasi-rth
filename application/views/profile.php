<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
            <div class="col-6">
                <h3>Profile</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">                                       
                    <svg class="stroke-icon">
                        <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                    </svg></a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active"> Profile</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">My Profile</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row mb-2">
                                <div class="profile-title">
                                    <div class="media"><img class="img-70 rounded-circle" alt="" src="<?= base_url('')?>assets-admin/images/user/7.jpg">
                                    <div class="media-body">
                                        <h5 class="mb-1">MARK JECNO</h5>
                                        <p>Mahasiswa</p>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <div class="mb-3">
                                <label class="form-label">NIM</label>
                                <input class="form-control" type="number" placeholder="your-nim@domain.com">
                                </div>
                                <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input class="form-control" type="password" value="password">
                                </div>
                                <div class="form-footer">
                                <button class="btn btn-primary btn-block">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <form class="card">
                        <div class="card-header">
                        <h4 class="card-title mb-0">Edit Profile</h4>
                        <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input class="form-control" type="text" placeholder="Nama Lengkap">
                            </div>
                            </div>
                            <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <input class="form-control" type="text" placeholder="Alamat Lengkap">
                            </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input class="form-control" type="email" placeholder="Email">
                            </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Telp</label>
                                <input class="form-control" type="number" placeholder="No Telepon">
                            </div>
                            </div>
                            <div class="col-md-5">
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <select class="form-control btn-square">
                                <option value="0">--Select--</option>
                                <option value="1">Germany</option>
                                <option value="2">Canada</option>
                                <option value="3">Usa</option>
                                <option value="4">Aus</option>
                                </select>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="card-footer text-end">
                        <button class="btn btn-primary" type="submit">Update Profile</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>