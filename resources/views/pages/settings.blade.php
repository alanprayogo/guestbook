@extends('layouts.app')

@section('page-title', 'Settings')

@section('content')
    <x-tabs.container>
        <x-tabs.tab-button tab="general" active="true">General</x-tabs.tab-button>
        <x-tabs.tab-button tab="smtp">SMTP Mail</x-tabs.tab-button>
    </x-tabs.container>

    <div class="mt-3">
        <x-tabs.tab-panel tab="general" active="true">
            {{-- Konten General --}}
        </x-tabs.tab-panel>

        <x-tabs.tab-panel tab="smtp">
            {{-- Konten SMTP --}}
        </x-tabs.tab-panel>
    </div>
@endsection
