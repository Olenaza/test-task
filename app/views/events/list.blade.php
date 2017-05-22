@extends('layouts.authorized.layout')

@section('page_content')

    <div class="container">

        <h1>Events</h1>
        <hr>

        @if(! $events->isEmpty())
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th> Title </th>
                        <th> Start </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                        <tr>
                            <td>
                                <a href = "/events/{{ $event->id }}/edit"> {{ $event->event_title }} </a>
                            </td>
                            <td>
                                {{ (new DateTime($event->event_start))->format('H:i d-m-Y') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h3>No events found</h3>
        @endif
        <br>
        <a href = "/events/create" class="btn btn-info"> Add new event </a>
    </div>
@endsection
