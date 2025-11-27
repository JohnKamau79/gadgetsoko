@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }}
       {!! $attributes->merge([
           'class' => 'border-gray-300 dark:border-gray-600 
                       focus:border-teal-500 focus:ring-teal-500 
                       rounded-lg shadow-sm px-3 py-2 
                       bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 
                       placeholder-gray-400 dark:placeholder-gray-400 
                       focus:outline-none focus:ring-2 transition'
       ]) !!}>
