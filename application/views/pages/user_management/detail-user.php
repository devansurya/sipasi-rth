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
                                        <div class="media"><img class="img-70 rounded-circle" alt="" src="<?= base_url('upload-profile/'. $profile_user['foto_profile'])?>">
                                        <div class="media-body">
                                            <h5 class="mb-1"><?= $profile_user['nama']; ?></h5>
                                            <p><?= $profile_user['role']; ?></p>
                                        </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">NIM</label>
                                            <input class="form-control" type="number" value="<?= $profile_user['nim']; ?>" disabled>
                                        </div>
                                    </div> -->
                                </div>
                                <!-- <div class="form-footer">
                                    <a href="<?= base_url('User/editProfile/'. $profile_user['id_user'])?>" class="btn btn-primary btn-block">Update</a>
                                </div> -->
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <form action="<?= base_url('UserManagement/aktivasiAkun')?>" method="POST" class="card">
                        <input type="hidden" value="<?= $profile_user['id_userprofile']; ?>" name="id_contact">
                        <input type="hidden" value="<?= $profile_user['id_user']; ?>" name="id_user">
                        <div class="card-header">
                        <h4 class="card-title mb-0">Edit Profile</h4>
                        <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input class="form-control" type="text" placeholder="Nama Lengkap" value="<?= $profile_user['nama']; ?>" name="nama" disabled>
                                </div>
                                </div>
                                <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Alamat</label>
                                    <input class="form-control" type="text" placeholder="Alamat Lengkap" value="<?= $profile_user['alamat']; ?>" name="alamat" disabled>
                                </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input class="form-control" type="email" placeholder="Email" value="<?= $profile_user['email']; ?>" name="email" disabled>
                                </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Telp</label>
                                    <input class="form-control" type="number" placeholder="No Telepon" value="<?= $profile_user['no_telp']; ?>" name="telp" disabled>
                                </div>
                                </div>
                                <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <select class="form-control btn-square" name="jenis_kelamin" disabled>
                                        <option value="">Jenis Kelamin</option>
                                        <option value="Perempuan" <?= ($profile_user['jenis_kelamin'] == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
                                        <option value="Laki-Laki" <?= ($profile_user['jenis_kelamin'] == 'Laki-laki') ? 'selected' : '' ?>>Laki - Laki</option>
                                    </select>
                                </div>
                                </div>
                                <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Aktivasi Akun</label>
                                    <select class="form-control btn-square" name="status">
                                        <option value="">Pilih Status</option>
                                        <option value="1" <?= ($profile_user['is_active'] == 1) ? 'selected' : '' ?>>Aktif</option>
                                        <option value="0" <?= ($profile_user['is_active'] != 1) ? 'selected' : '' ?>>Non Aktif</option>
                                    </select>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <a href="<?= base_url('UserManagement')?>" class="btn btn-danger">Kembali</a>
                            <button class="btn btn-primary" type="submit">Update Profile</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>