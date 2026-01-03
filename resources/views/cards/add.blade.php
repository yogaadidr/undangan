@extends('layouts.user_type.auth')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Add Card</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('cards.add.process') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="form-control-label">Card Holder Name</label>
                                    <input class="form-control" type="text" value="" name="name" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="number" class="form-control-label">Card Number</label>
                                    <input class="form-control" type="tel" value="" name="number" id="number">
                                </div>
                                <div class="form-group">
                                    <label for="bank">Bank</label>
                                    <select class="form-control" name="bank" id="bank">
                                        @foreach (config('invitation.banks') as $item)
                                            <option value="{{ $item['code'] }}">{{ $item['name'] }}</option>
                                        @endforeach
                                    </select>
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
