@extends('layouts.app')
@section('content')

@auth()
    <div class="grid col-span-full">
        <h1 class="max-w-2xl mb-4 text-4xl leading-none tracking-tight md:text-5xl xl:text-6xl">{{ __('layout.label_edit') }}</h1>

        {{ Form::open(['url' => route('labels.update', $label), 'method' => 'PATCH', 'class' => 'w-50']) }}
        <div class="flex flex-col">
            <div>
                {{ Form::label('name', __('layout.table_name')) }}
            </div>
            <div class="mt-2">
                {{ Form::text('name', $label->name, ['class' => 'form-control rounded border-gray-300 w-1/3']) }}
            </div>
            <div class="text-red-600 hover:text-red-900">
            @if ($errors->any())
                {{ $errors->first('name') }}
            @endif
            </div>
            <div>
                {{ Form::label('description', __('layout.table_description')) }}
            </div>
            <div class="mt-2">
                {{ Form::textarea('description', $label->description, ['class' => 'form-control rounded border-gray-300 w-1/1']) }}
            </div>
            <div class="text-red-600 hover:text-red-900">
            @if ($errors->any())
                {{ $errors->first('description') }}
            @endif
            </div>
            <div class="mt-2">
                {{ Form::submit(__('layout.update_button'), ['class' => 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded']) }}
            </div>
        </div>
        {{ Form::close() }}
    </div>
@endauth
@endsection