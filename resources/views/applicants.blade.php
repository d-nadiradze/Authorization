@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <form action="/applicants/set" method="POST">
                    @csrf
                    <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id}}">
                    <div class="card flex">
                        <div class="card-body p-0">
                            <table class="rounded-t-lg  w-full mx-auto  text-gray-800">
                                <tr class="text-left border-b-2 border-gray-300">
                                    <th class="px-4 py-3">Name</th>
                                    <th class="px-4 py-3">Surname</th>
                                    <th class="px-4 py-3">Phone Number</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3 justify-content-center flex ">Hire</th>
                                </tr>
                                @foreach($data as $applicants)

                                    <tr class="bg-gray-100 border-b border-gray-200">
                                        <td class="px-4 py-3">{{$applicants->name}}</td>
                                        <td class="px-4 py-3">{{$applicants->surname}}</td>
                                        <td class="px-4 py-3">{{$applicants->phone_number}}</td>
                                        @if($applicants->status == 'off')
                                            <td class="px-4 py-3">Active</td>
                                            <td class="px-4 py-3 justify-content-center flex ">
                                                <input type="hidden" name="applicant_name" value="{{$applicants->name}}">
                                                <input type="checkbox" id="{{$applicants->id}}" name="name" value="{{$applicants->id}}">
                                            </td>
                                        @else
                                            <td class="px-4 py-3">Inactive</td>
                                            <td class="px-4 py-3 px-4 py-3 justify-content-center flex "><input
                                                    type="checkbox" disabled></td>
                                        @endif
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                     </div>
                    <div class="mt-3">
                        <button type="submit" class="p-lg-2 bg-blue-500 text-white rounded" >Hire Now</button>
                    </div>
                </form>
                <p class="text-center">You can check you applicants <a href="/my-applicants">here</a></p>
            </div>
        </div>
    </div>
@endsection
