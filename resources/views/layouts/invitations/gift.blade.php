<section class="gift-section reveal">
    <div class="text-center mb-4">
        <h1 class="font-extra-big">Wedding Gift</h1>
        <p class="mb-4">Doa restu Anda merupakan karunia yang sangat berarti bagi kami, dan jika
            memberi
            adalah ungkapan tanda
            kasih, Anda dapat memberi kado secara cashless.</p>
        <button type="button" onclick="toggleGiftCards()" class="base-btn">Tampilkan</button>
    </div>
    <div id="debet-cards">
        @foreach ($cards as $card)
        @php
        $guest = array_filter(config('invitation.banks'), function ($item) use ($card) {
        return $item['code'] == $card['bank'];
        });

        $guest = reset($guest);
        $icon = $guest['image'];
        @endphp

        <div class="debet-card mb-4">
            <div class="debet-card-logo">
                <img src="{{ url($icon) }}" alt="Bank Logo" />
            </div>
            <div class="debet-card-chip"></div>
            <div class="debet-card-number">{{ $card['number'] }} <button type="button" class="mb-0 btn btn-outline"
                    onclick="copyToClipboard({{ $card['number'] }})"><i class="fas fa-copy"></i></button>
            </div>
            <div class="debet-card-info">
                <div class="debet-card-holder">a/n {{ $card['name'] }}</div>
            </div>
        </div>
        @endforeach

    </div>
</section>