<section class="wrapper bg-gray">
  <div class="container py-3 py-md-5">
    <nav class="d-inline-block" aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="<?= base_url('Home'); ?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">RTH</li>
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
      <h2 class="display-6 fs-30">Semua RTH</h2>
      <aside class="col-lg-3 sidebar">
        <!-- <div class="widget mt-1">
          <h4 class="widget-title mb-3">Kategori</h4>
          <?php foreach ($kategori as $k) { ?>
            <div class="form-check mb-1">
              <input class="form-check-input kategori-filter" type="checkbox" value="<?= $k['id_kategori']; ?>" <?php if(empty($kategori_filter)) { echo 'checked'; } ?> <?php if(in_array($k['id_kategori'], $kategori_filter)) { echo 'checked'; } ?>>
              <label class="form-check-label"><?= $k['kategori']; ?> <span class="fs-sm text-muted ms-1">(<?= $k['total']; ?>)</span></label>
            </div>
          <?php } ?>
        </div> -->
        <!-- /.widget -->
        <div class="widget">
          <h4 class="widget-title mb-3">Status Reservasi</h4>
            <div class="form-check mb-1">
              <input class="form-check-input status-filter" type="checkbox" value="1" <?php if(empty($status_filter)) { echo 'checked'; } ?> <?php if(in_array(1, $status_filter)) { echo 'checked'; } ?>>
              <label class="form-check-label">Aktif <span class="fs-sm text-muted ms-1"></span></label>
            </div>
             <div class="form-check mb-1">
              <input class="form-check-input status-filter" type="checkbox" value="0" <?php if(empty($status_filter)) { echo 'checked'; } ?> <?php if(in_array(0, $status_filter)) { echo 'checked'; } ?>>
              <label class="form-check-label">Tidak Aktif <span class="fs-sm text-muted ms-1"></span></label>
            </div>
          <!-- /.row -->
        </div>
        <!-- /.widget -->
        <div class="widget">
        <button type="button" id="btn-filter" class="btn btn-primary btn-sm rounded-pill w-100">Filter</button>
      </div>
      </aside>
      <div class="col-lg-9 rth-content">
        <div class="row" id="row-rth">
          <?php if(!empty($rth)){ ?>
            <?php foreach ($rth as $r) { ?>
              <div class="col-lg-6">
                <div class="card mb-2 rth-card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="swiper-container swiper-thumbs-container" data-margin="10" data-dots="false" data-nav="true" data-thumbs="true">
                          <div class="swiper">
                            <div class="swiper-wrapper">
                              <div class="swiper-slide">
                                <figure class="rounded overflow-hidden" style="height: 200px; width: 100%;">
                                  <img src="<?= base_url(); ?>assets/img/upload/<?= $r['foto_rth']; ?>" alt="" class="w-100 h-100" style="object-fit: cover;" />
                                  <a class="item-link" href="<?= base_url(); ?>assets/img/upload/<?= $r['foto_rth']; ?>" data-glightbox data-gallery="product-group">
                                    <i class="uil uil-focus-add"></i>
                                  </a>
                                </figure>

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
                      <div class="col-lg-12">
                        <div class="post-header mt-2 mb-3">
                          <h2 class="post-title display-5 fs-23"><?= $r['nama_rth']; ?></h2>
                          <p class="price fs-18 mb-2">Status Reservasi : <?= $r['status_reservasi'] == 1 ? '<span class="badge bg-info">Aktif</span>' : '<span class="badge bg-danger">Tidak Aktif</span>'; ?></p>
                       <!--  <div class="post-category text-line">
                          <a href="javascript:;" rel="category">
                            <i class="uil uil-file-alt fs-15"></i> Ditambahkan <?php echo date('d M Y', strtotime($r['create_date'])); ?>
                          </a>
                        </div> -->
                      </div>
                      <!-- /.post-header -->
                      <p class="mb-2">
                        <?php
                        $text = $r['deskripsi_rth'];
                        $limit = 100;
                        if (strlen($text) > $limit) {
                          $shortenedText = substr($text, 0, $limit);
                          $shortenedText .= " ...";
                          echo $shortenedText;
                        } else {
                          echo $text;
                        }
                        ?>
                      </p>
                      <!-- /form -->
                    </div>
                  </div>
                </div>
                <div class="card-footer text-end">
                  <a href="<?= base_url('Home/detail_rth'); ?>/<?= $r['id_rth']; ?>" class="btn btn-primary btn-sm">
                    <i class="uil uil-arrow-right"></i> Selengkapnya
                  </a>
                </div>
              </div>
            </div>
          <?php } ?>
        <?php }else{ ?>

          <center>Tidak ada RTH.</center>
        <?php } ?>

          </div>
        <?php if(!empty($rth)){ ?>
            <nav class="d-flex mt-10 float-end" aria-label="pagination" id="pagination-rth">
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
                checkedStatus = [];

                var checked = $('.status-filter:checked').length;
                if (checked === 0) {
                    $('#row-rth').html('<center>Tidak ada RTH.</center>')
                    $('#pagination-rth').hide();
                    return false;
                }

                
                $('.status-filter:checked').each(function() {
                    checkedStatus.push($(this).val());
                });

                var jsonStatus = JSON.stringify(checkedStatus);

                var encryptedStatus = window.btoa(jsonStatus);

                location.href = "<?= base_url(); ?>Home/rth?status="+encryptedStatus;
            });




            var itemsPerPage = 4;
            var $items = $(".rth-content .rth-card");
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