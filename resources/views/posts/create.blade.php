<x-layouts.asosiy>

    <x-slot:title>
        Post Yaratish
    </x-slot:title>
    <x-Header>
        Yangi Post Yaratish
    </x-Header>
    <div class="container py-2"></div>
    <div class="d-flex justify-content-center align-items-center py-4">
        <div class="col-lg-7 mb-5 mb-lg-0">
            <div class="contact-form">
                <div id="success"></div>
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="control-group mb-4">
                        <input type="text" class="form-control p-4" placeholder="Sarlavha" name="title"
                            value="{{ old('title') }}" />

                        @error('title')
                            <p class="help-block text-danger">{{ $message }}</p>
                        @enderror

                    </div>
                    <div class="control-group mb-4">
                        <input type="text" class="form-control p-4" placeholder="Qisqacha mazmuni"
                            name="short_content" value="{{ old('short_content') }}" />
                        @error('short_content')
                            <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="control-group mb-4">
                        <textarea class="form-control p-4" rows="6" placeholder="Ma'qola" name="content">{{ old('content') }}</textarea>
                        @error('content')
                            <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <input name="photo" type="file" class="p-2" placeholder="Rasm yuklash" />
                    @error('photo')
                        <p class="help-block text-danger">{{ $message }}</p>
                    @enderror


                    <div>
                        <button class="btn btn-primary btn-block py-3 px-5" type="submit">Saqlash</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</x-layouts.asosiy>
