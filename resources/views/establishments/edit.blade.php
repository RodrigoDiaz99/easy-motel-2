@extends('layouts.app')
@section('content')
    <livewire:establishment.edit-establishment :establishmentEdit='$establishment'>
    <livewire:establishment.establishment-area.create-establishment-area>
@endsection
