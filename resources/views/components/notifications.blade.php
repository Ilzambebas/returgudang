
@if (session('status'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <strong class="font-bold">Success alert!</strong> {{ session('status') }}.
    </div>
@endif
@if (session('error'))
    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <strong class="font-bold">Danger alert!</strong> {{ session('error') }}.
    </div>
@endif
