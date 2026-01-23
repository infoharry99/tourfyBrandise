<section class="hero">
  <div class="hero-container">

    <!-- LEFT CONTENT -->
    <div class="hero-left">
      <h1>
        Your <span>creative team’s</span><br />
        AI-powered creative team
      </h1>
      <p>
        Expand your team's creative possibilities. Get a team of global
        creatives who fully integrate AI into how they think, create,
        and deliver.
      </p>
      <a href="#" class="btn">Book a demo</a>
    </div>

    <!-- RIGHT SLIDERS -->
    <div class="hero-right">
      <div class="slider reverse">
        @foreach(range(1,6) as $i)
          <img src="/demo{{ $i }}.avif" />
        @endforeach
      </div>

      <div class="slider">
        @foreach(range(7,12) as $i)
          <img src="/demo{{ $i }}.avif" />
        @endforeach
      </div>

      <div class="slider reverse">
        @foreach(range(13,18) as $i)
          <img src="/demo{{ $i }}.avif" />
        @endforeach
      </div>
    </div>

  </div>
</section>
<style>
    .hero {
    background: #081c18;
    padding: 100px 60px;
    overflow: hidden;
    }

    .hero-container {
    display: grid;
    grid-template-columns: 1.1fr 1fr;
    align-items: center;
    gap: 80px;
    }

    /* LEFT */
    .hero-left h1 {
    color: #b9ffd9;
    font-size: 56px;
    line-height: 1.1;
    margin-bottom: 20px;
    }

    .hero-left h1 span {
    font-style: italic;
    }

    .hero-left p {
    color: #cfeee0;
    max-width: 480px;
    margin-bottom: 32px;
    }

    .btn {
    background: #c9ff7a;
    padding: 14px 28px;
    border-radius: 999px;
    color: #000;
    font-weight: 600;
    display: inline-block;
    }

    /* RIGHT */
    .hero-right {
    display: flex;
    gap: 18px;
    height: 520px;
    }

    .slider {
    width: 180px;
    display: flex;
    flex-direction: column;
    gap: 18px;
    animation: slideDown 18s ease-in-out infinite alternate;
    }

    .slider.reverse {
    animation-direction: alternate-reverse;
    }

    .slider img {
    width: 100%;
    border-radius: 18px;
    object-fit: cover;
    }

    /* ANIMATION */
    @keyframes slideDown {
    from {
        transform: translateY(0);
    }
    to {
        transform: translateY(-50%);
    }
    }

    /* RESPONSIVE */
    @media (max-width: 1024px) {
    .hero-container {
        grid-template-columns: 1fr;
    }
    .hero-right {
        justify-content: center;
    }
    }

</style>


@php
$images = [
  'https://picsum.photos/id/1011/400/600',
  'https://picsum.photos/id/1015/400/600',
  'https://picsum.photos/id/1025/400/600',
  'https://picsum.photos/id/1035/400/600',
  'https://picsum.photos/id/1041/400/600',
  'https://picsum.photos/id/1050/400/600',
  'https://picsum.photos/id/1062/400/600',
  'https://picsum.photos/id/1074/400/600',
  'https://picsum.photos/id/1084/400/600',
  'https://picsum.photos/id/1080/400/600',

  'https://picsum.photos/id/109/400/600',
  'https://picsum.photos/id/110/400/600',
  'https://picsum.photos/id/111/400/600',
  'https://picsum.photos/id/112/400/600',
  'https://picsum.photos/id/113/400/600',
  'https://picsum.photos/id/114/400/600',
  'https://picsum.photos/id/115/400/600',
  'https://picsum.photos/id/116/400/600',
  'https://picsum.photos/id/117/400/600',
  'https://picsum.photos/id/118/400/600',
];

$row1 = array_slice($images, 0, 10);
$row2 = array_slice($images, 10, 10);
@endphp


<section class="trusted-section">
  <p class="trusted-title">
    Trusted by 500+ of the world's top brands
  </p>

  <!-- ROW 1 -->
  <div class="logo-row">
    <div class="logo-track">
      @foreach($row1 as $img)
        <img src="{{ $img }}" alt="">
      @endforeach

      {{-- duplicate for seamless loop --}}
      @foreach($row1 as $img)
        <img src="{{ $img }}" alt="">
      @endforeach
    </div>
  </div>

  <!-- ROW 2 -->
  <div class="logo-row reverse">
    <div class="logo-track">
       @foreach($row2 as $img)
        <img src="{{ $img }}" alt="">
      @endforeach

      {{-- duplicate for seamless loop --}}
      @foreach($row2 as $img)
        <img src="{{ $img }}" alt="">
      @endforeach
    </div>
  </div>
