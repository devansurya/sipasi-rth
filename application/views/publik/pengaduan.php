<section class="wrapper bg-gray">
  <div class="container py-3 py-md-5">
    <nav class="d-inline-block" aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="<?= base_url('Home'); ?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Pengaduan</li>
      </ol>
    </nav>
    <!-- /nav -->
  </div>
  <!-- /.container -->
</section>
<!-- /section -->
<section class="wrapper bg-light">
  <div class="container py-10 py-md-10">
    <div class="row gx-md-8 gx-xl-12 gy-8">
      <h2 class="display-6 fs-30">Semua Pengaduan</h2>
      <aside class="col-lg-3 sidebar">
        <div class="widget mt-1">
          <h4 class="widget-title mb-3">Kategori</h4>
          <?php foreach ($kategori as $k) { ?>
            <div class="form-check mb-1">
              <input class="form-check-input kategori-filter" type="checkbox" value="<?= $k['id_jenispengaduan']; ?>" <?php if(empty($kategori_filter)) { echo 'checked'; } ?> <?php if(in_array($k['id_jenispengaduan'], $kategori_filter)) { echo 'checked'; } ?>>
              <label class="form-check-label"><?= $k['jenis_pengaduan']; ?> <span class="fs-sm text-muted ms-1">(<?= $k['total']; ?>)</span></label>
            </div>
          <?php } ?>
        </div>
        <!-- /.widget -->
        <div class="widget">
          <h4 class="widget-title mb-3">Status</h4>
          <?php foreach ($status as $s) { ?>
            <div class="form-check mb-1">
              <input class="form-check-input status-filter" type="checkbox" value="<?= $s['id_status']; ?>" <?php if(empty($status_filter)) { echo 'checked'; } ?> <?php if(in_array($s['id_status'], $status_filter)) { echo 'checked'; } ?>>
              <label class="form-check-label"><?= $s['status']; ?> <span class="fs-sm text-muted ms-1">(<?= $s['total']; ?>)</span></label>
            </div>
          <?php } ?>
          <!-- /.row -->
        </div>
        <!-- /.widget -->
        <div class="widget">
        <button type="button" id="btn-filter" class="btn btn-primary btn-sm rounded-pill w-100">Filter</button>
      </div>
      </aside>
      <div class="col-lg-9 pengaduan-content" id="row-pengaduan">
        <?php if(!empty($pengaduan)){ ?>
          <?php foreach ($pengaduan as $p) { ?>
            <div class="card card-border-end border-primary mb-2 pengaduan-card">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="swiper-container swiper-thumbs-container" data-margin="10" data-dots="false" data-nav="true" data-thumbs="true">
                      <div class="swiper">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide">
                            <figure class="rounded" style="height: 200px"><img src="<?= base_url(); ?>assets/img/upload/<?= $p['foto'] ?>" alt="" /><a class="item-link" href="<?= base_url(); ?>assets/img/upload/<?= $p['foto'] ?>" data-glightbox data-gallery="product-group"><i class="uil uil-focus-add"></i></a></figure>
                          </div>

                          <!--/.swiper-slide -->
                        </div>
                        <!--/.swiper-wrapper -->
                      </div>
                      <!-- /.swiper -->
                      <div class="swiper swiper-thumbs">

                        <!--/.swiper-wrapper -->
                      </div>
                      <!-- /.swiper -->
                    </div>
                    <!-- /.swiper-container -->
                  </div>
                  <!-- /column -->
                  <div class="col-lg-6">
                    <div class="post-header mb-5">
                      <p class="price fs-20 mb-2 float-end"><span class="badge bg-<?= $p['status_color']; ?>"><?= $p['status']; ?></span></p>
                      <h2 class="post-title display-5 fs-23"><?= $p['subjek']; ?></h2>
                      <p class="price fs-18 mb-2"><span class="amount"><?= $p['jenis_pengaduan']; ?></span></p>

                      <div class="post-category text-line">

                        <a href="javascript:;" rel="category"><i class="uil uil-file-alt fs-15"></i> Oleh : <?= $p['visibilitas'] == 1 ? $p['nama'] : 'Anonim'; ?></a>
                      </div>
                    </div>
                    <!-- /.post-header -->
                    <p class="mb-6"><?= $p['deskripsi_pengaduan']; ?></p>




                    <!-- /form -->
                  </div>
                </div>
              </div>
              <div class="row card-footer">
                <div class="col-lg-6 col-md-12 col-sm-12">
                  <ul class="post-meta mt-2 mb-2">
                    <li class="post-date"><i class="uil uil-calendar-alt"></i><span><?php echo date('d M Y H:i', strtotime($p['create_date'])); ?></span></li>
                    <li class="post-comments"><a href="<?= base_url('Home/detail_pengaduan') ?>/<?= $p['id_pengaduan']; ?>"><i class="uil uil-comment"></i><?= $p['jumlah_komentar']; ?></a></li>
                  </ul>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                  <a href="<?= base_url('Home/detail_pengaduan'); ?>/<?= $p['id_pengaduan']; ?>" class="btn btn-expand btn-primary rounded-pill float-end mb-2">
                    <i class="uil uil-arrow-right"></i>
                    <span>Baca Selengkapnya</span>
                  </a>
                </div>
              </div>
            </div>
          <?php } ?>
        <?php }else{ ?>
          <center>Pengaduan tidak ada.</center>
        <?php } ?>
        <?php if(!empty($pengaduan)){ ?>
            <nav class="d-flex mt-10 float-end" aria-label="pagination" id="pagination-pengaduan">
              <ul class="pagination">
                <li class="page-item" id="prev-li">
                  <a class="page-link" aria-label="Previous">
                    <span aria-hidden="true"><i class="uil uil-arrow-left"></i></span>
                  </a>
                </li>
                <ul class="pagination" id="pagination-number">
                </ul>
                <li class="page-item" id="next-li">
                  <a class="page-link" aria-label="Next">
                    <span aria-hidden="true"><i class="uil uil-arrow-right"></i></span>
                  </a>
                </li>
              </ul>
              <!-- /.pagination -->
            </nav>
          <?php } ?>
      </div>

    </div>
  </div>
  <div class="overflow-hidden">
        <div class="divider text-navy mx-n2">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 100">
            <path fill="currentColor" d="M1260,1.65c-60-5.07-119.82,2.47-179.83,10.13s-120,11.48-180,9.57-120-7.66-180-6.42c-60,1.63-120,11.21-180,16a1129.52,1129.52,0,0,1-180,0c-60-4.78-120-14.36-180-19.14S60,7,30,7H0v93H1440V30.89C1380.07,23.2,1319.93,6.15,1260,1.65Z" />
          </svg>
        </div>
      </div>
