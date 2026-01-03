<section class="venue-section">
    <div class="venue-content text reveal">
        <div class="text-center mb-2">
            <h1 class="font-extra-big">Save the Date</h1>
            <div class="countdown mb-4">
                <div class="countdown-box">
                    <div class="number" id="days">0</div>
                    <div class="label">Hari</div>
                </div>
                <div class="countdown-box">
                    <div class="number" id="hours">0</div>
                    <div class="label">Jam</div>
                </div>
                <div class="countdown-box">
                    <div class="number" id="minutes">0</div>
                    <div class="label">Menit</div>
                </div>
                <div class="countdown-box">
                    <div class="number" id="seconds">0</div>
                    <div class="label">Detik</div>
                </div>
            </div>

            <p>Dengan penuh rasa hormat kami mengharapkan kehadiran Bapak/Ibu/Saudara sekalian pada acara
                pernikahan
                kami:</p>
        </div>

        @foreach (config('invitation.events') as $event)
            <hr class="dashed mv-3" />
            <h1 class="font-big">{{ $event['name'] }}</h1>
            <div class="date-container mb-2">
                <div>
                    <div>{{ $event['day'] }}</div>
                    <div class="date-container-date">{{ $event['date'] }}</div>
                    <div>{{ $event['month'] }} {{ $event['year'] }}</div>
                </div>
                <div class="date-container-detail">
                    <div class="font-medium mb-1"><b>
                            @php
                                if ($event['name'] == 'Akad Nikah') {
                                    echo $event['time'];
                                } else {
                                    $data = array_filter(
                                        config('invitation.session'),
                                        function ($item, $key) use ($session) {
                                            return $key == $session;
                                        },
                                        ARRAY_FILTER_USE_BOTH,
                                    );

                                    if (!empty($data)) {
                                        $data = array_values($data);
                                        echo $data[0];
                                    } else {
                                        echo $event['time'];
                                    }
                                }

                            @endphp

                        </b></div>
                    <div>{{ $event['address'] }}</div>
                </div>
            </div>
            <div class="text-center mt-5 mb-5">
                <a href="{{ $event['map'] }}"  class="base-btn btn-sm mt-3 link-offset-2 link-underline link-underline-opacity-0" target="_blank" rel="noopener noreferrer">
                    Lokasi {{ $event['name'] }}
                </a>
            </div>
        @endforeach
        <div class="spacer mv-3"></div>
    </div>
</section>
