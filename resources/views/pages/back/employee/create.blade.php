<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModallLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModallLabel">New Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-2">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="number" class="form-control" name="nip" value="{{ old('nip') }}" required>

                        @error('nip')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" value="{{ old('nama') }}" required>

                        @error('nama')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="jabatan" class="form-label">Bidang</label>
                        <select class="form-select" name="department" id="department">
                            <option selected disabled>Pilih bidang...</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->nama }}</option>
                            @endforeach
                        </select>

                        @error('department')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="telp" class="form-label">Telp</label>
                        <input type="number" class="form-control" name="telp" value="{{ old('telp') }}" required>

                        @error('telp')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" required>

                        @error('alamat')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">Gambar KTP</label>
                        <input class="form-control border-primary @error('image') is-invalid @enderror" type="file"
                            name="image" id="image" placeholder="file" required>
                        <small class="text-warning">Max File Size under 1MB</small>
                        &nbsp;|&nbsp;<small>Only .jpg, .png, .jpeg, .svg, .webp File</small>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="modal-footer">
                        <button name="submit" type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