</section>

<script>
        $(document).ready(function() {
            // Array to store checked checkbox values
            var checkedKategori = [];

            // Event handler for button click
            $('#btn-filter').on('click', function() {
                // Clear the array before checking again
                checkedKategori = [];
                checkedStatus = [];

                var lengthStatus = $('.status-filter:checked').length;
                var lengthKategori = $('.kategori-filter:checked').length;
                if (lengthKategori === 0 || lengthStatus === 0) {
                    $('#row-pengaduan').html('<center>Tidak ada Pengaduan.</center>')
                    $('#pagination-pengaduan').hide();
                    return false;
                }


                // Iterate through each checkbox
                $('.kategori-filter:checked').each(function() {
                    checkedKategori.push($(this).val());
                });

                $('.status-filter:checked').each(function() {
                    checkedStatus.push($(this).val());
                });

                var jsonKategori = JSON.stringify(checkedKategori);

                var encryptedKategori = window.btoa(jsonKategori);

                var jsonStatus = JSON.stringify(checkedStatus);

                var encryptedStatus = window.btoa(jsonStatus);

                location.href = "<?= base_url(); ?>Home/pengaduan?ktg="+encryptedKategori+"&status="+encryptedStatus;
            });




            var itemsPerPage = 2;
            var $items = $(".pengaduan-content .pengaduan-card");
            var totalPages = Math.ceil($items.length / itemsPerPage);
            var currentPage = 1;

            function showPage(page) {
              var startIndex = (page - 1) * itemsPerPage;
              var endIndex = startIndex + itemsPerPage;

              $items.hide().slice(startIndex, endIndex).show();
            }

            function createPagination() {
              var $pagination = $("#pagination-number");
              for (var i = 1; i <= totalPages; i++) {
                var $li = $("<li>").addClass('page-item').html('<a class="page-link">'+i+'</a>');
                $li.on("click", function() {
                  var page = parseInt($(this).text());
                  showPage(page);
                  updateActivePage(page);
                });
                $pagination.append($li);
              }
            }

            function updateActivePage(page) {
              $("#pagination li").removeClass("active");
              $("#pagination li").eq(page - 1).addClass("active");
            }

            function showPreviousPage() {
              if (currentPage > 1) {
                currentPage--;
                showPage(currentPage);
                updateActivePage(currentPage);
              }
            }

            function showNextPage() {
              if (currentPage < totalPages) {
                currentPage++;
                showPage(currentPage);
                updateActivePage(currentPage);
              }
            }

            showPage(1);
            createPagination();
            updateActivePage(1);

            $("#prev-li").on("click", function() {
              showPreviousPage();
            });

    // Tombol Next
    $("#next-li").on("click", function() {
      showNextPage();
    });
        });
</script>