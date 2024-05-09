<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('To Do App / list') }}
        </h2>
    </x-slot>
    <br/>
    @include('task.list',['tasks'=> $tasks])
</x-app-layout>
