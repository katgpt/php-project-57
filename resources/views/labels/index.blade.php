@extends('layouts.app')

@section('content')
<div class="grid col-span-full">
    <h1 class="max-w-2xl mb-4 text-4xl leading-none tracking-tight md:text-5xl xl:text-6xl">
        {{ __('layout.labels_header') }}
    </h1>
    @auth()
    <div>
        <a href="{{ route('labels.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            {{ __('layout.labels_create') }}
        </a>
    </div>
    @endauth
    <table class="mt-4">
        <thead class="border-b-2 border-solid border-black text-left" style="text-align: left">
            <tr>
                <th>{{ __('layout.table_id') }}</th>
                <th>{{ __('layout.table_name') }}</th>
                <th>{{ __('layout.table_description') }}</th>
                <th>{{ __('layout.table_date_of_creation') }}</th>
                @auth()
                <th>{{ __('layout.table_actions') }}</th>
                @endauth
            </tr>
        </thead>
        <tbody>
        @foreach($labels as $label)
            <tr class="border-b border-dashed text-left">
                <td>{{ $label->id }}</td>
                <td>{{ $label->name }}</td>
                <td>{{ $label->description }}</td>
                <td>{{ $label->created_at->format('d.m.Y') }}</td>
                @auth()
                <td>
                    <a href="#" class="text-red-500 hover:text-red-700 ml-2" onclick="event.preventDefault(); if(confirm('Вы уверены, что хотите удалить эту метку?')) { document.getElementById('delete-form-{{ $label->id }}').submit(); }">Удалить</a>
                    <form id="delete-form-{{ $label->id }}" action="{{ route('labels.destroy', $label->id) }}" method="POST" class="hidden">
                        @csrf
                        @method('DELETE')
                    </form>
                    <a href="{{ route('labels.edit', $label->id) }}" class="text-blue-500 hover:text-blue-700">{{ __('layout.table_edit') }}</a>
                </td>
                @endauth
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
