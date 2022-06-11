@extends('layouts.app')
@section('content')
    <livewire:room.create-room :establishment="$establi">

        <!-- Room Types Create -->
    <livewire:room.room-types.create-room-type :establishment="$establi">
    <livewire:room.room-areas.create-room-area :establishment="$establi">
@endsection
