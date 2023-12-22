<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModallLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModallLabel">New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-2">
                        <label for="namaproduk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control @error('namaproduk') is-invalid @enderror"
                            name="namaproduk" required>

                        @error('namaproduk')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="kodeproduk" class="form-label">Kode Produk</label>
                        <input type="text" class="form-control @error('kodeproduk') is-invalid @enderror"
                            name="kodeproduk" value="{{ old('kodeproduk') }}" required>

                        @error('kodeproduk')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="category" class="form-label">Kategori</label>
                        <select class="form-select @error('category') is-invalid @enderror" name="category"
                            id="category" required>
                            <option value="" disabled selected>
                                Pilih Kategori
                            </option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->nama_kategori }}
                                </option>
                            @endforeach
                        </select>

                        @error('category')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="hargapokok" class="form-label">Harga Pokok</label>
                        <input type="number" class="form-control @error('hargapokok') is-invalid @enderror"
                            name="hargapokok" value="{{ old('hargapokok') }}" required>

                        @error('hargapokok')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="hargajual" class="form-label">Harga Jual</label>
                        <input type="number" class="form-control @error('hargajual') is-invalid @enderror"
                            name="hargajual" value="{{ old('hargajual') }}" required>

                        @error('hargajual')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="form-group mb-2">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control @error('deskripsi') is-invalid @enderror"
                            name="deskripsi" value="{{ old('deskripsi') }}">

                        @error('deskripsi')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label>Gambar Produk</label>
                        <input type="file" class="form-control border-primary @error('image') is-invalid @enderror"
                            name="image" id="image" placeholder="Gambar Produk" required>
                        <small class="text-warning">Max File Size under 2MB</small>
                        &nbsp;|&nbsp;<small>Only .jpg, .png, .jpeg, .svg, .webp File</small>

                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
