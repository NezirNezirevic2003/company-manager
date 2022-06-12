<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ route('tasks.create') }}">
                    <x-jet-button>
                        Add Task
                    </x-jet-button>
                </a>

            </div>


            <livewire:task-table />
        </div>
    </div>
</x-app-layout>
