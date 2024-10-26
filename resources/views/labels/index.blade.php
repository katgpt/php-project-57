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
                    <form action="{{ route('labels.destroy', $label) }}" method="POST" onsubmit="return confirm('{{ __("layout.table_delete_question") }}');">
                        @csrf
                        @method('delete')
                        <a type="submit" class="text-red-600 hover:text-red-900 delete-label">{{ __('layout.table_delete') }}</a>
                    </form>
                    <a class="text-blue-600 hover:text-blue-900" href="{{ route('labels.edit', $label) }}">
                        {{ __('layout.table_edit') }}
                    </a>
                </td>
                @endauth
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
