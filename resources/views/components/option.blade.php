<div class="mb-3 xl:w-full">
    <select data-te-select-init {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
        <option selected disabled></option>
        {{ $slot }}
    </select>
</div>
