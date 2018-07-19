@if(session()->has('success'))

    @component('layouts.partials.components.alert-component', ['category' => 'alert-success', 'icon' => 'fa-check'])

        {{ session('success') }}
        
    @endcomponent

@endif

@if(session()->has('error'))

    @component('layouts.partials.components.alert-component', ['category' => 'alert-danger', 'icon' => 'fa-times'])

        {{ session('error') }}

    @endcomponent

@endif