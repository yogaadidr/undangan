<section class="cover-section">
    <div class="cover-overlay"></div>
    <div class="cover-content fade-in">
        <span>The Wedding Of</span>
        <h1 class="font-extra-big">{{ config('invitation.couples.bride.nickname') }} & {{ config('invitation.couples.groom.nickname') }}</h1>
        <p>Mengundang Bapak/Ibu/Saudara/i</p>
        <div class="nama-undangan">
            <p>{{ $tamu }}</p>
        </div>
        <button id="open-invitation-btn" class="base-btn" onclick="openInvitation()">Buka Undangan</button>
    </div>
</section>