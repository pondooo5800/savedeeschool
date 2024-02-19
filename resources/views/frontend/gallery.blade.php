@extends('layouts.frontend')
@section('styles')
<style>
  :root {
    --lightbox: rgb(0 0 0 / 0.75);
    --carousel-text: #fff;
  }

  body {
    margin: 1.5rem 0 3.5rem;
  }

  @keyframes zoomin {
    0% {
      transform: scale(1);
    }

    50% {
      transform: scale(1.05);
    }

    100% {
      transform: scale(1);
    }
  }

  .gallery-item {
    display: block;
  }

  .gallery-item img {
    box-shadow: 0 1rem 1rem rgba(0, 0, 0, 0.15);
    transition: box-shadow 0.2s;
  }

  .gallery-item:hover img {
    box-shadow: 0 1rem 1rem rgba(0, 0, 0, 0.35);
  }

  .lightbox-modal .modal-content {
    background-color: var(--lightbox);
  }

  .lightbox-modal .btn-close {
    position: absolute;
    top: 1.25rem;
    right: 1.25rem;
    font-size: 1.25rem;
    z-index: 10;
    filter: invert(1) grayscale(100);
  }

  .lightbox-modal .modal-body {
    display: flex;
    align-items: center;
    padding: 0;
  }

  .lightbox-modal .lightbox-content {
    width: 100%;
  }

  .lightbox-modal .carousel-indicators {
    margin-bottom: 0;
  }

  .lightbox-modal .carousel-indicators [data-bs-target] {
    background-color: var(--carousel-text) !important;
  }

  .lightbox-modal .carousel-inner {
    width: 75%;
  }

  .lightbox-modal .carousel-inner img {
    animation: zoomin 10s linear infinite;
  }

  .lightbox-modal .carousel-item .carousel-caption {
    right: 0;
    bottom: 0;
    left: 0;
    padding-bottom: 2rem;
    /* background-color: var(--lightbox); */
    color: var(--carousel-text) !important;
  }

  .lightbox-modal .carousel-control-prev,
  .lightbox-modal .carousel-control-next {
    width: auto;
  }

  .lightbox-modal .carousel-control-prev {
    left: 1.25rem;
  }

  .lightbox-modal .carousel-control-next {
    right: 1.25rem;
  }


  @media (min-width: 1400px) {
    .lightbox-modal .carousel-inner {
      max-width: 60%;
    }
  }

  [data-bs-theme="dark"] .lightbox-modal .carousel-control-next-icon,
  [data-bs-theme="dark"] .lightbox-modal .carousel-control-prev-icon {
    filter: none;
  }
</style>
@endsection

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5">
  <div class="container text-center py-5">
    <h3 class="display-2 text-primary mb-4 animated slideInDown" style="font-family: 'Kanit'">Gallery</h3>
    <nav aria-label="breadcrumb animated slideInDown">
      <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">หน้าหลัก</a></li>
        <li class="breadcrumb-item text-primary" aria-current="page">Gallery</li>
      </ol>
    </nav>
  </div>
</div>


<div class="container-fluid blog py-5 my-5">
  <div class="container py-5">
    <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
      <h3 class="text-primary" style="font-family: 'Kanit'">Gallery</h3>
    </div>
    <div class="row g-5 justify-content-center wow fadeIn" data-wow-delay=".3s">
      <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 gallery-grid">
          @foreach ($gallerys ?? '' as $row)
          <div class="col">
            <a class="gallery-item" href="{{ url('/'.$row->image)}}">
              <img src="{{ asset($row->image) }}" class="img-fluid" alt="Lorem ipsum dolor sit amet">
            </a>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade lightbox-modal" id="lightbox-modal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-fullscreen">
    <div class="modal-content">
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      <div class="modal-body">
        <div class="lightbox-content">
          <!-- JS content here -->
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script>
  const html = document.querySelector('html');
html.setAttribute('data-bs-theme', 'dark');

const galleryGrid = document.querySelector(".gallery-grid");
const links = galleryGrid.querySelectorAll("a");
const imgs = galleryGrid.querySelectorAll("img");
const lightboxModal = document.getElementById("lightbox-modal");
const bsModal = new bootstrap.Modal(lightboxModal);
const modalBody = lightboxModal.querySelector(".lightbox-content");

function createIndicators (img) {
  let markup = "", i, len;

  const countSlides = links.length;
  const parentCol = img.closest('.col');
  const curIndex = [...parentCol.parentElement.children].indexOf(parentCol);

  for (i = 0, len = countSlides; i < len; i++) {
    markup += `
      <button type="button" data-bs-target="#lightboxCarousel"
        data-bs-slide-to="${i}"
        ${i === curIndex ? 'class="active" aria-current="true"' : ''}
        aria-label="Slide ${i + 1}">
      </button>`;
  }

  return markup;
}

function createSlides (img) {
  let markup = "";
  const currentImgSrc = img.closest('.gallery-item').getAttribute("href");

  for (const img of imgs) {
    const imgSrc = img.closest('.gallery-item').getAttribute("href");
    const imgAlt = img.getAttribute("alt");

    markup += `
      <div class="carousel-item${currentImgSrc === imgSrc ? " active" : ""}">
        <img class="d-block img-fluid w-100" src=${imgSrc} alt="${imgAlt}">
      </div>`;
  }

  return markup;
}

function createCarousel (img) {
  const markup = `
    <!-- Lightbox Carousel -->
    <div id="lightboxCarousel" class="carousel slide carousel-fade" data-bs-ride="true">
      <!-- Indicators/dots -->
      <div class="carousel-indicators">
        ${createIndicators(img)}
      </div>
      <!-- Wrapper for Slides -->
      <div class="carousel-inner justify-content-center mx-auto">
        ${createSlides(img)}
      </div>
      <!-- Controls/icons -->
      <button class="carousel-control-prev" type="button" data-bs-target="#lightboxCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#lightboxCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    `;

  modalBody.innerHTML = markup;
}

for (const link of links) {
  link.addEventListener("click", function (e) {
    e.preventDefault();
    const currentImg = link.querySelector("img");
    const lightboxCarousel = document.getElementById("lightboxCarousel");

    if (lightboxCarousel) {
      const parentCol = link.closest('.col');
      const index = [...parentCol.parentElement.children].indexOf(parentCol);

      const bsCarousel = new bootstrap.Carousel(lightboxCarousel);
      bsCarousel.to(index);
    } else {
      createCarousel(currentImg);
    }

    bsModal.show();
  });
}
</script>
@endsection