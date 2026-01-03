@extends('layouts.user_type.auth')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header d-flex pb-0 ">
                            <h6 class="mb-0">Card List </h6>
                            <a class="mb-0 ms-2 btn btn-outline-info btn-sm btn-tooltip" href="cards/add"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Add Guest" data-container="body"
                                data-animation="true"><i class="fas fa-add"></i></a>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Card Holder Name</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Card Number</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Provider</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($cards->isEmpty())
                                            <tr>
                                                <td colspan="6" class="text-center">
                                                    <p class="text-xs font-weight-bold mb-0">No cards found.</p>
                                                </td>
                                            </tr>
                                        @endif
                                        @foreach ($cards as $card)
                                            <tr>
                                                <td width="50%">
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $card->name }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $card->number }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $card->bank }}</p>
                                                </td>
                                                <td>
                                                    <a class="text-xs mb-0 btn btn-outline-info btn-sm btn-tooltip"
                                                        href="{{ route('cards.update', $card->id) }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Update"
                                                        data-container="body" data-animation="true"><i
                                                            class="fas fa-pen"></i></a>

                                                    <form action="{{ route('cards.destroy', $card->id) }}" method="post"
                                                        class="d-inline-flex">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit"
                                                            class="text-xs mb-0 btn btn-outline-warning btn-sm btn-tooltip"
                                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"
                                                            data-container="body" data-animation="true"><i
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
                                class="fas fa-copy"></i></a>

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
