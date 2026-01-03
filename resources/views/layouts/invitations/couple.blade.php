<section class="couple-section">
    <div class="container text-center reveal">
        <h1 class="font-extra-big">Bride & Groom</h1>
        <p>Maha suci Allah yang telah menciptakan makhluk-Nya berpasang-pasangan. Ya Allah, rahmatilah
            pernikahan kami:</p>
    </div>
    <div class="container couple-container">
        <div class="person reveal">
            <img src="{{ url('images/bride.png') }}" alt="{{ config('invitation.couples.bride.nickname') }}" />
            <h1 class="font-big mv-1">{{ config('invitation.couples.bride.name') }}</h1>
            <p>{{ config('invitation.couples.bride.parent') }}</p>
        </div>
        <h1 class="font-extra-big text-center reveal mb-2 mt-2">- & -</h1>
        <div class="person reveal">
            <img src="{{ url('images/groom.png') }}" alt="{{ config('invitation.couples.groom.nickname') }}" />
            <h1 class="font-big mv-1">{{ config('invitation.couples.groom.name') }}</h1>
            <p>{{ config('invitation.couples.groom.parent') }}</p>
        </div>
    </div>
</section>