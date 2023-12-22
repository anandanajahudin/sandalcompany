<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">New Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf

                    <input type="hidden" class="form-control" name="user_type" value="customer" readonly>

                    <div class="form-group mb-2">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" value="{{ old('nama') }}" required>

                        @error('nama')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="kota" class="form-label">Kota</label>
                        <input type="text" class="form-control" name="kota" value="{{ old('kota') }}" required>

                        @error('kota')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group mb-2">
                                <label for="phone" class="form-label">Telp</label>
                                <input type="number" class="form-control" name="telp" value="{{ old('telp') }}"
                                    required>

                                @error('telp')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group mb-2">
                                <label for="kodepos" class="form-label">Kode Pos</label>
                                <input type="text" class="form-control" name="kodepos" value="{{ old('kodepos') }}"
                                    required>

                                @error('kodepos')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group mb-2">
                                <label for="no_fax" class="form-label">Fax</label>
                                <input type="text" class="form-control" name="no_fax" value="{{ old('no_fax') }}"
                                    required>

                                @error('no_fax')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-2">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" required>

                        @error('alamat')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
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
