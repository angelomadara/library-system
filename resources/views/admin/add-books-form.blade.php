<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                @if (session('status') === 'book-added')
                    <div class="mb-4 rounded-lg bg-green-100 py-5 px-6 text-base text-green-700
                        x-data="{ show: true }"
                        x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)" role="alert">
                        {{ __('Saved.') }}
                    </div>
                @endif

                <div class="max-w-xl">
                    <form action="{{ route('admin.books.store') }}" method="POST" class="mt-6 space-y-6">
                        @csrf
                        <div>
                            <x-input-label for="name" :value="__('Book Name *')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                :value="old('name')"  autofocus autocomplete="" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="email" :value="__('Author *')" />
                            <x-text-input id="author" name="author" type="text" class="mt-1 block w-full"
                                :value="old('author')"  autocomplete="" />
                            <x-input-error class="mt-2" :messages="$errors->get('author')" />
                        </div>

                        <div>
                            <x-input-label for="email" :value="__('Category *')" />
                            <x-option id="category" name="category" class="mt-1 block w-full" :value="old('category')">
                                @forelse ($categories as $category)
                                    <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                                @empty
                                @endforelse
                            </x-option>
                            <x-input-error class="mt-2" :messages="$errors->get('category')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

</x-admin-layout>


{{-- <script>
var Alert = document.getElementById("alert");
var close = document.getElementById("close-modal");
Alert.style.transform = "translateY(0%)";
function closeAlert() {
    Alert.style.transform = "translateY(-200%)";
    setTimeout(function () {
        Alert.style.transform = "translateY(0%)";
    }, 1000);
}
</script> --}}
