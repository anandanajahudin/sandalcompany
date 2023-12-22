@extends('layouts.back.main')

@section('title', 'Slider Edit')

@section('content')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Slider Edit</h5>

                    <form action="{{ route('slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="form-group mb-2">
                            <label for="is_active" class="form-label">Status</label>
                            <select class="form-select" name="is_active" id="is_active" required>
                                @if ($slider->is_active == null)
                                    <option selected disabled>Pilih status...</option>
                                @else
                                    <option value="{{ $slider->is_active }}" selected>
                                        {{ $slider->is_active }}
                                    </option>
                                @endif
                                <option value="0">Aktif</option>
                                <option value="1">Tidak aktif</option>
                            </select>

                            @error('is_active')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <button name="submit" type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
