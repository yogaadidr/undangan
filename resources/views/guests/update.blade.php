@extends('layouts.user_type.auth')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Update Guest</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('guests.update.process', $guest->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name" class="form-control-label">Name</label>
                                    <input class="form-control" type="text" value="{{ $guest['name'] }}" name="name"
                                        id="name">
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="form-control-label">Phone</label>
                                    <input class="form-control" type="tel" value="{{ $guest['phone'] }}" name="phone"
                                        id="phone">
                                </div>

                                <div class="form-group">
                                    <label for="session">Session</label>
                                    <select class="form-control" name="session" id="session">
                                        @foreach (config('invitation.session') as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ $guest['session'] == $key ? 'selected' : '' }}>{{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="side">Side</label>
                                    <select class="form-control" name="side" id="side">
                                        @foreach (config('invitation.sides') as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ $guest['side'] == $key ? 'selected' : '' }}>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" value="1"
                                        {{ $guest['is_vip'] == 1 ? 'checked' : '' }} name="is_vip" id="is_vip">
                                    <label class="custom-control-label" for="is_vip">VIP</label>
                                </div>

                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" value="1" name="invited"
                                        {{ $guest['invited'] == 1 ? 'checked' : '' }} id="invited">
                                    <label class="custom-control-label" for="invited">Invited</label>
                                </div>
                                <button type="submit" class="btn btn-outline-info">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
