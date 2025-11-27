<!-- FOR CUSTOMIZING INSTEAD OF OVERWRITING  -->
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center']) }}>
    {{ $slot }}
</button>

composer require maatwebsite/excel
