@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id}}">
                <div class="card flex">
                    <div class="card-body p-0">
                        <table class="rounded-t-lg  w-full mx-auto  text-gray-800">
                            <tr class="text-left border-b-2 border-gray-300">
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Surname</th>
                                <th class="px-4 py-3">Phone Number</th>
                            </tr>
@foreach($user as $applicant)
    @foreach($applicant->applicants as $item)

                                <tr class="bg-gray-100 border-b border-gray-200">
                                    <td class="px-4 py-3">{{$item->name}}</td>
                                    <td class="px-4 py-3">{{$item->surname}}</td>
                                    <td class="px-4 py-3">{{$item->phone_number}}</td>
                                </tr>
        @endforeach
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
