<a {{ $attributes->merge([
        'class' => 'block w-full px-4 py-2 text-start text-sm leading-5 
                    text-gray-700 dark:text-lavender 
                    hover:bg-gray-100 dark:hover:bg-indigo-dark 
                    focus:outline-none focus:bg-gray-100 dark:focus:bg-indigo-dark 
                    transition duration-150 ease-in-out'
    ]) }}>
    {{ $slot }}
</a>
