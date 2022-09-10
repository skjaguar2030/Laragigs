<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retrieve</title>
    <!-- CSS only -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>
<body>

    {{-- <a href={{ route('employee.create') }}>Create</a> --}}
    <div class="container">

        {{-- Create button. It's for creating a new record --}}
        <a href="{{ route('random.create') }}" class="btn btn-primary" style="float: right; margin-top:2em;">Create</a>
        

        {{-- <div style="margin-top: 42px; position: relative" class="m-auto m-t-2">
        @if(session('aka_naga_session'))
            <div class="alert alert-success" role="alert">
                {{session('aka_naga_session')}}
            </div>

        @endif
        </div>

        <div style="margin-top: 42px; position: relative" class="m-auto m-t-2">
            @if(session('aka_naga_session_kogufuta'))
                <div class="alert alert-success" role="alert">
                    {{session('aka_naga_session_kogufuta')}}
                </div>
        
            @endif
        </div> --}}

        {{-- {{$defaulData}} --}}

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Profil</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($abantu as $umuntu)

                <tr>
                    <td>
                        <img src="{{asset('uploads')}}/{{$umuntu->image}}" alt="photo" width="80px">
                    </td>
                    <td>{{$umuntu->name}}</td>
                    <td>{{$umuntu->email}}</td> 
                    <td>{{$umuntu->password}}</td>
                    <td>

                        @if($umuntu->deleted_at == null)
                        
                            <a href="{{route('random.edit', ['id' => $umuntu->id])}}"><button type="button" class="btn btn-success">Edit</button></a>
                            <a href="{{route('random.delete', ['id' => $umuntu->id])}}"><button type="button" class="btn btn-warning">Delete</button></a>

                        @else

                            <a href="{{route('random.restore', ['id' => $umuntu->id])}}"><button type="button" class="btn btn-primary">Restore</button></a>
                            <a href="{{route('random.destroy', ['id' => $umuntu->id])}}"><button type="button" class="btn btn-danger"> Destroy</button></a>

                        @endif
                            

                    </td>
                </tr>

            @endforeach

            </tbody>
        </table>
    </div>


</body>
</html>