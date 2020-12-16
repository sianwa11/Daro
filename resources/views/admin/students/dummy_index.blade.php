<table>
    <thead>
    <tr>
        <th></th>
        <th>Name</th>
        <th>Email</th>
        <th>Courses</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @forelse($students as $info)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$info->name}}</td>
            <td>{{$info->email}}</td>
            <td>
                @forelse($no_of_courses as $key => $count)
                    @if($key == $info->id)
                        {{$count}}
                    @endif
                @empty

                @endforelse
            </td>
            <td>
                @if($info->suspended == 0)
                    <span>Active</span>
                @else
                    <span>Suspended</span>
                @endif
            </td>
        </tr>
    @empty

    @endforelse
    </tbody>
</table>
