@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('content')
    <!-- Grid -->
    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 lg:grid-cols-4">
        {{-- stat-card --}}
        <x-stat-card title="Total Invitees" value="92,913" href="#" />
        <x-stat-card title="Confirmed Attendees" value="81,300" href="#" />
        <x-stat-card title="Checked-In" value="75,422" href="#" />
        <x-stat-card title="On-site" value="75,422" href="#" />
        <x-stat-card title="VIP Attendees" value="1,205" href="#" />
        <x-stat-card title="Souvenir Received" value="70,000" href="#" />
        <x-stat-card title="Gift Collected" value="68,300" href="#" />
        <x-stat-card title="Absent / No Show" value="11,613" href="#" />
        {{-- stat-card --}}

    </div>
    <!-- End Grid -->
@endsection
