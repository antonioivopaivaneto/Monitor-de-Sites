@if (isset($erros->any))
    @foreach ($errors->all() as $error)


        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">eita!</span> {{ $error }}
          </div>
    @endforeach
@endif


@if (session()->has('message'))


<div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
    <span class="font-medium">Successo</span>     {{session('message')}}

  </div>

@endif
