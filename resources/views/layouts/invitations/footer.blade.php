<section class="footer-section reveal">
    <img class="image-footer" src="{{ url('images/last.png') }}" alt="Floral Divider" class="mb-5" />
    <p class="mt-5">Merupakan suatu kehormatan dan kebahagiaan bagi kami, apabila Bapak/Ibu/Saudara/i berkenan hadir dan
        memberikan doa restu. Atas kehadiran dan doa restunya, kami mengucapkan terima kasih.
    </p>
    <p>Kami yang berbahagia,</p>
    <h1 class="font-big mt-4">{{ config('invitation.couples.bride.nickname') }} & {{ config('invitation.couples.groom.nickname') }}</h1>

</section>

<audio id="song">
    <source src="{{ url('audio/backsound.m4a') }}" type="audio/mp4">
    Your browser does not support the audio element.
</audio>

<div id="music-button" class="music-btn" onclick="togglePlayPause()">
    <img src="https://m.media-amazon.com/images/M/MV5BMDM3ZDg3NDQtNDhhNy00MGVlLWI0Y2UtY2ZhMzVjZmMwMDM3XkEyXkFqcGc@._V1_.jpg"
        alt="Music Icon" />
    <i id="music-indicator" class="music-indicator fa-sharp fa-solid fa-play"></i>
</div>