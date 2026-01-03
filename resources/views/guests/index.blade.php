@extends('layouts.user_type.auth')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header d-flex pb-0">
                            <h6 class="mb-0">Daftar Tamu</h6>
                            <a class="mb-0 ms-2 btn btn-outline-info btn-sm btn-tooltip" href="guests/add"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Add Guest" data-container="body"
                                data-animation="true"><i class="fas fa-add"></i></a>

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-primary btn-sm mb-0 ms-2" data-bs-toggle="modal"
                                data-bs-target="#modalFilter">
                                <i class="fas fa-filter"></i>
                                Filter
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="modalFilter" tabindex="-1" role="dialog"
                                aria-labelledby="modalFilterLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('guests') }}" method="GET">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalFilterLabel">Filter</h5>
                                                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="name" class="form-control-label">Name</label>
                                                    <input class="form-control" type="text"
                                                        value="{{ $filters['name'] ?? '' }}" name="name" id="name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone" class="form-control-label">Phone</label>
                                                    <input class="form-control" type="tel"
                                                        value="{{ $filters['phone'] ?? '' }}" name="phone" id="phone">
                                                </div>
                                                <div class="form-group">
                                                    <label for="session">Session</label>
                                                    <select class="form-control" name="session" id="session">
                                                        <option value="">-- Any Session --</option>
                                                        @foreach (config('invitation.session') as $key => $value)
                                                            <option value="{{ $key }}"
                                                                {{ $filters['session'] ?? '' == $key ? 'selected' : '' }}>
                                                                {{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="side">Side</label>
                                                    <select class="form-control" name="side" id="side">
                                                        <option value="">-- Any Side --</option>
                                                        @foreach (config('invitation.sides') as $key => $value)
                                                            <option value="{{ $key }}"
                                                                {{ $filters['side'] ?? '' == $key ? 'selected' : '' }}>
                                                                {{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                        name="is_vip" id="is_vip"
                                                        {{ isset($filters['is_vip']) && $filters['is_vip'] == 1 ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="is_vip">VIP</label>
                                                </div>
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                        name="invited" id="invited"
                                                        {{ isset($filters['invited']) && $filters['invited'] == 1 ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="invited">Invited</label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="{{ route('guests') }}" class="btn bg-gradient-secondary">
                                                    Reset</a>
                                                <button type="submit" class="btn bg-gradient-primary">Filter</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Name</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Phone</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Session</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Side</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                VIP</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Invited</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($guests->isEmpty())
                                            <tr>
                                                <td colspan="6" class="text-center">
                                                    <p class="text-xs font-weight-bold mb-0">No guests found.</p>
                                                </td>
                                            </tr>
                                        @endif
                                        @foreach ($guests as $guest)
                                            <tr>
                                                <td width="50%">
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $guest->name }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $guest->phone }}</p>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-xs font-weight-bold mb-0 badge bg-gradient-info">
                                                        @php
                                                            $data = array_filter(
                                                                config('invitation.session'),
                                                                function ($item, $key) use ($guest) {
                                                                    return $key == $guest->session;
                                                                },
                                                                ARRAY_FILTER_USE_BOTH,
                                                            );

                                                            if (!empty($data)) {
                                                                $data = array_values($data);
                                                                echo $data[0];
                                                            } else {
                                                                echo '-';
                                                            }
                                                        @endphp
                                                    </span>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        @php
                                                            $data = array_filter(
                                                                config('invitation.sides'),
                                                                function ($item, $key) use ($guest) {
                                                                    return $key == $guest->side;
                                                                },
                                                                ARRAY_FILTER_USE_BOTH,
                                                            );

                                                            if (!empty($data)) {
                                                                $data = array_values($data);
                                                                echo $data[0];
                                                            } else {
                                                                echo '-';
                                                            }
                                                        @endphp
                                                    </p>
                                                </td>
                                                <td class="text-center">
                                                    @if ($guest->is_vip)
                                                        <span
                                                            class="text-xs font-weight-bold mb-0 badge bg-gradient-primary"><i
                                                                class="fas fa-crown"></i> VIP</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($guest->invited)
                                                        <span
                                                            class="text-xs font-weight-bold mb-0 badge bg-gradient-primary"><i
                                                                class="fas fa-check"></i> Invited</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button"
                                                        class="text-xs mb-0 btn btn-outline-success btn-sm btn-tooltip"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Generate Message" data-container="body"
                                                        data-animation="true"
                                                        onclick="showMessage('{{ $guest['name'] }}', '{{ $guest['phone'] }}')">
                                                        <i class="fas fa-link"></i>
                                                    </button>

                                                    <a class="text-xs mb-0 btn btn-outline-info btn-sm btn-tooltip"
                                                        href="{{ route('guests.update', $guest->id) }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Update"
                                                        data-container="body" data-animation="true"><i
                                                            class="fas fa-pen"></i></a>

                                                    <form action="{{ route('guests.destroy', $guest->id) }}"
                                                        method="post" class="d-inline-flex">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit"
                                                            class="text-xs mb-0 btn btn-outline-warning btn-sm btn-tooltip"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Remove" data-container="body" data-animation="true"><i
                                                                class="fas fa-trash"></i></button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Message</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <a class="mb-0 btn btn-outline-success btn-tooltip" id="whatsapp-link" href=""
                            target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Share on Whatsapp"
                            data-container="body" data-animation="true"><i class="fa-brands fa-whatsapp"></i></a>

                        <button type="button" class="mb-0 btn btn-outline-success btn-tooltip" id="copy-message"
                            onclick="copyToClipboard()" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Copy to Clipboard" data-container="body" data-animation="true"><i
                                class="fas fa-copy"></i></button>

                    </div>
                    <div id="message"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let message = '';

        function showMessage(name, phone) {
            let concatedName = name.replaceAll(" ", "+");
            console.log(concatedName);
            phone = convertPhoneNumber(phone);

            message = `Assalamu'alaikum Wr. Wb
Bismillahirahmanirrahim.

Yth. ${name}

Tanpa mengurangi rasa hormat, perkenankan kami mengundang Bapak/Ibu/Saudara/i,
teman sekaligus sahabat, untuk menghadiri acara pernikahan kami :

Tazkia & Yoga

Berikut link undangan kami untuk info lengkap dari acara bisa kunjungi :

https://tazkiaanns.yogaadidr.com/?to=${concatedName}

Merupakan suatu kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan untuk
hadir dan memberikan doa restu.

Mohon maaf perihal undangan hanya di bagikan melalui pesan ini. Terima kasih
banyak atas perhatiannya.

Wassalamu'alaikum Wr. Wb.
Terima Kasih.`;

            const encodedMessage = encodeURIComponent(message);
            const waLink = `https://wa.me/${phone}?text=${encodedMessage}`;

            document.getElementById("whatsapp-link").href = waLink;
            document.getElementById('message').innerText = message;
            var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
                keyboard: false
            });
            myModal.show();

            document.getElementById("copyBtn").addEventListener("click", () => {

            });
        }

        function convertPhoneNumber(phone) {
            if (phone.startsWith('628')) {
                return phone;
            }

            if (phone.startsWith('08') && phone.length > 2) {
                return "628" + phone.substr(2);
            }

            return phone;
        }

        function copyToClipboard() {
            navigator.clipboard.writeText(message).then(() => {
                alert("Pesan undangan berhasil dicopy ke clipboard!");
            }).catch(err => {
                console.error("Gagal copy: ", err);
            });
        }
    </script>
@endsection
