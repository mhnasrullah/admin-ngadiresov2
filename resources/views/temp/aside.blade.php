<aside class="d-flex flex-column py-0 py-lg-3 p-3">
    <div class="d-flex align-items-center justify-content-between">
        <img src="/img/logo.png" class="logo" alt="">
        <button type="button" class="d-lg-none border-0 bg-transparent" id="button-toggle">
            <span class="material-symbols-outlined">
                menu
                </span>
        </button>
    </div>
    <nav id="nav">
        <a href="/berita" class="d-flex align-items-center py-3 px-2 {{$active == 'berita' ? 'active' : ''}}">
            <span class="me-2 material-symbols-outlined">feed</span> Berita</a>
        <a class="d-flex align-items-center py-3 px-2 {{$active == 'wisata' ? 'active' : ''}}" href="/wisata">
            <span class="me-2 material-symbols-outlined">location_on</span>Wisata</a>
        <a class="d-flex align-items-center py-3 px-2" href="/penyuratan">
            <span class="me-2 material-symbols-outlined">
                description
                </span>Penyuratan</a>
        <a class="d-flex align-items-center py-3 px-2" href="/keluar">
            <span class="me-2 material-symbols-outlined">
                logout
                </span>Keluar</a>
    </nav>
</aside>