<x-layouts.asosiy>

    <x-slot:title>
        Post O'zgartirish {{ $post->id }}
    </x-slot:title>
    <x-Header>
        Post O'zgartirish {{ $post->id }}
    </x-Header>

    <div class="container py-2"></div>
    <div class="d-flex justify-content-center align-items-center py-4">
        <div class="col-lg-7 mb-5 mb-lg-0">
            <div class="contact-form">
                <div id="success"></div>
                <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="control-group mb-4">
                        <input type="text" class="form-control p-4" placeholder="Sarlavha" name="title"
                            value="{{ $post->title }}" />

                        @error('title')
                            <p class="help-block text-danger">{{ $message }}</p>
                        @enderror

                    </div>
                    <div class="control-group mb-4">
                        <input type="text" class="form-control p-4" placeholder="Qisqacha mazmuni"
                            name="short_content" value="{{ $post->short_content }}" />
                        @error('short_content')
                            <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="control-group mb-4">
                        <textarea class="form-control p-4" rows="6" placeholder="Ma'qola" name="content">{{ $post->content }}</textarea>
                        @error('content')
                            <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <input name="photo" type="file" class="p-2" placeholder="Rasm yuklash"
                        value="{{ old('photo') }}" />
                    @error('photo')
                        <p class="help-block text-danger">{{ $message }}</p>
                    @enderror


                    <div class="d-flex">
                        <button class="btn btn-primary py-3 px-5" type="submit">O'zgartirish</button>
                        <a href="{{route('posts.show',['post'=>$post->id])}}" class="btn btn-danger py-3 px-5">Bekor qilish</a>
                    </div>
                </form>
            </div>
        </div>

    </div>


</x-layouts.asosiy>
