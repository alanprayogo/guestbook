@extends('layouts.app')

@section('content')
    <!-- Grid -->
    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 lg:grid-cols-4">
        {{-- stat-card --}}
        <x-stat-card title="Total Invitees" value="92,913" comparison="/ 1" href="#" />
        <x-stat-card title="Checked-In" value="75,422" href="#" />
        <x-stat-card title="On-site" value="75,422" href="#" />
        <x-stat-card title="VIP Attendees" value="75,422" href="#" />
        {{-- stat-card --}}
    </div>
    <!-- End Grid -->
@endsection
