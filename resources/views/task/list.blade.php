<div class="flex flex-col items-center justify-center">
    <a href="{{url('task/add')}}">
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">Add new Task</button>
    </a>
    <table class="border-collapse border border-gray-400">
        <thead>
            <tr>
                <th class="border border-gray-400 px-4 py-2">#</th>
                <th class="border border-gray-400 px-4 py-2">Task Name</th>
                <th class="border border-gray-400 px-4 py-2">Status</th>
                <th class="border border-gray-400 px-4 py-2">Action</th>
                <th class="border border-gray-400 px-4 py-2">Edit</th>
                <th class="border border-gray-400 px-4 py-2">Delete</th>
            </tr>
        </thead>
        <tbody>
            @if (count($tasks)>0)
                    @foreach ( $tasks as $task)
                    <tr>
                        <td class="border border-gray-400 px-4 py-2">{{$task->id}}</td>
                        <td class="border border-gray-400 px-4 py-2">{{$task->name}}</td>
                        <td class="border border-gray-400 px-4 py-2">
                            @php
                                $status="";
                              if($task->status == "pending"){
                                $status = "<span style='color:red;'>Pending</span>";
                              }else{
                                $status = "<span style='color:green;'>Completed</span>";
                              }
                            @endphp
                            {!! $status !!}
                        </td>
                        <td class="border border-gray-400 px-4 py-2">
                            @if ($task->status == "pending")
                            <form action="{{url('task/change/completed/'.$task->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4" type="submit">Completed</button>
                            </form>
                            @else
                            <form action="{{url('task/change/pending/'.$task->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <button class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4" type="submit">Pending</button>
                            </form>
                            
                            @endif
                        




                        </td>
                        <td class="border border-gray-400 px-4 py-2">
                        <a href="{{url('task/edit/'.$task->id)}}">
                            <button class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">Edit</button>
                        </a>
                        </td>
                        <td class="border border-gray-400 px-4 py-2">
                        <form action="{{url('task/delete/'.$task->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                            <button class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4" type="submit">Delete</button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
            @else
            <td style="text-align:center;color:Red" class="border border-gray-400 px-4 py-2" colspan="6">No Task Found</td>
            @endif
        </tbody>
    </table>
</div>