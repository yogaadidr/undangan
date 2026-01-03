<section class="wishes-section reveal">
    <div class="text-center mb-4">
        <h1 class="font-extra-big">Send Your Wishes</h1>
        <p>Kepada Bapak/Ibu/Saudara/i yang ingin memberikan ucapan kepada kami dapat dituliskan di bawah ini:
        </p>

    </div>
    <form class="form mb-5" action="/wish" method="POST">
        @csrf
        <label for="name" class="form-label">Nama Tamu:</label>
        <input class="form-input mb-4" type="text" required placeholder="Nama Anda" name="name" value="{{ $tamu }}" />
        <label for="name" class="form-label">Ucapan & Doa:</label>
        <textarea class="form-input" rows="4" required cols="50" name="message"
            placeholder="Tulis ucapan Anda di sini..."></textarea><br><br>
        <button type="submit" class="base-btn">Kirim Ucapan</button>
    </form>

    <div class="wishes-container">
        @foreach ($wishes as $wish)
        @php
        $timestamp = strtotime($wish['created_at']);
        @endphp
        <div class="wish-card mb-1">
            <p><b>{{ $wish['name'] }}</b></p>
            <span class="label">{{ date('d F Y | H:i', $timestamp) }}</span>
            <p>{{ $wish['message'] }}</p>
            <hr class="dashed mv-1">
        </div>
        @endforeach
    </div>
</section>