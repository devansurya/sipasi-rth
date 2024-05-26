<section class="wrapper bg-gray">
  <div class="container py-3 py-md-5">
    <nav class="d-inline-block" aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="<?= base_url('Home'); ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('Home/pengaduan'); ?>">RTH</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail</li>
      </ol>
    </nav>
    <!-- /nav -->
  </div>
  <!-- /.container -->
</section>
    <!-- /section -->
    <section class="wrapper bg-light">
      <div class="container py-14 py-md-16">
        <div class="row gx-md-8 gx-xl-12 gy-8">
          <div class="col-lg-6">
          <div class="shape rounded-circle bg-line red rellax w-18 h-18 d-none d-lg-block" data-rellax-speed="1" style="bottom: 2.5rem; left: 2.5rem;"></div>
            <div class="swiper-container swiper-thumbs-container" data-margin="10" data-dots="false" data-nav="true" data-thumbs="true">
              <div class="swiper">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <figure class="rounded"><img src="<?= base_url(); ?>assets/img/upload/<?= $rth->foto_rth; ?>" alt="" /><a class="item-link" href="<?= base_url(); ?>assets/img/upload/<?= $rth->foto_rth; ?>" data-glightbox data-gallery="product-group"><i class="uil uil-focus-add"></i></a></figure>
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
              <h2 class="post-title display-5"><?= $rth->nama_rth; ?></h2>
              <p class="price fs-20 mb-2"><span class="amount">Kerusakan Fasilitas</span></p>
              <p class="price fs-20 mb-2"><span class="badge bg-info">Baru</span></p>
              <div class="post-category text-line">

                <a href="javascript:;" rel="category"><i class="uil uil-file-alt fs-15"></i> Oleh : Rohimah | 08 Mei 2024</a>
              </div>
            </div>
            <!-- /.post-header -->
            <p class="mb-6"><?= $rth->deskripsi_rth; ?></p>
            <p>Lokasi : Lahan Parkir Taman Kelurahan Tapos</p>



            <!-- /form -->
          </div>
         
        </div>
       
        <!-- /.tab-content -->
      </div>
      <!-- /.container -->
       <div class="overflow-hidden">
        <div class="divider text-navy mx-n2">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 100">
            <path fill="currentColor" d="M1260,1.65c-60-5.07-119.82,2.47-179.83,10.13s-120,11.48-180,9.57-120-7.66-180-6.42c-60,1.63-120,11.21-180,16a1129.52,1129.52,0,0,1-180,0c-60-4.78-120-14.36-180-19.14S60,7,30,7H0v93H1440V30.89C1380.07,23.2,1319.93,6.15,1260,1.65Z" />
          </svg>
        </div>
      </div>
    </section>

    <script type="text/javascript">
      $(document).ready(function() {
    var itemsPerPage = 5;
    var $items = $("#singlecomments .comment");
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