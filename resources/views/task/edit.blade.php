<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('To Do App / Edit') }}
        </h2>
    </x-slot>
    <br/>
    <div class="flex justify-center">
    <a href="{{url('dashboard')}}">
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">Go Back</button>
    </a>
    </div>
    
    <div class="flex justify-center">
    <form action="{{url('/task/update/'.$task->id)}}" method="post" class="w-full max-w-xs">
        <div class="mb-4">
            <label for="tname" class="block text-gray-700 text-sm font-bold mb-2">Task Name:</label>
            @csrf
            @method('PUT')
            <input type="text" name="tname" id="tname" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$task->name}}">
        </div>
        <div class="flex items-center justify-between">
            <input type="submit" name="submit" value="Submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        </div>
    </form>
    </div>
</div>

</x-app-layout>
