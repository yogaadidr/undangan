@extends('layouts.user_type.auth')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Wishes</h6>
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
                                                Message</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Created At</th>
                                                <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($wishes->isEmpty())
                                            <tr>
                                                <td colspan="6" class="text-center">
                                                    <p class="text-xs font-weight-bold mb-0">No wishes found.</p>
                                                </td>
                                            </tr>
                                        @endif
                                        @foreach ($wishes as $wish)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $wish->name }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $wish->message }}</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $wish->created_at->format('d/m/Y') }}</span>
                                                </td>
                                                <td>
                                                    <form action="{{ route('wishes.destroy', $wish->id) }}" method="post"
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
@endsection