</section>

<style>
    .trusted-section {
    background: #fbfbf5;
    padding: 90px 0;
    overflow: hidden;
    text-align: center;
    }

    .trusted-title {
    font-size: 22px;
    color: #0b2b23;
    margin-bottom: 60px;
    }

    /* ROW */
    .logo-row {
    width: 100%;
    overflow: hidden;
    margin-bottom: 40px;

    /* 🔥 EDGE FADE (THIS IS THE MAGIC) */
    -webkit-mask-image: linear-gradient(
        to right,
        transparent,
        black 8%,
        black 92%,
        transparent
    );
    mask-image: linear-gradient(
        to right,
        transparent,
        black 8%,
        black 92%,
        transparent
    );
    }

    /* TRACK */
    .logo-track {
    display: flex;
    gap: 80px;
    width: max-content;
    animation: scroll 35s linear infinite;
    align-items: center;
    }

    /* Reverse direction */
    .logo-row.reverse .logo-track {
    animation-direction: reverse;
    }

    /* LOGOS */
    .logo-track img {
    height: 38px;
    opacity: 0.7;
    filter: grayscale(100%);
    transition: opacity 0.3s ease;
    user-select: none;
    }

    .logo-track img:hover {
    opacity: 1;
    }

    /* ANIMATION */
    @keyframes scroll {
    from {
        transform: translateX(0);
    }
    to {
        transform: translateX(-50%);
    }
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
    .logo-track {
        gap: 40px;
    }

    .logo-track img {
        height: 28px;
    }
    }
</style>

<section class="services-marquee">

  <div class="marquee">
    <div class="marquee-track">

      @php
      $cards = [
        [
          'title' => 'Email Design',
          'img' => 'https://picsum.photos/id/1011/600/900',
          'skills' => ['Graphic design concepts', 'Campaign concepts', 'Ad copywriting']
        ],
        [
          'title' => 'Motion Design',
          'img' => 'https://picsum.photos/id/1025/600/900',
          'skills' => ['Animation', 'Storyboarding', 'Visual effects']
        ],
        [
          'title' => 'Video Production',
          'img' => 'https://picsum.photos/id/1035/600/900',
          'skills' => ['Filming', 'Editing', 'Post production']
        ],
        [
          'title' => 'Marketing Strategy',
          'img' => 'https://picsum.photos/id/1041/600/900',
          'skills' => ['Digital ad concepts', 'Growth strategy', 'Brand positioning']
        ],
      ];
      @endphp

      {{-- Duplicate cards for seamless loop --}}
      @for ($i = 0; $i < 2; $i++)
        @foreach ($cards as $card)
          <div class="service-card">
            <img src="{{ $card['img'] }}" alt="">
            
            <div class="card-overlay"></div>

            <h3>{{ $card['title'] }}</h3>

            <div class="skills">
              @foreach ($card['skills'] as $skill)
                <span>{{ $skill }}</span>
              @endforeach
            </div>
          </div>
        @endforeach
      @endfor

    </div>
  </div>

</section>

<style>
    /* SECTION */
    .services-marquee {
    background: #fbfbf5;
    padding: 80px 0;
    overflow: hidden;
    }

    /* MARQUEE */
    .marquee {
    width: 100%;
    overflow: hidden;
    }

    .marquee-track {
    display: flex;
    gap: 28px;
    width: max-content;
    animation: marquee 45s linear infinite;
    }

    /* CARD */
    .service-card {
    position: relative;
    width: 320px;
    height: 460px;
    border-radius: 22px;
    overflow: hidden;
    flex-shrink: 0;
    cursor: pointer;
    }

    .service-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
    }

    /* TITLE */
    .service-card h3 {
    position: absolute;
    top: 24px;
    left: 24px;
    right: 24px;
    color: #fff;
    font-size: 26px;
    font-weight: 500;
    z-index: 2;
    font-family: serif;
    }

    /* DARK OVERLAY */
    .card-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        to bottom,
        rgba(0,0,0,0.15),
        rgba(0,0,0,0.75)
    );
    opacity: 0;
    transition: opacity 0.4s ease;
    z-index: 1;
    }

    /* SKILLS */
    .skills {
    position: absolute;
    left: 20px;
    right: 20px;
    bottom: -120px;
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    z-index: 2;
    transition: bottom 0.4s ease;
    }

    .skills span {
    padding: 8px 14px;
    border-radius: 999px;
    border: 1px solid rgba(255,255,255,0.6);
    color: #fff;
    font-size: 13px;
    backdrop-filter: blur(6px);
    background: rgba(255,255,255,0.08);
    }

    /* HOVER EFFECTS */
    .service-card:hover img {
    transform: scale(1.05);
    }

    .service-card:hover .card-overlay {
    opacity: 1;
    }

    .service-card:hover .skills {
    bottom: 24px;
    }

    /* ANIMATION */
    @keyframes marquee {
    from {
        transform: translateX(0);
    }
    to {
        transform: translateX(-50%);
    }
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
    .service-card {
        width: 260px;
        height: 380px;
    }

    .service-card h3 {
        font-size: 22px;
    }
    }
