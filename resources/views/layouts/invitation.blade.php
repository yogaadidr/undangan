<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Undangan Tazkia & Yoga</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/base-styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=Great+Vibes&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div style="z-index:99; width:100%" class="position-absolute p-4">
            <div class="alert alert-info alert-dismissible fade {{ session()->has('success') ? 'show' : '' }} float" role="alert">
                 {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

<script>
    // Fungsi buka undangan
    function openInvitation() {
        document.body.classList.remove("locked");
        document.querySelector("#header").scrollIntoView({
            behavior: "smooth"
        });

        document.querySelector("#open-invitation-btn").classList.add("hide");
        document.body.style.overflow = 'auto';

        togglePlayPause();
    }


    function togglePlayPause() {
        var song = document.getElementById("song");

        if (song.paused) {
            document.querySelector("#music-button .music-indicator").classList.remove("fa-play");
            document.querySelector("#music-button .music-indicator").classList.add("fa-pause");
            document.querySelector("#music-button").classList.add("rotate");
            song.play();
        } else {
            document.querySelector("#music-button .music-indicator").classList.remove("fa-pause");
            document.querySelector("#music-button .music-indicator").classList.add("fa-play");
            document.querySelector("#music-button").classList.remove("rotate");
            song.pause();
        }
    }

    // Efek animasi scroll (fade + slide)
    const reveals = document.querySelectorAll(".reveal");

    function revealOnScroll() {
        const windowHeight = window.innerHeight;
        reveals.forEach((el) => {
            const elementTop = el.getBoundingClientRect().top;
            const revealPoint = 200; // jarak sebelum elemen muncul
            if (elementTop < windowHeight - revealPoint) {
                el.classList.add("active");
            }
        });
    }
    window.addEventListener("scroll", revealOnScroll);

    function toggleGiftCards() {
        const giftCards = document.getElementById("debet-cards");
        const button = document.querySelector(".gift-section .base-btn");
        if (giftCards.style.display === "none" || giftCards.style.display === "") {
            giftCards.style.display = "block";
            button.textContent = "Sembunyikan";
        } else {
            giftCards.style.display = "none";
            button.textContent = "Tampilkan";
        }
    }

    const targetDate = new Date("{{ config('invitation.event_date') }}").getTime();

    const updateCountdown = () => {
        const now = new Date().getTime();
        const distance = targetDate - now;

        if (distance < 0) {
            document.getElementById("days").textContent = "0";
            document.getElementById("hours").textContent = "0";
            document.getElementById("minutes").textContent = "0";
            document.getElementById("seconds").textContent = "0";
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("days").textContent = days;
        document.getElementById("hours").textContent = hours;
        document.getElementById("minutes").textContent = minutes;
        document.getElementById("seconds").textContent = seconds;
    };

    function copyToClipboard(number) {
        navigator.clipboard.writeText(number).then(() => {
            alert("Nomor rekening berhasil dicopy ke clipboard!");
        }).catch(err => {
            console.error("Gagal copy: ", err);
        });
    }

    setInterval(updateCountdown, 1000);
</script>

</html>
