    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        <div class="flex flex-col items-center justify-center gap-y-10">

        <h1 class="text-5xl">Products liste :</h1>
        <div class="flex flex-wrap items-center justify-center">
            @foreach ($products as $product)
                <div class="p-4 m-2 border flex flex-col items-center border-gray-300 rounded w-[20vw] h-[65vh]">
                    <h2>{{ $product->name }}</h2>
                    <p>{{ $product->description }}</p>
        
                    @if ($product->image)
                        <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}" class=" object-cover">
                    @endif
        
                    @if ($product->pdf) 
                        <a href="{{ asset('storage/pdf/' . $product->pdf) }}" target="_blank" class="text-blue-500">Download PDF</a>
                    @endif
                   
                        @foreach (Auth::user()->roles as $role)
                        @if ($role->name == "admin")
                        <form method="post" action="/product/destroy/{{ $product->id }}">
                            @csrf
                            @method("DELETE")
                            <button class="text-red-500">Delete</button>
                        </form>
                            
                        @endif
                    @endforeach
                </div>
                
            @endforeach
        </div>
    </div>

    </body>
    </html>