</style>



<section class="comparison-section">

  <!-- COLUMN HEADERS -->
  <div class="comparison-header">
    <div></div>
    <div>Speed</div>
    <div>Flexibility</div>
    <div>Quality</div>
    <div>Scalability</div>
    <div>Cost-effectiveness</div>
  </div>

  <!-- SUPERSIDE ROW -->
  <div class="comparison-row featured">
    <div class="row-title">
      <h3>Superside</h3>
      <p>
        Work with the top 1% of global creative talent,
        recruited from the best brands and agencies.
      </p>
    </div>

    <div class="icon check">✓</div>
    <div class="icon check">✓</div>
    <div class="icon check">✓</div>
    <div class="icon check">✓</div>
    <div class="icon check">✓</div>
  </div>

  <!-- IN-HOUSE -->
  <div class="comparison-row">
    <div class="row-title">
      <h4>In-house team</h4>
      <p>
        In-house teams don’t always have the skill mix or
        bandwidth to handle every request that the business needs.
      </p>
    </div>

    <div class="icon cross">✕</div>
    <div class="icon cross">✕</div>
    <div class="icon check">✓</div>
    <div class="icon check">✓</div>
    <div class="icon cross">✕</div>
  </div>

  <!-- AGENCIES -->
  <div class="comparison-row">
    <div class="row-title">
      <h4>Creative agencies</h4>
      <p>
        Working with full scale creative agencies can be slow,
        costly, and inflexible.
      </p>
    </div>

    <div class="icon cross">✕</div>
    <div class="icon cross">✕</div>
    <div class="icon check">✓</div>
    <div class="icon check">✓</div>
    <div class="icon cross">✕</div>
  </div>

</section>

<style>
    /* SECTION */
    .comparison-section {
    background: #071c19;
    padding: 90px 80px;
    color: #fff;
    font-family: Inter, system-ui, sans-serif;
    }

    /* HEADER */
    .comparison-header {
    display: grid;
    grid-template-columns: 2.5fr repeat(5, 1fr);
    margin-bottom: 40px;
    color: #e7f7ef;
    font-size: 18px;
    }

    /* ROW BASE */
    .comparison-row {
    display: grid;
    grid-template-columns: 2.5fr repeat(5, 1fr);
    align-items: center;
    padding: 40px 36px;
    border-bottom: 1px solid rgba(255,255,255,0.1);
    }

    /* FEATURED */
    .comparison-row.featured {
    background: #d9ff8a;
    color: #071c19;
    border-radius: 999px;
    margin-bottom: 40px;
    border: none;
    }

    /* TITLES */
    .row-title h3 {
    font-size: 32px;
    margin-bottom: 10px;
    }

    .row-title h4 {
    font-size: 26px;
    margin-bottom: 10px;
    }

    .row-title p {
    font-size: 15px;
    opacity: 0.8;
    max-width: 420px;
    }

    /* ICONS */
    .icon {
    font-size: 26px;
    text-align: center;
    }

    .icon.check {
    color: #0a3d32;
    }

    .comparison-row:not(.featured) .icon.check {
    color: #b6ffdc;
    }

    .icon.cross {
    color: rgba(255,255,255,0.6);
    }

    /* RESPONSIVE */
    @media (max-width: 1024px) {
    .comparison-section {
        padding: 60px 30px;
    }

    .comparison-header,
    .comparison-row {
        grid-template-columns: 2fr repeat(5, 1fr);
    }
    }

    @media (max-width: 768px) {
    .comparison-header {
        display: none;
    }

    .comparison-row {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .icon {
        text-align: left;
    }
    }
</style>
